@php
    $user = \App\Models\User::find(1);
@endphp
<div id="footer" style="background-color: var(--primary-color)">
    <div class="container pt-5">
        <div class="row">
            <div class="col-lg-4 col-md-12 mb-md-4 mb-sm-4">
                <img src="{{ asset(path: 'img/Logo.png') }}" alt="Logo Footer" width="270" height="119.25" class="d-inline-block align-text-top"><br><br>
                <p class="text-white m-0 fw-light"><strong>PT Rajawali Nusantara Energi</strong> adalah perusahaan nasional yang bergerak di bidang distribusi bahan bakar minyak, khususnya solar industri non-subsidi (High Speed Diesel/HSD).</p>
                <br>
                <p class="text-white">Social Media Perusahaan:</p>

                <div class="row row-gap-2">
                    <div class="icon d-flex gap-2">
                        <a href="#" class="d-flex justify-content-center align-items-center"><i class="fa-brands fa-instagram fa-2x" style="color: white;"></i></a>
                        <a href="#" class="d-flex justify-content-center align-items-center"><i class="fa-brands fa-x-twitter fa-2x" style="color: white;"></i></a>
                        <a href="#" class="d-flex justify-content-center align-items-center"><i class="fa-brands fa-youtube fa-2x" style="color: white;"></i></a>
                        <a href="#" class="d-flex justify-content-center align-items-center"><i class="fa-brands fa-facebook fa-2x" style="color: white;"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 mt-lg-3">
                <h5 class="text-white mb-4">Halaman Lainnya</h5>
                <ul class="list-unstyled">
                    <li class="mb-2 link-halaman"><a href="{{ route('visimisi') }}" class="text-white fw-light text-decoration-none">Visi dan Misi</a></li>
                    <li class="mb-2 link-halaman"><a href="{{ route('legalitas') }}" class="text-white fw-light text-decoration-none">Legalitas</a></li>
                    <li class="mb-2 link-halaman"><a href="{{ route('galery') }}" class="text-white fw-light text-decoration-none">Gallery</a></li>
                    {{-- <li class="mb-2 link-halaman"><a href="#" class="text-white fw-light text-decoration-none">Berita</a></li> --}}
                    <li class="mb-2 link-halaman"><a href="{{ route('harga') }}" class="text-white fw-light text-decoration-none">Harga BBM Pertamina</a></li>
                    <li class="mb-2 link-halaman"><a href="{{ route('contact') }}" class="text-white fw-light text-decoration-none">Contact</a></li>
                </ul>
            </div>
            <div class="col-lg-4 col-md-12 mt-lg-3">
                <h5 class="text-white mb-4">Kontak Kami</h5>
                <p class="text-white mb-2">{{ $user->detail->address }}</p>
                <p class="text-white mb-2">Phone: {{ $user->detail->office_contact }}</p>
                <p class="text-white mb-2">Email: {{ $user->detail->email_contact }}</p>
            </div>
        </div>
    </div>
    <div class="text-center bg-black text-white py-3">
        <p class="m-0"><span class="fw-light">Copyright</span> © PT Rajawali Nusantara Energi</p>
    </div>
</div>
