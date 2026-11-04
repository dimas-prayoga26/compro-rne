<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<link rel="stylesheet" href="{{ asset('css/main/gallery.css') }}">

<section id="gallery">
    <div class="container text-center">
        <h5 class="fw-bold">GALERI KAMI</h5>
        <h2 class="fw-bold">Dokumentasi Kegiatan & Layanan Energi Kami</h2>
        <p class="text-muted">Jelajahi dokumentasi aktivitas dan distribusi solar industri kami yang andal.</p>
    </div>

    @php
        $galleries = [
            [
                'src' => asset('img/Galeri/Tangki.jpg'),
                'title' => 'Armada Tangki RNE',
                'description' => '1. Armada tangki kami dilengkapi standar keselamatan kerja dan regulasi transportasi bahan bakar nasional
                2. Armada tangki berstandar industri dengan kapasitas besar, siap menjangkau berbagai wilayah distribusi.
                3. Kesiapan distribusi bahan bakar didukung kendaraan tangki berspesifikasi tinggi untuk menjamin kualitas dan ketepatan pengiriman.'
            ],
            [
                'src' => asset('img/Galeri/SolarIndustri.jpg'),
                'title' => 'Solar Industri RNE',
                'description' => 'Setiap produk bahan bakar yang kami distribusikan melalui proses pengujian ketat untuk memastikan standar mutu dan spesifikasi selalu terjaga. Dengan pengawasan yang konsisten, kami menjamin pelanggan menerima energi yang berkualitas, aman, dan andal untuk mendukung kebutuhan operasional perusahaan anda.'
            ],
        ];
    @endphp

    <div class="container mb-5">
        <div class="swiper gallery-swiper rounded-4 overflow-hidden shadow">
            <div class="swiper-wrapper">
                @php use Illuminate\Support\Str; @endphp
                @foreach ($galleries as $gallery)
                <div class="swiper-slide position-relative">
                    <img src="{{ $gallery['src'] }}" alt="{{ $gallery['title'] }}">

                    <!-- Overlay hanya untuk gelapkan gambar -->
                    <div class="overlay-dark"></div>

                    <!-- Teks tanpa background -->
                    <div class="overlay-text ">
                        <div class="content col-lg-6 col-md-8 col-sm-9 mb-0">
                            <h4>{{ $gallery['title'] }}</h4>
                            <p>{{ Str::limit($gallery['description'], 160, '...') }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <!-- Dots -->
            <div class="swiper-pagination text-center mt-3"></div>
        </div>
        <div class="text-center mt-4">
            <a href="{{ route('galery') }}" class="selengkapnya">Lihat Semua Galeri</a>
        </div>
    </div>
</section>

