@extends('frontend.guest.layout.app')

@section('title')
    Register page
@endsection

@section('content')
    <!-- main-area -->
    <main class="login-main-section main-content">
        <!-- login-area -->
        <section class="login-area">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5 col-md-10">
                        <div class="login-content">
                            <h3 class="text-color">Create your account</h3>
                            <span  class="text-color">👋 Welcome back! Please enter your details.</span>
                            <form class="" action="{{route('register')}}" method="POST">
                                @csrf
                                <div class="form-grp">
                                    <label for="name" class="text-color">User Name</label>
                                    <input type="text" class="login-input-field" value="{{old('name')}}" placeholder="Enter your Name" id="name" name="name">
                                    @error('name')
                                        <span class="text-start text-danger" >{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-grp">
                                    <label for="email" class="text-color">Your Email</label>
                                    <input type="email" class="login-input-field" value="{{old('email')}}" placeholder="Enter your Email" id="email" name="email">
                                    @error('email')
                                        <span class="text-start text-danger" >{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-grp">
                                    <label for="word" class="text-color">Password</label>
                                    <input class="login-input-field" type="password" value="{{old('password')}}" name="password"  placeholder="Enter Password">
                                    @error('password')
                                        <span class="text-start text-danger" >{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-grp">
                                    <label for="word" class="text-color">Confirme Password</label>
                                    <input class="login-input-field" type="password" value="{{old('password_confirmation')}}" name="password_confirmation"  placeholder="Enter Confirme Password">
                                    @error('password_confirmation')
                                        <span class="text-start text-danger" >{{$message}}</span>
                                    @enderror
                                </div>
                                <button type="submit" class="sine-btn">sing up</button>
                                <button type="submit"class="text-color google-btn"><img src="{{ asset('frontend') }}/assets/img/images/google.png" alt="login img"> sing up with google</button>
                                <a href="{{route('login')}}"><span  class="text-color">Have you an account? Sign in here</span></a>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="login-right-content-wrap">
                            <!-- <div class="login-right-bg" data-background="assets/img/bg/error_bg.jpg"></div> -->
                            <div class="login-right-content-inner">
                                <img src="{{ asset('frontend') }}/assets/img/images/login_img.png" alt="">
                                <h4 class="text-color">Revolutionize your writing: Try <span>AI writer today</span> and watch your content soar</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- login-area-end -->

    </main>
    <!-- main-area-end -->
@endsection