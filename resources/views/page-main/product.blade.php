<link rel="stylesheet" href="{{ asset('css/main/product.css') }}">

<section class="product" id="product">
    <div class="container my-5 py-3">
        <h5 class="fw-bold">PRODUK KAMI</h5>
        <h2 class="fw-semibold">Solusi Energi Andal untuk Berbagai Sektor</h2>
        <p>Kami menyediakan pasokan solar industri dengan pengiriman aman dan tepat waktu, mendukung kebutuhan energi berbagai sektor.</p>
        <div class="row">
            @for ($i = 0; $i < 3; $i++)
            @php
                $products = [
                    [
                        'img' => 'Main/Produk/B40.png',
                        'title' => 'Solar Industri HSD B40',
                        'description' => 'Solar industri dengan campuran 40% biodiesel, ramah lingkungan dan efisien untuk berbagai kebutuhan.'
                    ],
                    [
                        'img' => 'Main/Produk/LSFO.png',
                        'title' => 'Solar Industri LSFO',
                        'description' => 'Marine fuel oil bersulfur rendah, sesuai regulasi IMO 2020 untuk kapal dan industri ramah lingkungan.'
                    ],
                    [
                        'img' => 'Main/Produk/HSFO.png',
                        'title' => 'Solar Industri HSFO',
                        'description' => 'Marine fuel oil berkadar sulfur tinggi, ekonomis untuk kapal besar dan kebutuhan industri tertentu.'
                    ],
                ];
            @endphp
            <div class="col-lg-4 col-md-12" data-aos="fade-up" data-aos-delay="{{ $i * 200 }}" data-aos-duration="700" data-aos-once="true">
                <div class="card produk-card">
                    <!-- Icon di pojok kiri atas -->
                    <div class="icon-box">
                        <i class="fa-solid fa-droplet"></i>
                    </div>

                    <!-- Background image -->
                    <img src="{{ asset('img/' . $products[$i]['img']) }}" class="card-img" alt="Produk {{ $i + 1 }}">

                    <!-- Overlay gradasi + teks -->
                    <div class="overlay">
                        <h5 class="card-title">{{ $products[$i]['title'] }}</h5>
                        <p class="card-text">
                            {!! $products[$i]['description'] !!}
                        </p>
                    </div>
                </div>
            </div>
            @endfor
        </div>
    </div>
</div>
