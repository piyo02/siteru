<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>{{ env('APP_NAME') }}</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <link href="{{ asset('assets/guest/img/favicon.ico') }}" rel="icon">

  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <link href="{{ asset('assets/guest/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/guest/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/guest/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/guest/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/guest/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/guest/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/guest/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">

  <link href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" rel="stylesheet"/>
  <link href="{{ asset('assets/guest/vendor/leaflet/leaflet.groupedlayercontrol.css') }}" rel="stylesheet"/>
  <link href="{{ asset('assets/guest/vendor/leaflet/Control.MiniMap.css') }}" rel="stylesheet"/>
  <link href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" rel="stylesheet"/>
  <link href="https://api.tiles.mapbox.com/mapbox.js/plugins/leaflet-locatecontrol/v0.43.0/L.Control.Locate.css"rel="stylesheet"/>
  <link href="{{ asset('assets/guest/vendor/leaflet/L.Control.ZoomBar.cs') }}s"rel="stylesheet"/>
  <link href="{{ asset('assets/guest/vendor/leaflet/Leaflet.Coordinates-0.1.5.cs') }}s"rel="stylesheet"/> 


  <link href="{{ asset('assets/guest/css/style.css') }}" rel="stylesheet">
</head>

<body>

  @include('guest.v3.layout.header')
  @if (Request::is('/'))
    @include('guest.v3.layout.hero')
  @endif

  <main id="main">

    @yield('content')

  </main>

  @include('guest.v3.layout.footer')

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/guest/vendor/purecounter/purecounter.js') }}"></script>
  <script src="{{ asset('assets/guest/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('assets/guest/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/guest/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('assets/guest/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('assets/guest/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('assets/guest/vendor/waypoints/noframework.waypoints.js') }}"></script>
  <script src="{{ asset('assets/guest/vendor/php-email-form/validate.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/popper.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>

  <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script> 
  <script src="{{ asset('assets/guest/vendor/leaflet/leaflet.groupedlayercontrol.js') }}"></script> 
  <script src="{{ asset('assets/guest/vendor/leaflet/Control.MiniMap.js') }}"></script> 
  <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script> 
  <script src="https://api.tiles.mapbox.com/mapbox.js/plugins/leaflet-locatecontrol/v0.43.0/L.Control.Locate.min.js"></script>
  <script src="{{ asset('assets/guest/vendor/leaflet/L.Control.ZoomBar.js') }}"></script> 
  <script src="{{ asset('assets/guest/vendor/leaflet/Leaflet.Coordinates-0.1.5.min.js') }}"></script>

  <script src="{{ asset('assets/guest/js/main.js') }}"></script>

</body>

</html>