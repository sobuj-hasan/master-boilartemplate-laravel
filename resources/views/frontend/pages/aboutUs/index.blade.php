@extends('frontend.layouts.app')

@section('title')
    About Us page
@endsection

@section('content')
    <!-- breadcrumb-area -->
    @include('frontend.pages.aboutUs.breadcrumb_area')

    <!-- about-area -->
    @include('frontend.pages.aboutUs.about_area')

    <!-- team-area -->
    @include('frontend.pages.aboutUs.team_area')

    <!-- counter-area -->
    @include('frontend.pages.aboutUs.counter_area')
@endsection
