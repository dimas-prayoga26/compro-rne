<aside class="bg-white vh-100 p-3 d-flex flex-column" style="min-width: 250px;">

    <div class="text-center mb-4">
        <a href="/">
            <img src="{{ asset('img/LogoBlack.png') }}" alt="Logo Rnecoid" height="60">
        </a>
    </div>

    <ul class="nav flex-column grow">
        <x-sidebar-link
            :href="route('profile.index')"
            :active="request()->routeIs('profile.index')">
            <i class="fa-solid fa-user"></i>
            Profile
        </x-sidebar-link>

        <x-sidebar-link
            :href="route('lokasi.index')"
            :active="request()->routeIs('lokasi.index')">
            <i class="fa-solid fa-compass"></i>
            Lokasi
        </x-sidebar-link>

        <x-sidebar-link
            :href="route('galeri.index')"
            :active="request()->routeIs('galeri.index')">
            <i class="fa-solid fa-images"></i>
            Galeri
        </x-sidebar-link>

        <x-sidebar-link
            :href="route('harga.index')"
            :active="request()->routeIs('harga.index')">
            <i class="fa-solid fa-tags"></i>
            Harga
        </x-sidebar-link>
    </ul>

    <!-- Logout di bawah -->
    <div class="mt-auto">
        <li class="nav-item mt-3 position-relative link-sidebar">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="nav-link d-flex align-items-center gap-2 text-start border-0 bg-transparent">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    Logout
                </button>
            </form>
        </li>
    </div>

</aside>
