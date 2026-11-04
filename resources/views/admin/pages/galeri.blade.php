@extends('admin.main')

@section('title', 'Galeri RNE')

@section('content')
<h3 class="my-4">Galeri RNE</h3>

<div class="card w-100" style="min-height: 86dvh;">
    <div class="card-body p-4">

        {{-- HEADER --}}
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="mb-0">List Galeri RNE</h5>

            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addGaleriModal">
                Tambah Gambar
            </button>
        </div>

        {{-- GRID --}}
        <div class="row g-4">
            @foreach ($galeri as $item)
                <div class="col-lg-4 col-md-6">
                    <div class="card h-100 shadow-sm border-0">

                        <img
                            src="{{ asset('img/Galeri/' . $item->image_path) }}"
                            class="card-img-top"
                            style="height: 200px; object-fit: cover;"
                        >

                        <div class="card-body d-flex justify-content-between align-items-center">

                            <small class="text-muted">
                                {{ $item->title }}
                            </small>

                            <div class="d-flex gap-1">

                                <button
                                    class="btn btn-sm btn-success btn-detail"
                                    data-title="{{ $item->title }}"
                                    data-desc="{{ $item->description }}"
                                    data-image="{{ asset('img/Galeri/' . $item->image_path) }}"
                                    data-bs-toggle="offcanvas"
                                    data-bs-target="#detailGaleri"
                                >
                                    Lihat
                                </button>

                                <button
                                    class="btn btn-sm btn-primary btn-edit"
                                    data-url="{{ route('galeri.update', $item->id) }}"
                                    data-id="{{ $item->id }}"
                                    data-title="{{ $item->title }}"
                                    data-desc="{{ $item->description }}"
                                    data-bs-toggle="modal"
                                    data-bs-target="#editGaleriModal"
                                >
                                    Edit
                                </button>

                                <form class="form-delete" data-id="{{ $item->id }}" data-url="{{ route('galeri.destroy', $item->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger btn-delete">
                                        <span class="spinner d-none my-0 mx-3">
                                            <span class="spinner-border spinner-border-sm"></span>
                                        </span>

                                        <span class="text">Hapus</span>
                                    </button>
                                </form>

                            </div>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>

    </div>
</div>

{{-- ================= DETAIL OFFCANVAS ================= --}}
<div class="offcanvas offcanvas-end" tabindex="-1" id="detailGaleri">
    <div class="offcanvas-header">
        <h5>Detail Galeri</h5>
        <button class="btn-close" data-bs-dismiss="offcanvas"></button>
    </div>

    <div class="offcanvas-body">
        <img id="detailImage" class="w-100 rounded mb-3" style="object-fit: cover; height: 300px;">

        <h6>Judul</h6>
        <p id="detailTitle" class="text-end"></p>

        <h6>Deskripsi</h6>
        <p id="detailDesc" class="text-end"></p>
    </div>
</div>

{{-- ================= ADD MODAL ================= --}}
<div class="modal fade" id="addGaleriModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5>Tambah Galeri</h5>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <form id="formAdd" data-url="{{ route('galeri.store') }}">
                @csrf

                <div class="modal-body">
                    <input type="text" name="title" class="form-control mb-2" placeholder="Judul">
                    <textarea style="min-height: 300px" name="description" class="form-control mb-2" placeholder="Deskripsi"></textarea>
                    <input type="file" name="image_path" accept=".jpg, .jpeg, .png" class="form-control">
                </div>

                <div class="modal-footer">
                    <button class="btn btn-primary" id="btnAddGaleri">
                        <span id="loadingSpinner" class="d-none m-2">
                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        </span>

                        <span id="buttonText">Tambah Galeri</span>

                        <span id="loadingText" class="d-none">
                            Loading...
                        </span>
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>

{{-- ================= EDIT MODAL ================= --}}
<div class="modal fade" id="editGaleriModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5>Edit Galeri</h5>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <form id="formEdit">
            @csrf
                @method('PUT')

                <div class="modal-body">

                    <input type="hidden" name="id" id="editId">

                    <input type="text" name="title" id="editTitle" class="form-control mb-2">

                    <textarea style="min-height: 300px" name="description" id="editDesc" class="form-control mb-2"></textarea>

                </div>

                <div class="modal-footer">
                    <button class="btn btn-primary" id="btnEditGaleri">
                        <span id="loadingSpinnerEdit" class="d-none m-2">
                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        </span>

                        <span id="buttonTextEdit">Update Galeri</span>

                        <span id="loadingTextEdit" class="d-none">
                            Loading...
                        </span>
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>

@endsection

@push('scripts')
    <script src="{{ asset('js/galeri.js') }}"></script>
@endpush
