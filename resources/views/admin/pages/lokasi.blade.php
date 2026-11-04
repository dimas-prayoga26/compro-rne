@extends('admin.main')

@section('title', 'Lokasi RNE')

@section('content')
    <h3 class="my-4">Lokasi RNE</h3>

    <div class="row">
        {{-- TABLE --}}
        <div class="col-lg-6 col-12 mb-4">
            <div class="card">
                <div class="card-body p-4">
                    <div class="row align-items-center mb-4">
                        <div class="col-6">
                            <h5 class="mb-0">Data Latitude dan Longitude RNE</h5>
                        </div>
                        <div class="col-6">
                            <button type="button" data-bs-toggle="modal" data-bs-target="#addLocationModal" class="btn btn-primary float-end">Tambah Lokasi</button>
                        </div>
                    </div>
                    <div class="table-responsive" style="max-height: 900px; overflow-y: auto;">
                        <table id="locationRNE" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Wilayah</th>
                                    <th>Latitude</th>
                                    <th>Longitude</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($location as $item)
                                    <tr>
                                        <td>{{ $item->wilayah }}</td>
                                        <td>{{ $item->latitude }}</td>
                                        <td>{{ $item->longitude }}</td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <button type="button"
                                                    data-id="{{ $item->id }}"
                                                    data-url="{{ route('lokasi.update', $item->id) }}"
                                                    data-wilayah="{{ $item->wilayah }}"
                                                    data-latitude="{{ $item->latitude }}"
                                                    data-longitude="{{ $item->longitude }}"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#editLocationModal"
                                                    class="btn btn-sm btn-primary btn-edit">
                                                    Edit
                                                </button>

                                                <form data-url="{{ route('lokasi.destroy', $item->id) }}" method="POST" class="form-hapus m-0">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit" class="btn btn-sm btn-danger btn-hapus">
                                                        <span class="spinner d-none my-0 mx-3">
                                                            <span class="spinner-border spinner-border-sm"></span>
                                                        </span>

                                                        <span class="text">Hapus</span>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>

        {{-- MAP --}}
        <div class="col-lg-6 col-12">
            <div class="card h-100">
                <div class="card-body p-3">
                    <div
                        id="map"
                        class="w-100"
                        data-location='@json($location)'
                        data-google-api-key="{{ config('services.google.api_key') }}"
                        style="height: 100%; min-height: 300px !important; border-radius: 12px; overflow: hidden;">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addLocationModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Lokasi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="m-4">
                    <form data-url="{{ route('lokasi.store') }}" method="POST" id="tambah-lokasi">
                        @csrf
                        <div class="mb-4">
                            <label for="wilayahRNE" class="form-label">Wilayah</label>
                            <input type="text" id="wilayahRNE" name="wilayah" class="form-control input-profile" placeholder="Ex: Jakarta Selatan">
                        </div>
                        <div class="mb-4">
                            <label for="latitudeRNE" class="form-label">Latitude</label>
                            <input type="text" id="latitudeRNE" name="latitude" class="form-control input-profile" placeholder="Ex: -6.24">
                        </div>
                        <div class="mb-4">
                            <label for="longitudeRNE" class="form-label">Longitude</label>
                            <input type="text" id="longitudeRNE" name="longitude" class="form-control input-profile" placeholder="Ex: 106.8">
                        </div>
                        <div class="d-flex justify-content-end">
                            <button class="btn btn-primary" id="btn-submit">
                                <span id="loadingSpinner" class="d-none m-2">
                                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                </span>

                                <span id="buttonText">Tambah Lokasi</span>

                                <span id="loadingText" class="d-none">
                                    Loading...
                                </span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editLocationModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Lokasi</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="m-4">
                    <form method="POST" id="edit-lokasi">
                        @csrf
                        @method('PATCH')
                        <div class="mb-4">
                            <label for="wilayahRNEEdit" class="form-label">Wilayah</label>
                            <input type="text" id="wilayahRNEEdit" name="wilayah" class="form-control input-profile" placeholder="Ex: Jakarta Selatan">
                        </div>
                        <div class="mb-4">
                            <label for="latitudeRNEEdit" class="form-label">Latitude</label>
                            <input type="text" id="latitudeRNEEdit" name="latitude" class="form-control input-profile" placeholder="Ex: -6.24">
                        </div>
                        <div class="mb-4">
                            <label for="longitudeRNEEdit" class="form-label">Longitude</label>
                            <input type="text" id="longitudeRNEEdit" name="longitude" class="form-control input-profile" placeholder="Ex: 106.8">
                        </div>
                        <div class="d-flex justify-content-end">
                            <button class="btn btn-primary" id="btn-edit-submit">
                                <span id="loadingSpinnerEdit" class="d-none m-2">
                                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                </span>

                                <span id="buttonTextEdit">Edit Lokasi</span>

                                <span id="loadingTextEdit" class="d-none">
                                    Loading...
                                </span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/lokasi.js') }}?v={{ filemtime(public_path('js/lokasi.js')) }}"></script>
@endpush

@push('css-additional')
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
@endpush
