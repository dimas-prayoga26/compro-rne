@extends('admin.main')

@section('title', 'Admin RNE')

@section('content')
    <h3 class="my-4">Informasi RNE</h3>
    <div class="card w-100">
        <div class="card-body p-5">
            <form data-url="{{ route('profile.update', Auth::id()) }}" id="profileForm" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="row">
                    <h5 class="mb-4">Profile Akun Admin</h5>
                    <x-input-profile
                        type="text"
                        name="name"
                        id="name"
                        label="Nama"
                        placeholder="Masukkan nama"
                        :value="Auth::user()->name"
                    />
                    <x-input-profile
                        type="email"
                        name="email"
                        id="email"
                        label="Email Akun"
                        placeholder="Masukkan email"
                        :value="Auth::user()->email"
                    />
                    <x-input-profile
                        type="password"
                        name="password"
                        id="password"
                        label="Ganti Password"
                        placeholder="Masukkan password"
                    />
                    <x-input-profile
                        type="password"
                        name="password_confirmation"
                        id="password_confirmation"
                        label="Konfirmasi Password"
                        placeholder="Masukkan kembali password"
                    />
                    <span class="text-danger">* Isi jika ingin mengganti password sekarang</span>
                    <h5 class="my-4">Profile RNE</h5>
                    <x-input-profile
                        type="email"
                        name="email_contact"
                        id="emailCont"
                        label="Kontak Email"
                        placeholder="Masukkan email kontak"
                        :value="Auth::user()->detail->email_contact"
                    />
                    <x-input-profile
                        type="text"
                        name="office_contact"
                        id="telpCont"
                        label="Kontak Kantor"
                        placeholder="Masukkan nomor telepon kontak"
                        :value="Auth::user()->detail->office_contact"
                    />
                    <x-input-profile
                        type="text"
                        name="maps_office"
                        id="maps"
                        label="Link Maps"
                        placeholder="Masukkan link maps"
                        :value="Auth::user()->detail->maps_office"
                    />
                    <x-input-profile
                        type="text"
                        name="address"
                        id="alamatKantor"
                        label="Alamat Kantor"
                        placeholder="Masukkan alamat kantor"
                        :value="Auth::user()->detail->address"
                    />
                    <x-input-profile
                        type="text"
                        name="whatsapp"
                        id="whatsapp"
                        label="Nomor Whatsapp"
                        placeholder="Masukkan nomor whatsapp"
                        :value="Auth::user()->detail->whatsapp"
                    />
                    <x-input-profile
                        type="file"
                        name="company_profile"
                        id="company"
                        label="Company Profile"
                        placeholder="Pilih file profile perusahaan"
                    />
                    <span class="text-danger">* Maksimal 4 MB</span>
                    <button class="btn btn-primary w-100 mt-4 py-3" type="submit" id="submitProfile">
                        <span id="loadingSpinner" class="d-none me-2">
                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        </span>

                        <span id="buttonText">
                            Simpan Perubahan
                        </span>

                        <span id="loadingText" class="d-none">
                            Loading...
                        </span>
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/profile.js') }}"></script>
@endpush
