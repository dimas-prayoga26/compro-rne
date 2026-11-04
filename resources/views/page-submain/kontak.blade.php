@extends('page-submain.submain')

@section('css-additional')
    <link rel="stylesheet" href="{{ asset('css/sub-main/kontak.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sub-main/visi.css') }}">
@endsection

@section('title', 'Kontak Kami')

@section('content')
    <section id="visi" class="my-5">
        <div class="container container-title" data-aos="zoom-in" data-aos-duration="700" data-aos-once="true">
            <div class="text-title py-lg-5 py-md-4 py-sm-5">
                <h1 class="fw-bold text-center text-white">Kontak Kami</h1>
                <p class="text-white text-center fw-light">Kami siap membantu kebutuhan energi Anda dengan layanan yang andal dan responsif.<br>Hubungi kami untuk informasi lebih lanjut atau permintaan kerja sama.</p>
            </div>
        </div>
        <div class="container my-4" data-aos="zoom-in" data-aos-duration="700" data-aos-once="true">
            <h4 class="text-center">Kontak Kami</h4>
            <hr class="line-bar mx-auto mb-4">
            <div class="row gap-4 justify-content-center">
                <div class="col-lg-2 col-md-4 col-sm-12 pt-4 pe-4 ps-4 card-misi shadow-sm text-center" data-aos="fade-down" data-aos-duration="700" data-aos-delay="200" data-aos-once="true">
                    <img class="pb-3" src="{{ asset('img/Icon/Whatsapp.png') }}" alt="Icon Fuel">
                    <p class="fw-light text-white text-start">Dapatkan respon cepat dan informasi akurat dengan menghubungi kami via WhatsApp.</p>
                    <a class="tombol-kontakKami mb-4" target="_blank" href='https://api.whatsapp.com/send/?phone={{ $user->detail->whatsapp }}'>Via WhatsApp</a>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-12 pt-4 pe-4 ps-4 card-misi shadow-sm text-center" data-aos="fade-down" data-aos-duration="700" data-aos-delay="200" data-aos-once="true">
                    <img class="pb-3" src="{{ asset('img/Icon/Maps.png') }}" alt="Icon Fuel">
                    <p class="fw-light text-white text-start">Kunjungi lokasi operasional kami melalui Google Maps untuk informasi rute dan jam operasional.</p>
                    <a class="tombol-kontakKami mb-4" target="_blank" href="{{ $user->detail->maps_office }}">Via Maps</a>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-12 pt-4 pe-4 ps-4 card-misi shadow-sm text-center" data-aos="fade-down" data-aos-duration="700" data-aos-delay="200" data-aos-once="true">
                    <img class="pb-3" src="{{ asset('img/Icon/Email.png') }}" alt="Icon Fuel">
                    <p class="fw-light text-white text-start">Kirim pertanyaan, permintaan penawaran, atau kerja sama melalui email resmi kami.</p>
                    <a class="tombol-kontakKami mb-4"
                        href="https://mail.google.com/mail/?view=cm&fs=1&to={{ $user->detail->email_contact }}"
                        target="_blank"
                        rel="noopener noreferrer">
                        Via Email
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection
