<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta Tags Penting -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Judul & Favicon -->
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="{{ asset('img/Icon-white.png') }}" type="image/x-icon">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    @yield('css-additional')
    <!-- CSS Utama -->
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
</head>
<body>
    <!-- Navbar -->
    @include('partials.subnavbar')

    <!-- Main Content -->
    <main class="main-content">
        @yield('content')
    </main>

    @include('partials.footer')

    <button id="scrollToTopBtn" title="Kembali ke Atas">
        <i class="fas fa-arrow-up"></i>
    </button>

    <!-- JS Libraries -->
    <script src="{{ asset('bootstrap/bootstrap.bundle.min.js') }}"></script>
    <script src="https://unpkg.com/fortawesome/fontawesome-free@7.0.0/js/fontawesome.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <!-- Inisialisasi AOS -->
    <script>
        AOS.init();
    </script>

    <!-- JS Kustom -->
    <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
