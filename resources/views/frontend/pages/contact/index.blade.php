@extends('frontend.layouts.app')

@section('title')
    Contact page
@endsection

@section('content')

<!-- main-area -->
<main class="banner-area-two">
    <!-- breadcrumb-area -->
    <section class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="banner-content-two text-center">
                        <h2 class="title">Get in Touch</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb-area-end -->

    <!-- contact-area -->
    <section class="contact-area pb-140">
        <div class="container">
            <div class="contact-info-wrap">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6">
                        <div class="contact-info-item">
                            <div class="icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="content">
                                <h2 class="title">Visit Us Daily</h2>
                                <p>1791 Yorkshire Circle KittyNY <br> 10002,USA</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="contact-info-item">
                            <div class="icon">
                                <i class="fas fa-phone-volume"></i>
                            </div>
                            <div class="content">
                                <h2 class="title">Contact Us</h2>
                                <span>+ 1 008-345-6789</span>
                                <span>+1 800-789-4561</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="contact-info-item">
                            <div class="icon">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div class="content">
                                <h2 class="title">Email Us</h2>
                                <span>Sotcoxinfo@example.com</span>
                                <span>Webyourinfo@gmail.com</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="contact-form-wrap">
                        <h2 class="title">Do you have <span>question contact us</span></h2>
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="responds-wrap">
                                    <ul class="list-wrap">
                                        <li><img src="{{ asset('frontend') }}/assets/img/images/m_voice_img01.png" alt=""></li>
                                        <li><img src="{{ asset('frontend') }}/assets/img/images/m_voice_img02.png" alt=""></li>
                                        <li><img src="{{ asset('frontend') }}/assets/img/images/m_voice_img03.png" alt=""></li>
                                        <li><img src="{{ asset('frontend') }}/assets/img/images/m_voice_img04.png" alt=""></li>
                                        <li><img src="{{ asset('frontend') }}/assets/img/images/m_voice_img05.png" alt=""></li>
                                    </ul>
                                    <p>Responds in 4-8 hours</p>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                @include('frontend.pages.contact.contact_form')
                            </div>
                        </div>
                        <div class="contact-shape">
                            <img src="{{ asset('frontend') }}/assets/img/images/contact_shape.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- contact-area-end -->

    <!-- contact-map -->
    <div class="contact-map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d116834.01522837335!2d90.33688078598112!3d23.78077167863703!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8b087026b81%3A0x8fa563bbdd5904c2!2sDhaka!5e0!3m2!1sen!2sbd!4v1687086003234!5m2!1sen!2sbd"  allowfullscreen="" loading="lazy"></iframe>
    </div>
    <!-- contact-map-end -->

</main>
<!-- main-area-end -->
@endsection