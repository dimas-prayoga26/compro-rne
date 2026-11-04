@extends('page-submain.submain')

@section('css-additional')
    <link rel="stylesheet" href="{{ asset('css/sub-main/visi.css') }}">
@endsection

@section('title', 'Legalitas')

@section('content')
    <section id="legalitas" class="my-lg-5 my-md-1">
        <div class="container container-title" data-aos="zoom-in" data-aos-duration="700" data-aos-once="true">
            <div class="text-title py-lg-5 py-md-4 py-sm-5">
                <h1 class="fw-bold text-center text-white">Legalitas</h1>
                <p class="text-white text-center fw-light">Dokumen legal resmi perusahaan kami tersedia untuk ditinjau.<br>Kami percaya keterbukaan adalah bagian dari tata kelola yang baik.</p>
            </div>
        </div>
        <div class="container my-4">
            <h5 class="fw-semibold text-center mb-3" style="color: var(--primary-color)">Company Profile PT Rajawali Nusantara Energi</h5>
            <div id="pdf-viewer" style="height: 600px;"></div>
        </div>

        <script type="module">
            import EmbedPDF from 'https://snippet.embedpdf.com/embedpdf.js';
            EmbedPDF.init({
                type: 'container',
                target: document.getElementById('pdf-viewer'),
                src: '{{ asset('COMPRO_PT_RNE.pdf') }}'
            });
        </script>

    </section>
@endsection
