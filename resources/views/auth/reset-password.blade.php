@extends('frontend.guest.layout.app')

@section('title')
Reset-Password page
@endsection

@section('content')
    <!-- login-area -->
    <section class="login-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-10">
                    <div class="login-content">
                        <h3 class="text-color">Reset your password </h3>
                        <span  class="text-color">👋 No problem. You can reset your new password.</span>
                        <form class="" action="{{route('password.store')}}" method="POST">
                            @csrf
                            <!-- Password Reset Token -->
                            <input type="hidden" name="token" value="{{ $request->route('token') }}">

                            <div class="form-grp">
                                    <label for="email" class="text-color">Your Email</label>
                                    <input type="email" class="login-input-field" value="{{old('email', $request->email)}}" placeholder="Enter your Email" id="email" name="email">
                                    @error('email')
                                        <span class="text-start text-danger" >{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-grp">
                                    <label for="word" class="text-color">Password</label>
                                    <input class="login-input-field" type="password" name="password"  placeholder="Enter Password">
                                    @error('password')
                                        <span class="text-start text-danger" >{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-grp">
                                    <label for="word" class="text-color">Confirme Password</label>
                                    <input class="login-input-field" type="password" name="password_confirmation"  placeholder="Enter Confirme Password">
                                    @error('password_confirmation')
                                        <span class="text-start text-danger" >{{$message}}</span>
                                    @enderror
                                </div>
                            <button type="submit" class="sine-btn">Reset Password</button>
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