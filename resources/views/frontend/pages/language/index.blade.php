@extends('frontend.layouts.app')

@section('title')
    Text To Speech | Language page
@endsection

@section('content')

<!-- main-area -->
<main class="main-content-three fix">
      <!-- banner-area -->
        @include('frontend.pages.language.partials.header-banar')
      <!-- banner-area-end -->

      <!-- speech-area -->
        @include('frontend.pages.language.partials.speech-area')
      <!-- speech-area-end -->

      <!-- brand-area -->
        @include('frontend.pages.language.partials.brand-area')
      <!-- brand-area-end -->

      <!-- services-area -->
        @include('frontend.pages.language.partials.service-area')
      <!-- services-area-end -->

      <!-- about-area -->
        @include('frontend.pages.language.partials.about-area')
      <!-- about-area-end -->

      <!-- voices-area -->
        @include('frontend.pages.language.partials.voice-area')
      <!-- voices-area-end -->

      <!-- pricing-area -->
        @include('frontend.pages.language.partials.pricing-area')
      <!-- pricing-area-end -->

      <!-- testimonial-area -->
        @include('frontend.pages.language.partials.testimonial')
      <!-- testimonial-area-end -->

      <!-- cta-area -->
      @include('frontend.pages.language.partials.cta-area')
      <!-- cta-area-end -->
    </main>
    <!-- main-area-end -->

@endsection
