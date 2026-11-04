<!-- Leaflet CSS & JS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

<!-- Section: Lokasi PT RNE -->
<section id="location">
  <div class="container mb-4 py-3">
    <h5 class="fw-bold">JANGKAUAN KAMI</h5>
    <h2 class="fw-bold">Lokasi PT RNE</h2>
    <p>
      Jaringan kami tersebar di wilayah strategis, siap mendukung pasokan
      energi solar yang andal untuk operasional Anda
    </p>

    <!-- Map container -->
    <div class="map" id="map" data-location='@json($location)' data-google-api-key="{{ config('services.google.api_key') }}" style="height: 500px; border-radius: 12px; overflow: hidden;" data-aos="zoom-in" data-aos-duration="700" data-aos-once="true"></div>
  </div>
</section>

<script src="{{ asset('js/lokasi.js') }}?v={{ filemtime(public_path('js/lokasi.js')) }}"></script>
