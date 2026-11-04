<nav id="mainNavbar" class="navbar navbar-expand-lg navbar-light w-100">
	<div class="container position-relative" data-aos="fade-down" data-aos-duration="700" data-aos-once="true">
		<!-- Logo Kiri -->
		<a class="navbar-brand fw-bold" href="#">
			<img src="{{ asset('img/Logo.png') }}" alt="Logo" width="145" height="60" class="d-inline-block align-text-top">
		</a>

		<!-- Menu Tengah Desktop -->
		<div class="d-none d-lg-flex justify-content-center">
			<ul class="navbar-nav mx-auto">
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Profile
					</a>
					<ul class="dropdown-menu" aria-labelledby="profileDropdown">
						<li><a class="dropdown-item" href="{{ route('visimisi') }}">Visi & Misi</a></li>
						<li><a class="dropdown-item" href="{{ route('legalitas') }}">Legalitas</a></li>
					</ul>
				</li>
				{{-- <li class="nav-item">
                    <a class="nav-link" href="#product">Layanan Industri</a>
                </li> --}}
				<li class="nav-item">
                    <a class="nav-link" href="{{ route('galery') }}">Galeri</a>
                </li>
				{{-- <li class="nav-item">
                    <a class="nav-link" href="#berita">Berita</a>
                </li> --}}
				<li class="nav-item">
                    <a class="nav-link w-100" href="{{ route('harga') }}">Harga BBM Pertamina</a>
                </li>
				<li class="nav-item">
                    <a class="nav-link" href="{{ route('contact') }}">Kontak Kami</a>
                </li>
			</ul>
		</div>

		<!-- Toggle button for mobile di kanan -->
		<button id="mobileToggleBtn" class="navbar-toggler ms-auto d-lg-none" type="button" aria-label="Toggle navigation" onclick="showSidebar()" style="filter: invert(1);">
			<span class="navbar-toggler-icon"></span>
		</button>

	</div>
    <!-- Sidebar Mobile dari kanan -->
    <div id="mobileSidebar" class="position-fixed top-0 end-0 vh-100 shadow-lg">
        <div class="d-flex justify-content-end p-3">
            <button type="button" class="btn-close btn-close-white" aria-label="Close" onclick="hideSidebar()"></button>
        </div>
        <ul class="navbar-nav text-end px-3">
            <li class="nav-item dropdown text-right">
                <a class="nav-link dropdown-toggle text-white" href="#" id="profileDropdownMobile" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Profile
                </a>
                <ul class="dropdown-menu dropdown-menu-end text-end">
                    <li><a class="dropdown-item" href="{{ route('visimisi') }}">Visi & Misi</a></li>
                    <li><a class="dropdown-item" href="{{ route('legalitas') }}">Legalitas</a></li>
                </ul>
            </li>
            {{-- <li class="nav-item"><a class="nav-link text-white" href="#product">Layanan Industri</a></li> --}}
            <li class="nav-item"><a class="nav-link text-white" href="{{ route('galery') }}">Galeri</a></li>
            {{-- <li class="nav-item"><a class="nav-link text-white" href="#berita">Berita</a></li> --}}
            <li class="nav-item"><a class="nav-link text-white" href="{{ route('harga') }}">Harga BBM Pertamina</a></li>
            <li class="nav-item"><a class="nav-link text-white" href="#contact">Kontak Kami</a></li>
        </ul>
    </div>
</nav>

<script>
	// Ubah background saat discroll
	window.addEventListener('scroll', function() {
		const navbar = document.getElementById('mainNavbar');
		if (window.scrollY > 50) {
			navbar.style.background = 'rgba(0, 48, 122, 0.95)'; // dark
			navbar.style.backdropFilter = 'blur(10px)';
			navbar.classList.add('shadow');
		} else {
			navbar.style.background = 'rgba(255,255,255,0.2)'; // glass
			navbar.style.backdropFilter = 'blur(10px)';
			navbar.classList.remove('shadow');
		}
	});
</script>
