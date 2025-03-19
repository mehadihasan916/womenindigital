<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">
        <!-- App title -->
        <title>@yield('page-title')</title>
        <!-- App Favicon -->
        <link href="{{ asset('assets/admin/images/fav-icon.png') }}" rel="icon">
        <!-- Bootstrap CSS -->
        <link href="{{ asset('assets/admin/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- Yield Css -->
        @stack('page-css')
        <!-- App CSS -->
        <link href="{{ asset('assets/admin/css/style.css') }}" rel="stylesheet" type="text/css" />
        <!-- IziToast Css -->
        <link href="{{ asset('css/iziToast.css') }}" rel="stylesheet">
        <!-- Modernizr js -->
        <script src="{{ asset('assets/admin/js/modernizr.min.js') }}"></script>
    </head>
    <body class="fixed-left">
        <!-- Begin page -->
        <div id="wrapper">
            @include('errors.message')
            <!-- Top Bar Start -->
            @include('layouts.admin.partials.header')
            <!-- Top Bar End -->
            <!-- Left Sidebar Start -->
            @include('layouts.admin.partials.sidebar')
            <!-- Left Sidebar End -->
            <!-- Start right Content here -->
            <div class="content-page">
                @yield('page-content')
            </div>
            <!-- End content-page -->
            <!-- Footer -->
            <footer class="footer">
                © Women In Digital 2013-{{ date('Y') }}.
            </footer>
            <!-- Footer End -->
        </div>
        <!-- END wrapper -->

        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="{{ asset('assets/admin/js/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/admin/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/admin/js/detect.js') }}"></script>
        <script src="{{ asset('assets/admin/js/fastclick.js') }}"></script>
        <script src="{{ asset('assets/admin/js/jquery.blockUI.js') }}"></script>
        <script src="{{ asset('assets/admin/js/waves.js') }}"></script>
        <script src="{{ asset('assets/admin/js/jquery.nicescroll.js') }}"></script><!-- new -->
        <script src="{{ asset('assets/admin/js/jquery.scrollTo.min.js') }}"></script><!-- new -->
        <script src="{{ asset('assets/admin/js/jquery.slimscroll.js') }}"></script><!-- new -->
        <!-- Counter Up  -->
        <script src="{{ asset('assets/admin/plugins/waypoints/lib/jquery.waypoints.min.js') }}"></script>
        <script src="{{ asset('assets/admin/plugins/counterup/jquery.counterup.js') }}"></script>
        <!-- Page specific js -->
        <script src="{{ asset('assets/admin/pages/jquery.dashboard.js') }}"></script>
        <!-- Yield Js -->
        @stack('page-js')
        <!-- IziToast Js -->
        <script src="{{ asset('js/iziToast.js') }}"></script>
        @include('vendor.lara-izitoast.toast')
        <!-- App js -->
        <script src="{{ asset('assets/admin/js/jquery.core.js') }}"></script>
        <script src="{{ asset('assets/admin/js/jquery.app.js') }}"></script>
    </body>
</html>