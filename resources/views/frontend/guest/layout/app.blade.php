<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title> @yield('title') | Text to speech</title>
        <meta name="description" content="Dex.AI - AI Writer & Tech Startup Landing Page Template">
        <meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="shortcut icon" type="image/x-icon" href="{{asset('/')}}frontend/assets/img/favicon.png">
        <!-- Place favicon.ico in the root directory -->

        <!-- CSS here -->
        <link rel="stylesheet" href="{{asset('/')}}frontend/assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{asset('/')}}frontend/assets/css/animate.min.css">
        <link rel="stylesheet" href="{{asset('/')}}frontend/assets/css/magnific-popup.css">
        <link rel="stylesheet" href="{{asset('/')}}frontend/assets/css/fontawesome-all.min.css">
        <link rel="stylesheet" href="{{asset('/')}}frontend/assets/css/odometer.css">
        <link rel="stylesheet" href="{{asset('/')}}frontend/assets/css/slick.css">
        <link rel="stylesheet" href="{{asset('/')}}frontend/assets/css/select2.min.css">
        <link rel="stylesheet" href="{{asset('/')}}frontend/assets/css/animatedheadline.css">
        <link rel="stylesheet" href="{{asset('/')}}frontend/assets/css/aos.css">
        <link rel="stylesheet" href="{{asset('/')}}frontend/assets/css/default.css">
        <link rel="stylesheet" href="{{asset('/')}}frontend/assets/css/style.css">
        <link rel="stylesheet" href="{{asset('/')}}frontend/assets/css/responsive.css">
    </head>
    <body>

        <!-- Preloader -->
        <div id="preloader">
            <div class="spinner">
                <div class="rect1"></div>
                <div class="rect2"></div>
                <div class="rect3"></div>
                <div class="rect4"></div>
                <div class="rect5"></div>
            </div>
        </div>
        <!-- Preloader -->

		<!-- Scroll-top -->
        <button class="scroll-top scroll-to-target" data-target="html">
            <i class="fas fa-angle-up"></i>
        </button>
        <!-- Scroll-top-end-->

        <!-- This is the header section -->
        @include('frontend.guest.layout.partials.header')

        <!-- This is the main content section -->
        @yield('content')

        <!-- This is the footer section for all javaScript links -->
        @include('frontend.guest.layout.partials.footer')

    </body>
</html>