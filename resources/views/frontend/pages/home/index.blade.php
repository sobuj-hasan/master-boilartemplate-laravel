@extends('frontend.layouts.app')

@section('title')
    Home page
@endsection

@section('content')
<!-- main-area -->
<main>
    <!-- banner-area -->
    @include('frontend.pages.home.partials.banner_area')
    <!-- banner-area-end -->

    <!-- speech-area -->
    @include('frontend.pages.home.partials.speech_area')
    <!-- speech-area-end -->

    <!-- brand-area -->
    @include('frontend.pages.home.partials.brand_area')
    <!-- brand-area-end -->

    <!-- compare-area -->
    @include('frontend.pages.home.partials.compare_area')
    <!-- compare-area-end -->

    <!-- Voice Transform area -->
    @include('frontend.pages.home.partials.voice_transform_area')
    <!-- Voice Transform area end -->

    <!-- testimonial-area -->
    @include('frontend.pages.home.partials.testimonial_area')
    <!-- testimonial-area-two -->

    <!-- services-area -->
    @include('frontend.pages.home.partials.service_area')
    <!-- services-area-end -->

    <!-- language-area -->
    @include('frontend.pages.home.partials.language_area')
    <!-- language-area-end -->
    <!-- area-bg -->
    @include('frontend.pages.home.partials.area_bg')
    <!-- area-bg-end -->
</main>
<!-- main-area-end -->
@endsection
