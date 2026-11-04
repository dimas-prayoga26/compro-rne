@extends('page-submain.submain')

@section('css-additional')
    <link rel="stylesheet" href="{{ asset('css/sub-main/gallery.css') }}">
@endsection


@section('title', 'Galeri RNE')

@section('content')
    <section id="galery" class="my-lg-5 my-md-1">
        <div class="container container-title" data-aos="zoom-in" data-aos-duration="700" data-aos-once="true">
            <div class="text-title py-lg-5 py-md-4 py-sm-5">
                <h1 class="fw-bold text-center text-white">Galeri RNE</h1>
                <p class="text-white text-center fw-light">Lihat bagaimana RNE tumbuh dan bergerak melalui berbagai kegiatan.<br>Semua terekam dalam galeri ini untuk Anda jelajahi.</p>
            </div>
        </div>
        <br>
        <div class="container">
            <div class="masonry">
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

                @foreach ($data as $item)
                    <div class="masonry-item"
                        data-aos="zoom-in"
                        data-aos-duration="700"
                        data-aos-once="true"
                        data-src="{{ $item->image_path }}"
                        data-title="{{ $item->title }}"
                        data-desc="{{ $item->description }}">
                        <div class="image-wrapper">
                            <img src="{{ asset('img/Galeri/' . $item->image_path) }}" alt="{{ $item->title }}">
                            <div class="image-overlay">
                                <div class="overlay-title">{{ $item->title }}</div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Lightbox -->
        <div class="lightbox-overlay" id="lightboxOverlay">
            <div class="lightbox-close" id="lightboxClose">&times;</div>
            <div class="lightbox-content">
                <div class="lightbox-image">
                    <img src="" alt="" id="lightboxImg">
                </div>
                <div class="lightbox-info">
                    <h2 id="lightboxTitle"></h2>
                    <p id="lightboxDesc"></p>
                </div>
            </div>
        </div>

        <script>
            const items = document.querySelectorAll('.masonry-item');
            const overlay = document.getElementById('lightboxOverlay');
            const img = document.getElementById('lightboxImg');
            const title = document.getElementById('lightboxTitle');
            const desc = document.getElementById('lightboxDesc');
            const closeBtn = document.getElementById('lightboxClose');

            let currentIndex = 0;

            const openLightbox = (index) => {
                const item = items[index];
                currentIndex = index;

                img.onload = () => {
                    const isPortrait = img.naturalHeight > img.naturalWidth;
                    img.classList.toggle('portrait', isPortrait);
                };

                img.src = "img/Galeri/" + item.dataset.src;
                title.innerText = item.dataset.title;
                desc.innerText = item.dataset.desc;

                overlay.classList.add('active');
            };

            const closeLightbox = () => {
                overlay.classList.remove('active');
            };

            items.forEach((item, index) => {
                item.addEventListener('click', () => {
                    openLightbox(index);
                });
            });

            closeBtn.addEventListener('click', closeLightbox);

            overlay.addEventListener('click', (e) => {
                if (e.target === overlay) closeLightbox();
            });

            document.addEventListener('keydown', function (e) {
                if (overlay.classList.contains('active')) {
                    if (e.key === 'ArrowRight' && currentIndex < items.length - 1) {
                        openLightbox(currentIndex + 1);
                    } else if (e.key === 'ArrowLeft' && currentIndex > 0) {
                        openLightbox(currentIndex - 1);
                    } else if (e.key === 'Escape') {
                        closeLightbox();
                    }
                }
            });

            img.addEventListener('click', () => {
                if (currentIndex < items.length - 1) {
                    openLightbox(currentIndex + 1);
                }
            });
        </script>

    </section>
@endsection
