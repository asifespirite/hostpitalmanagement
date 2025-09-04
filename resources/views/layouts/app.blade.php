<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Dashboard')</title>

    <!-- Meta -->
    <meta name="description" content="Marketplace for Bootstrap Admin Dashboards">
    <meta property="og:title" content="Admin Templates - Dashboard Templates">
    <meta property="og:description" content="Marketplace for Bootstrap Admin Dashboards">
    <meta property="og:type" content="Website">
    <!-- <link rel="shortcut icon" href="assets/images/favicon.svg"> -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.svg') }}">

    <link href="{{ asset('assets/fonts/remix/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/main.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/overlay-scroll/OverlayScrollbars.min.css') }}" rel="stylesheet">


</head>

<body>

    <!-- Loading starts -->
    <div id="loading-wrapper">
        <div class='spin-wrapper'>
            <div class='spin'>
                <div class='inner'></div>
            </div>
            <div class='spin'>
                <div class='inner'></div>
            </div>
            <div class='spin'>
                <div class='inner'></div>
            </div>
            <div class='spin'>
                <div class='inner'></div>
            </div>
            <div class='spin'>
                <div class='inner'></div>
            </div>
            <div class='spin'>
                <div class='inner'></div>
            </div>
        </div>
    </div>
    <!-- Loading ends -->
    <div class="page-wrapper">

        @include('layouts.header')

        <div class="main-container">
            @include('layouts.sidebar')

            <div class="app-container">
                @include('layouts.hero_header')

                <div class="app-body">
                    @yield('content')

                </div>

                @include('layouts.footer')
            </div>
        </div>
    </div>



    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/moment.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/overlay-scroll/jquery.overlayScrollbars.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/overlay-scroll/custom-scrollbar.js') }}"></script>

    <script src="{{ asset('assets/vendor/apex/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/apex/custom/home/patients.js') }}"></script>
    <script src="{{ asset('assets/vendor/apex/custom/home/treatment.js') }}"></script>
    <script src="{{ asset('assets/vendor/apex/custom/home/available-beds.js') }}"></script>
    <script src="{{ asset('assets/vendor/apex/custom/home/earnings.js') }}"></script>
    <script src="{{ asset('assets/vendor/apex/custom/home/gender-age.js') }}"></script>
    <script src="{{ asset('assets/vendor/apex/custom/home/claims.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    @stack('scripts')

</body>

</html>
