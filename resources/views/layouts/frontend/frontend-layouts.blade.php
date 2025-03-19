<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <!--####################################
  # SEO Tag And Information | Meta Tag
  #####################################-->
  <meta property="og:locale" content="en-US">
  <meta name="author" content="Women In Digital">
  <meta name="distribution" content="Global">
  <meta name="theme-color" content="#ff0000">
  <meta name="rating" content="General">
  <meta name="google-site-verification" content="" />
  <meta name="keywords" content="women in digital">
  <!-- Page Meta Tag -->
  @stack('meta-tag')
  <!--####################################
  # SEO Tag And Information End
  #####################################-->
  <!-- Page Titile -->
  <title>@yield('title')</title>
  <!-- Favicons -->
  <link href="{{ asset('assets/frontend/img/logo/fav-icon.png') }}" rel="icon">
  <link href="{{ asset('assets/frontend/img/logo/fav-icon.png') }}" rel="apple-touch-icon">
  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/frontend/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/frontend/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/frontend/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/frontend/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <!-- Template Main CSS File -->
  <link href="{{ asset('assets/frontend/css/custom.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/frontend/css/style.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/frontend/css/responsive.css') }}" rel="stylesheet">
  <!-- IziToast Css -->
  <link href="{{ asset('css/iziToast.css') }}" rel="stylesheet">
  <!-- Page Css -->
  @stack('page-css')
</head>
<body>
  <!-- ======= Header ======= -->
  @include('layouts.frontend.partials.header')
  <!-- End Header -->
  <!-- ======= Yield Another Page ======= -->
  @yield('page-content')
  <!-- Yield Another Page End -->
  <!-- ======= Footer ======= -->
  @include('layouts.frontend.partials.footer')
  <!-- End Footer -->
  <!-- Back To Top Button -->
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <!-- Vendor JS Files -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="{{ asset('assets/frontend/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <!-- Yield Page JS -->
  @stack('page-js')
  <!-- IziToast Js -->
  <script src="{{ asset('js/iziToast.js') }}"></script>
  @include('vendor.lara-izitoast.toast')
  <!-- Template Main JS File -->
  <script src="{{ asset('assets/frontend/js/main.js') }}"></script>
</body>
</html>