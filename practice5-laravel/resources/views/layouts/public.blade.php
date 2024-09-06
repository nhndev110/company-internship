<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>@yield('title')</title>
  <meta name="keywords" content="HTML5 Template">
  <meta name="description" content="Molla - Bootstrap eCommerce Template">
  <meta name="author" content="p-themes">
  <!-- Favicon -->
  <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/images/icons/apple-touch-icon.png') }}">
  <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/images/icons/favicon-32x32.png') }}">
  <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/icons/favicon-16x16.png') }}">
  <link rel="manifest" href="{{ asset('assets/images/icons/site.html') }}">
  <link rel="mask-icon" href="{{ asset('assets/images/icons/safari-pinned-tab.svg') }}" color="#666666">
  <link rel="shortcut icon" href="{{ asset('assets/images/icons/favicon.ico') }}">
  <meta name="apple-mobile-web-app-title" content="{{ config('app.name') }}">
  <meta name="application-name" content="{{ config('app.name') }}">
  <meta name="msapplication-TileColor" content="#cc9966">
  <meta name="msapplication-config" content="{{ asset('assets/images/icons/browserconfig.xml') }}">
  <meta name="theme-color" content="#ffffff">
  <link rel="stylesheet" href="{{ asset('assets/vendor/line-awesome/css/line-awesome.min.css') }}">
  <!-- Plugins CSS File -->
  <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
  @yield('plugin-css')
  <!-- Main CSS File -->
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/skins/skin-demo-4.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/demos/demo-4.css') }}">
  @yield('css')
</head>

<body>
  <div class="page-wrapper">
    @include('components.header')

    <main class="main">
      @yield('main')
    </main>

    @include('components.footer')
  </div>

  <button id="scroll-top" title="Back to Top"><i class="icon-arrow-up"></i></button>

  <!-- Mobile Menu -->
  <div class="mobile-menu-overlay"></div>

  <!-- Plugins JS File -->
  <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/js/jquery.hoverIntent.min.js') }}"></script>
  <script src="{{ asset('assets/js/jquery.waypoints.min.js') }}"></script>
  <script src="{{ asset('assets/js/superfish.min.js') }}"></script>
  <script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
  @yield('plugin-js')
  <!-- Main JS File -->
  <script src="{{ asset('assets/js/main.js') }}"></script>
  @yield('js')
</body>

</html>
