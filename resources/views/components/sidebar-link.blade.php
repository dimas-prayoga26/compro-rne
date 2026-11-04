@props([
    'href' => '',
    'active' => 'false'
])

<li class="nav-item w-100 mt-3 position-relative link-sidebar {{ $active == 'true' ? 'active' : '' }}">
    <a href="{{ $href }}"
       class="nav-link d-flex align-items-center gap-2 w-100 text-dark">
        {{ $slot }}
    </a>
</li>
