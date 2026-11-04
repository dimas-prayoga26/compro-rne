@php
    $news = [
        [
            'title' => 'Proses pengisian BBM langsung ke tangki operasional pelanggan',
            'subtitle' => 'Tercatat dalam sejarah, PT Rajawali Nusantara Energi (RNE) berhasil mengirimkan 2000 liter BBM ke pelanggan di area industri',
            'author' => 'Admin',
            'date' => '15 Januari',
            'image' => 'About-Dummy2.png'
        ],
        [
            'title' => 'Proses pengisian BBM langsung ke tangki operasional pelanggan',
            'subtitle' => 'Tercatat dalam sejarah, PT Rajawali Nusantara Energi (RNE) berhasil mengirimkan 2000 liter BBM ke pelanggan di area industri',
            'author' => 'Admin',
            'date' => '15 Januari',
            'image' => 'About-Dummy2.png'
        ],
        [
            'title' => 'Proses pengisian BBM langsung ke tangki operasional pelanggan',
            'subtitle' => 'Tercatat dalam sejarah, PT Rajawali Nusantara Energi (RNE) berhasil mengirimkan 2000 liter BBM ke pelanggan di area industri',
            'author' => 'Admin',
            'date' => '15 Januari',
            'image' => 'About-Dummy2.png'
        ],
        [
            'title' => 'Proses pengisian BBM langsung ke tangki operasional pelanggan',
            'subtitle' => 'Tercatat dalam sejarah, PT Rajawali Nusantara Energi (RNE) berhasil mengirimkan 2000 liter BBM ke pelanggan di area industri',
            'author' => 'Admin',
            'date' => '15 Januari',
            'image' => 'About-Dummy2.png'
        ],
    ];
@endphp

<link rel="stylesheet" href="{{ asset('css/main/news.css') }}">
<!-- Swiper CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />

<section id="news">
    <div class="container mb-5">
        <div class="row justify-content-between align-items-center d-flex">
            <div class="col-lg-8 col-md-9 col-sm-9">
                <h5 class="fw-bold">BERITA KAMI</h5>
                <h2 class="fw-bold">Langkah Kami ke Depan</h2>
                <p class="text-muted">Berita dan cerita di balik komitmen kami terhadap efisiensi, inovasi, dan keberlanjutan energi.</p>
            </div>
            <div class="col-lg-2 col-sm-3 justify-content-end d-flex align-items-center gap-2">
                <a class="tombol-news"><i class="fa-solid fa-angle-left fs-4"></i></a>
                <a class="tombol-news"><i class="fa-solid fa-angle-right fs-4"></i></a>
            </div>
        </div>
        <div class="swiper swiper-news">
            <div class="swiper-wrapper">
                @foreach ($news as $item)
                <a href="#" class="swiper-slide text-decoration-none">
                    <div class="kartu-news" data-aos="zoom-in" data-aos-duration="700" data-aos-once="true">
                        <div class="card border-0 shadow-sm">
                            <img src="{{ asset('img/Main/' . $item['image']) }}" height="311" class="p-2 object-fit-cover h-100" alt="News Image" style="border-radius: 20px">
                            <div class="card-body pt-1">
                                <p class="card-title fs-5 text-black fw-semibold">{{ $item['title'] }}</p>
                                <p class="card-text text-muted fs-7">{{ $item['subtitle'] }}</p>
                                <p>{{ $item['date'] }}</p>
                            </div>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
            <div class="swiper-news-pagination text-center mt-3"></div>
        </div>
        <div class="text-center mt-4">
            <a href="#" class="selengkapnya">Lihat Semua Berita</a>
        </div>
    </div>
</section>

