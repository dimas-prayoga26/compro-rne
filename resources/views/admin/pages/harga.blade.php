@extends('admin.main')

@section('title', 'Harga BBM')

@section('content')
    <div class="row">
        <div class="col-6">
            <h3 class="my-4">Harga BBM Pertamina</h3>
        </div>
        <div class="col-6">
            <button
                class="btn btn-primary float-end mt-4"
                data-url="{{ route('harga.store') }}"
                data-bs-toggle="modal"
                data-bs-target="#modalFormTambah">
                Tambah Data
            </button>
        </div>
    </div>
    <div class="card w-100">
        <div class="card-body">
            <h5 class="mb-4">B40</h5>
                <div class="table-responsive" style="max-height: 300px">
                    <table class="table table-bordered">
                        <thead>
                            <th>Nomor</th>
                            <th>Tanggal Awal</th>
                            <th>Tanggal Akhir</th>
                            <th>Jenis</th>
                            <th>Harga Wilayah 1</th>
                            <th>Harga Wilayah 2</th>
                            <th>Harga Wilayah 3</th>
                            <th>Harga Wilayah 4</th>
                            <th>Aksi</th>
                        </thead>
                    <tbody>
                        @foreach ($b40 as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->tanggal_awal }}</td>
                            <td>{{ $item->tanggal_akhir }}</td>
                            <td>B40</td>
                            <td>{{ $item->harga_1 }}</td>
                            <td>{{ $item->harga_2 }}</td>
                            <td>{{ $item->harga_3 }}</td>
                            <td>{{ $item->harga_4 }}</td>
                            <td>
                                <button
                                    data-id="{{ $item->id }}"
                                    data-url="{{ route('harga.update', $item->id) }}"
                                    data-tanggal_awal="{{ $item->tanggal_awal }}"
                                    data-tanggal_akhir="{{ $item->tanggal_akhir }}"
                                    data-harga_1="{{ $item->harga_1 }}"
                                    data-harga_2="{{ $item->harga_2 }}"
                                    data-harga_3="{{ $item->harga_3 }}"
                                    data-harga_4="{{ $item->harga_4 }}"
                                    data-jenis="{{ $item->jenis }}"
                                    data-bs-toggle="modal"
                                    data-bs-target="#modalFormEdit"
                                    class="btn btn-sm btn-primary btn-edit"
                                    >
                                    Edit
                                </button>
                                <form class="form-delete d-inline" data-url="{{ route('harga.destroy', $item->id) }}">
                                    @csrf
                                    <button class="btn btn-danger btn-sm btn-hapus-harga">
                                        <span class="spinner d-none my-0 mx-3">
                                            <span class="spinner-border spinner-border-sm"></span>
                                        </span>

                                        <span class="text">Hapus</span>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <br>
    <div class="card w-100">
        <div class="card-body">
            <h5 class="mb-4">LSFO</h5>
                <div class="table-responsive" style="max-height: 300px">
                    <table class="table table-bordered">
                        <thead>
                            <th>Nomor</th>
                            <th>Tanggal Awal</th>
                            <th>Tanggal Akhir</th>
                            <th>Jenis</th>
                            <th>Harga Wilayah 1</th>
                            <th>Harga Wilayah 2</th>
                            <th>Harga Wilayah 3</th>
                            <th>Harga Wilayah 4</th>
                            <th>Aksi</th>
                        </thead>
                    <tbody>
                        @foreach ($lsfo as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->tanggal_awal }}</td>
                            <td>{{ $item->tanggal_akhir }}</td>
                            <td>LSFO</td>
                            <td>{{ $item->harga_1 }}</td>
                            <td>{{ $item->harga_2 }}</td>
                            <td>{{ $item->harga_3 }}</td>
                            <td>{{ $item->harga_4 }}</td>
                            <td>
                                <button
                                    data-id="{{ $item->id }}"
                                    data-url="{{ route('harga.update', $item->id) }}"
                                    data-tanggal_awal="{{ $item->tanggal_awal }}"
                                    data-tanggal_akhir="{{ $item->tanggal_akhir }}"
                                    data-harga_1="{{ $item->harga_1 }}"
                                    data-harga_2="{{ $item->harga_2 }}"
                                    data-harga_3="{{ $item->harga_3 }}"
                                    data-harga_4="{{ $item->harga_4 }}"
                                    data-jenis="{{ $item->jenis }}"
                                    data-bs-toggle="modal"
                                    data-bs-target="#modalFormEdit"
                                    class="btn btn-sm btn-primary btn-edit"
                                    >
                                    Edit
                                </button>
                                <form class="form-delete d-inline" data-url="{{ route('harga.destroy', $item->id) }}">
                                    @csrf
                                    <button class="btn btn-danger btn-sm btn-hapus-harga">
                                        <span class="spinner d-none my-0 mx-3">
                                            <span class="spinner-border spinner-border-sm"></span>
                                        </span>

                                        <span class="text">Hapus</span>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <br>
    <div class="card w-100">
        <div class="card-body">
            <h5 class="mb-4">HSFO</h5>
                <div class="table-responsive" style="max-height: 300px">
                    <table class="table table-bordered">
                        <thead>
                            <th>Nomor</th>
                            <th>Tanggal Awal</th>
                            <th>Tanggal Akhir</th>
                            <th>Jenis</th>
                            <th>Harga Wilayah 1</th>
                            <th>Harga Wilayah 2</th>
                            <th>Harga Wilayah 3</th>
                            <th>Harga Wilayah 4</th>
                            <th>Aksi</th>
                        </thead>
                    <tbody>
                        @foreach ($hsfo as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->tanggal_awal }}</td>
                            <td>{{ $item->tanggal_akhir }}</td>
                            <td>HSFO</td>
                            <td>{{ $item->harga_1 }}</td>
                            <td>{{ $item->harga_2 }}</td>
                            <td>{{ $item->harga_3 }}</td>
                            <td>{{ $item->harga_4 }}</td>
                            <td>
                                <button
                                    data-id="{{ $item->id }}"
                                    data-url="{{ route('harga.update', $item->id) }}"
                                    data-tanggal_awal="{{ $item->tanggal_awal }}"
                                    data-tanggal_akhir="{{ $item->tanggal_akhir }}"
                                    data-harga_1="{{ $item->harga_1 }}"
                                    data-harga_2="{{ $item->harga_2 }}"
                                    data-harga_3="{{ $item->harga_3 }}"
                                    data-harga_4="{{ $item->harga_4 }}"
                                    data-jenis="{{ $item->jenis }}"
                                    data-bs-toggle="modal"
                                    data-bs-target="#modalFormEdit"
                                    class="btn btn-sm btn-primary btn-edit"
                                    >
                                    Edit
                                </button>
                                <form class="form-delete d-inline" data-url="{{ route('harga.destroy', $item->id) }}">
                                    @csrf
                                    <button class="btn btn-danger btn-sm btn-hapus-harga">
                                        <span class="spinner d-none my-0 mx-3">
                                            <span class="spinner-border spinner-border-sm"></span>
                                        </span>

                                        <span class="text">Hapus</span>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalFormTambah" tabindex="-1">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Data Harga</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <form data-url="{{ route('harga.store') }}" method="POST" id="formHarga">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label>Tanggal Awal</label>
                            <input type="date" name="tanggal_awal" id="tanggal_awal" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label>Tanggal Akhir</label>
                            <input type="date" name="tanggal_akhir" id="tanggal_akhir" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label>Harga Wilayah 1</label>
                            <input type="text" name="harga_1" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" id="harga_1" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label>Harga Wilayah 2</label>
                            <input type="text" name="harga_2" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" id="harga_2" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label>Harga Wilayah 3</label>
                            <input type="text" name="harga_3" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" id="harga_3" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label>Harga Wilayah 4</label>
                            <input type="text" name="harga_4" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" id="harga_4" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="jenisBBM">Jenis BBM</label>
                            <select name="jenis" id="jenisBBM" class="form-control">
                                <option selected hidden>Pilih Jenis</option>
                                <option value="1">B40</option>
                                <option value="2">HSFO</option>
                                <option value="3">LSFO</option>
                            </select>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary" id="btnSubmitHarga">
                            <span id="loadingSpinner" class="d-none m-2">
                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            </span>

                            <span id="buttonText">Tambah Harga</span>

                            <span id="loadingText" class="d-none">
                                Loading...
                            </span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalFormEdit" tabindex="-1">
        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Data Harga</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <form method="POST" id="formHargaEdit">
                    @csrf
                    <input type="text" hidden name="id" id="editId">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label>Tanggal Awal</label>
                            <input type="date" name="tanggal_awal" id="tanggal_awalEdit" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label>Tanggal Akhir</label>
                            <input type="date" name="tanggal_akhir" id="tanggal_akhirEdit" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label>Harga Wilayah 1</label>
                            <input type="text" name="harga_1" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" id="harga_1Edit" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label>Harga Wilayah 2</label>
                            <input type="text" name="harga_2" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" id="harga_2Edit" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label>Harga Wilayah 3</label>
                            <input type="text" name="harga_3" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" id="harga_3Edit" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label>Harga Wilayah 4</label>
                            <input type="text" name="harga_4" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" id="harga_4Edit" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="jenisBBMEdit">Jenis BBM</label>
                            <select name="jenis" id="jenisBBMEdit" class="form-control">
                                <option selected hidden>Pilih Jenis</option>
                                <option value="1">B40</option>
                                <option value="2">HSFO</option>
                                <option value="3">LSFO</option>
                            </select>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary" id="btnSubmitEdit">
                            <span id="loadingSpinnerEdit" class="d-none m-2">
                                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            </span>

                            <span id="buttonTextEdit">Update Harga</span>

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
    <script src="{{ asset('js/harga.js') }}"></script>
@endpush
