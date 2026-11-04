@extends('page-submain.submain')

@section('css-additional')
    <link rel="stylesheet" href="{{ asset('css/sub-main/visi.css') }}">
@endsection

@section('title', 'Visi dan Misi')

@section('content')
    <section id="visi" class="my-5">
        <div class="container container-title" data-aos="zoom-in" data-aos-duration="700" data-aos-once="true">
            <div class="text-title py-lg-5 py-md-4 py-sm-5">
                <h1 class="fw-bold text-center text-white">Visi & Misi</h1>
                <p class="text-white text-center fw-light">Kami berjalan dengan tujuan yang jelas dan nilai yang kuat.<br>Inilah fondasi dari setiap keputusan dan langkah yang kami ambil.</p>
            </div>
        </div>
        <div class="container my-4" data-aos="zoom-in" data-aos-duration="700" data-aos-once="true">
            <h4 class="text-center">Visi</h4>
            <hr class="line-bar mx-auto mb-4">
            <p class="fw-light text-center">Menjadi perusahaan penyedia energi (solar industri) terdepan, terpercaya, dan inovatif di Indonesia<br>serta berkontribusi nyata dalam menunjang pertumbuhan sektor industri nasional.</p>
        </div>
        <div class="container my-4" data-aos="zoom-in" data-aos-duration="700" data-aos-once="true">
            <h4 class="text-center">Misi</h4>
            <hr class="line-bar mx-auto mb-4">
            <div class="row gap-4 justify-content-center">
                <div class="col-lg-2 col-md-4 col-sm-12 pt-4 pe-4 ps-4 card-misi shadow-sm text-center" data-aos="fade-down" data-aos-duration="700" data-aos-delay="200" data-aos-once="true">
                    <img class="pb-3" src="{{ asset('img/Icon/fuel.png') }}" alt="Icon Fuel">
                    <p class="fw-light text-white text-start">Menyediakan solar industri dengan mutu terbaik, mengacu pada standar nasional dan regulasi terbaru.</p>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-12 pt-4 pe-4 ps-4 card-misi shadow-sm text-center" data-aos="fade-down" data-aos-duration="700" data-aos-delay="400" data-aos-once="true">
                    <img class="pb-3" src="{{ asset('img/Icon/chat.png') }}" alt="Icon Chat">
                    <p class="fw-light text-white text-start">Mengutamakan pelayanan prima, komunikasi responsif, dan solusi yang handal bagi pelanggan di seluruh Indonesia.</p>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-12 pt-4 pe-4 ps-4 card-misi shadow-sm text-center" data-aos="fade-down" data-aos-duration="700" data-aos-delay="600" data-aos-once="true">
                    <img class="pb-3" src="{{ asset('img/Icon/update.png') }}" alt="Icon Update">
                    <p class="fw-light text-white text-start">Mengembangkan infrastruktur layanan distribusi BBM yang terintegrasi.</p>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-12 pt-4 pe-4 ps-4 card-misi shadow-sm text-center" data-aos="fade-down" data-aos-duration="700" data-aos-delay="800" data-aos-once="true">
                    <img class="pb-3" src="{{ asset('img/Icon/time.png') }}" alt="Icon Time">
                    <p class="fw-light text-white text-start">Membangun kemitraan jangka panjang dengan pelanggan dari berbagai sektor industri.</p>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-12 pt-4 pe-4 ps-4 card-misi shadow-sm text-center" data-aos="fade-down" data-aos-duration="700" data-aos-delay="1000" data-aos-once="true">
                    <img class="pb-3" src="{{ asset('img/Icon/leaf.png') }}" alt="Icon Leaf">
                    <p class="fw-light text-white text-start">Berkontribusi dalam penerapan tata kelola perusahaan yang baik (Good Corporate Governance) dan ramah lingkungan.</p>
                </div>
            </div>
        </div>
    </section>
@endsection
