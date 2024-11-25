<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <!-- Metas -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="title" content="@yield('meta_title')">
    <meta name="DC.title" content="@yield('meta_title')">
    <meta property="og:title" content="@yield('meta_title')">
    <meta property="og:type" content="website" />
    <meta name="description" content="@yield('meta_description')">
    <meta itemprop="description" content="@yield('meta_description')">
    <meta property="og:description" content="@yield('meta_description')">
    <meta property="og:url" content="{{ Request::url() }}" />
    <link rel="canonical" href="{{ Request::url() }}" />
    <meta itemprop="image" content="@yield('meta_image')">
    <meta property="og:image" content="@yield('meta_image')">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon -->



    <!-- Title  -->
    <title>@yield('title')</title>


    <!-- Icon CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/remixicon.css') }}">

    <!-- Vendor -->
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/aos.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/range-slider.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/jquery.slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/slick-theme.css') }}">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}?v={{ time() }}">

    {!! Value::get('scripts_head') !!}
</head>

<body class="body-bg-6">
    {!! Value::get('scripts_body_start') !!}
    <!-- Loader -->
    <div id="cr-overlay">
        <span class="loader"></span>
    </div>


    @include('site.widgets.header')
    @include('site.widgets.mobile_menu')

    @yield('content')

    @include('site.widgets.footer')

    <!-- Tab to top -->
    <a href="index.html#Top" class="back-to-top result-placeholder">
        <i class="ri-arrow-up-line"></i>
        <div class="back-to-top-wrap">
            <svg viewBox="-1 -1 102 102">
                <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
            </svg>
        </div>
    </a>

    <!-- Vendor Custom -->
    <script src="{{ asset('assets/js/vendor/jquery-3.6.4.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/jquery.zoom.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/mixitup.min.js') }}"></script>

    <script src="{{ asset('assets/js/vendor/range-slider.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/aos.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/slick.min.js') }}"></script>

    @stack('linkscripts')
    <!-- Main Custom -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
    @stack('scripts')

    {!! Value::get('scripts_body_end') !!}

</body>

</html>
