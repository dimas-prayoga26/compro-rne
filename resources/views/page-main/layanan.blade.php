<link rel="stylesheet" href="{{ asset('css/main/layanan.css') }}">

<section class="layanan">
    <div class="container my-5 py-3">
        <div class="row d-flex justify-content-center">
            <h5 class="fw-bold text-center">LAYANAN KAMI</h5>
            <h2 class="fw-bold text-center">Solusi Energi yang Andal, Kapan Pun Dibutuhkan</h2>
            <p class="text-center">Kami hadir dengan layanan energi andal, didukung kualitas, distribusi tepat, kepatuhan, dan kemitraan jangka panjang.</p>
            <br>
            <br>
            @php
                $layanan = [
                    [
                        'img' => 'Icon/tanker.png',
                        'title' => 'Layanan Distribusi BBM',
                        'description' => 'Dipercaya oleh berbagai industri untuk konsistensi waktu pengiriman, didukung sistem monitoring armada yang terintegrasi'
                    ],
                    [
                        'img' => 'Icon/costumer.png',
                        'title' => 'Tim Professional',
                        'description' => 'Didukung staf operasional dan sales berpengalaman dengan pelatihan berkala, memastikan setiap layanan selalu cepat, aman, dan terpercaya.'
                    ],
                    [
                        'img' => 'Icon/saving.png',
                        'title' => 'Harga Transparan',
                        'description' => 'Memberikan harga solar yang kompetitif dan jelas, sudah mencakup biaya pengiriman, pajak, serta jaminan legalitas untuk kenyamanan transaksi Anda.'
                    ],
                    [
                        'img' => 'Icon/handshake.png',
                        'title' => 'Solusi Berbasis Mitra',
                        'description' => 'Tidak hanya sebagai supplier, namun menjadi partner energi yang membantu perencanaan dan efisiensi penggunaan energi pelanggan'
                    ]
                ];
            @endphp

            @for ($i = 0; $i < count($layanan); $i++)
                <div class="col-lg-5 col-md-12">
                    <div class="card layanan-card" data-aos="zoom-in" data-aos-duration="700" data-aos-once="true">
                        <div class="card-body">
                            <div class="icon">
                                <img src="{{ asset('img/' . $layanan[$i]['img']) }}" alt="Fuel Tank Truck Icon" width="35" height="35" class="d-inline-block align-text-top" style="color: white;">
                            </div>
                            <h5 class="card-title fw-bold">{{ $layanan[$i]['title'] }}</h5>
                            <p class="card-text">{{ $layanan[$i]['description'] }}</p>
                        </div>
                    </div>
                    <br>
                </div>
            @endfor
        </div>
    </div>
</div>
