@extends('frontend.guest.layout.app')

@section('title')
    Forget-Password page
@endsection

@section('content')
    <!-- login-area -->
    <section class="login-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-10">
                    <div class="login-content">
                        <h3 class="text-color">Forgot your password !</h3>
                        <span  class="text-color">👋 Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.</span>
                        <x-auth-session-status class="bg-success text-white mb-4 p-3 rounded-3" :status="session('status')" />
                        <form class="" action="{{route('password.email')}}" method="POST">
                            @csrf
                            <div class="form-grp">
                                <label for="email" class="text-color">Your Email</label>
                                <input type="email" class="login-input-field" name="email" value="{{old('email')}}" placeholder="Enter your Email">
                                @error('email')
                                    <span class="text-start text-danger" >{{$message}}</span>
                                @enderror
                            </div>
                            <button type="submit" class="sine-btn">Email Password Reset Link</button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="login-right-content-wrap">
                        <!-- <div class="login-right-bg" data-background="{{asset('/')}}frontend/assets/img/bg/error_bg.jpg"></div> -->
                        <div class="login-right-content-inner">
                            <img src="{{asset('/')}}frontend/assets/img/images/login_img.png" alt="">
                            <h4 class="text-color">Revolutionize your writing: Try <span>AI writer today</span> and watch your content soar</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- login-area-end -->
@endsection