<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Login RNE</title>

    <link rel="icon" href="{{ asset('img/Icon-white.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/admin/login.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    @if (session('authError'))
        <script>
            Swal.mixin({
                toast: true,
                position: "bottom-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            }).fire({
                icon: "error",
                title: "{{ session('authError') }}"
            });
        </script>
    @endif

    @if (session('successLogout'))
        <script>
            Swal.mixin({
                toast: true,
                position: "bottom-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            }).fire({
                icon: "success",
                title: "{{ session('successLogout') }}"
            });
        </script>
    @endif

    @if(session('passChange'))
        <script>
            Swal.mixin({
                toast: true,
                position: "bottom-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            }).fire({
                icon: "success",
                title: "{{ session('passChange') }}"
            });
        </script>
    @endif

    @error('samePassword')
        <script>
            Swal.mixin({
                toast: true,
                position: "bottom-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            }).fire({
                icon: "success",
                title: "{{ $message }}"
            });
        </script>
    @enderror
    <div class="container d-flex justify-content-center align-items-center" style="height: 100dvh;">
        <div class="row w-100 column-gap-5 align-items-center shadow-lg p-4 rounded">

            <!-- Kiri (Gambar) -->
            <div class="col-lg-5 d-lg-block d-md-none d-sm-none img-login">
                <p class="text-white fs-2 fw-bold p-3 mt-3">Solusi Energi Andal untuk Berbagai Sektor</p>
            </div>

            <!-- Kanan (Konten) -->
            <div class="col-lg-6 col-md-12 col-sm-12 text-center text-md-start">
                <img src="{{ asset('img/LogoBlack.png') }}" alt="Logo RNE" class="mb-4" style="width: 150px;">
                <h2 class="fw-normal">Admin RNE</h2>
                <p class="text-black-50 mb-0">Selamat Datang di Login Admin RNE - Landing Page Setup</p>

                <form method="POST" data-url="{{ route('loginAuth') }}" id="loginForm">
                    @csrf
                    <div class="mt-4">
                        <label for="emailUser">Email Anda</label>
                        <input  type="text" id="emailUser" class="form-control" name="email" placeholder="Masukkan Email...">
                    </div>
                    <div class="my-3 position-relative">
                        <label for="passwordUser">Password Anda</label>
                        <input  type="password" id="passwordUser" class="form-control" name="password" placeholder="Masukkan Password...">
                        <i class="fa-regular fa-eye position-absolute text-black-50 end-0 me-3"
                        style="cursor: pointer; top: 55%;"
                        onclick="togglePassword()" id="icon-pass"></i>
                    </div>
                    <button class="btn btn-primary w-100 mt-4 py-3" type="submit" id="submitLogin">
                        <span id="loadingSpinner" class="d-none me-2">
                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        </span>

                        <span id="buttonText">
                            Masuk Sekarang
                        </span>

                        <span id="loadingText" class="d-none">
                            Loading...
                        </span>
                    </button>
                </form>
            </div>

        </div>
    </div>

    <!-- JS Libraries -->
    <script src="{{ asset('bootstrap/bootstrap.bundle.min.js') }}"></script>
    <script src="https://unpkg.com/fortawesome/fontawesome-free@7.0.0/js/fontawesome.js"></script>
    <script src="https://unpkg.com/axios@1.1.3/dist/axios.min.js"></script>
    <script src="{{ asset('js/login.js') }}"></script>
</body>
</html>
