<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>

    <link rel="shortcut icon" href="{{ asset('img/Icon-white.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}">
    @stack('css-additional')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <div class="d-flex">
        @include('admin.layouts.sidebar')

        <div class="content-wrapper grow p-4 container-fluid">
            @yield('content')
        </div>
    </div>

    <script src="{{ asset('bootstrap/bootstrap.bundle.min.js') }}"></script>
    <script src="https://unpkg.com/fortawesome/fontawesome-free@7.0.0/js/fontawesome.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios@1.1.3/dist/axios.min.js"></script>
    @stack('scripts')
</body>
</html>
