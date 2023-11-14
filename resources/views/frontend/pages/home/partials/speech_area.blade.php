<div class="features-area features-bg" data-background="{{ asset('frontend') }}/assets/img/bg/features_bg.png" style="background-image: url(&quot;{{ asset('frontend') }}/assets/img/bg/features_bg.png&quot;);">
    <div class="features-item-wrap">
        <div class="container">
            <div class="row justify-content-center">
                @foreach ($hbannerservice as $item)
                    @if ($item->is_active)
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="features-item">
                                <div class="icon">
                                    <i class="far fa-check"></i>
                                </div>
                                <div class="content">
                                    <span>{{ $item->title }}</span>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
    <div class="container custom-container">
        <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-10 col-md-12">
            <div class="speech-item speech-item-two">
                <form action="#" class="engine-form">
                <div class="row">
                    <div class="col-md-6">
                    <div class="lang-ordering">
                        <select id="id_select3_example" style="width: 100%">
                        <option data-img_src="{{ asset('frontend') }}/assets/img/images/flag01.png">
                            English (American)
                        </option>
                        <option data-img_src="{{ asset('frontend') }}/assets/img/images/flag02.png">
                            English (British)
                        </option>
                        <option data-img_src="{{ asset('frontend') }}/assets/img/images/flag03.png">
                            Bengali (Bangladesh)
                        </option>
                        <option data-img_src="{{ asset('frontend') }}/assets/img/images/flag04.png">
                            English (Canada)
                        </option>
                        <option data-img_src="{{ asset('frontend') }}/assets/img/images/flag05.png">
                            Zulu (South Africa)
                        </option>
                        <option data-img_src="{{ asset('frontend') }}/assets/img/images/flag06.png">
                            Hindi (India)
                        </option>
                        </select>
                    </div>
                    </div>
                    <div class="col-md-6">
                    <div class="voice-ordering">
                        <select id="id_select2_example_two" style="width: 100%">
                        <option
                            data-img_src="{{ asset('frontend') }}/assets/img/images/s_voice_img01.png"
                        >
                            Amber (HD)
                        </option>
                        <option
                            data-img_src="{{ asset('frontend') }}/assets/img/images/s_voice_img02.png"
                        >
                            Brandon (HD)
                        </option>
                        <option
                            data-img_src="{{ asset('frontend') }}/assets/img/images/s_voice_img03.png"
                        >
                            Tony (HD)
                        </option>
                        <option
                            data-img_src="{{ asset('frontend') }}/assets/img/images/s_voice_img04.png"
                        >
                            Michael (HD)
                        </option>
                        <option
                            data-img_src="{{ asset('frontend') }}/assets/img/images/s_voice_img05.png"
                        >
                            Sara (HD)
                        </option>
                        <option
                            data-img_src="{{ asset('frontend') }}/assets/img/images/s_voice_img06.png"
                        >
                            Prabhat (HD)
                        </option>
                        </select>
                    </div>
                    </div>
                </div>
                <div class="form-grp">
                    <textarea
                    name="dirtyContent"
                    id="dirtyContent"
                    placeholder="Enter Text here.."
                    ></textarea>
                    <div class="form-content">
                    <span
                        >Free use of Voicer Studio is limited to 50 characters.
                        For more <br />
                        usage and premium voices, you can purchase
                        packages.</span
                    >
                    <span id="maxLenghtCounter" class="badge-default"
                        >0 characters</span
                    >
                    </div>
                </div>

                <div class="controling-system text-center mb-20">
                    <div class="row">
                    <div class="col-md-6">
                        <div class="sign-up d-flex justify-content-center">
                        <h4 class="title mt-2 mx-2">Audio Control</h4>
                        <a class="signup-btn mx-2" href="#">Signup</a>
                        </div>
                        <div class="no-name-class mt-20">
                        <button class="mx-1 my-1" type="submit">Rate</button>
                        <button class="mx-1 my-1" type="submit">Pitch</button>
                        <button class="mx-1 my-1" type="submit">Valume</button>
                        <button class="mx-1 my-1" type="submit">Newscast</button>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="sign-up d-flex justify-content-center">
                        <h4 class="title mt-2 mx-2">Advance Effects</h4>
                        <a class="signup-btn mx-2" href="#">Signup</a>
                        </div>
                        <div class="no-name-class mt-20">
                        <button class="mx-1 my-1" type="submit">Angry</button>
                        <button class="mx-1 my-1" type="submit">Cheerful</button>
                        <button class="mx-1 my-1" type="submit">Excited</button>
                        <button class="mx-1 my-1" type="submit">Newcast</button>
                        <button class="mx-1 my-1" type="submit">Shouting</button>
                        <button class="mx-1 my-1" type="submit">Whishpering</button>
                        <button class="mx-1 my-1" type="submit">Friendly</button>
                        <button class="mx-1 my-1" type="submit">Hopeful</button>
                        <button class="mx-1 my-1" type="submit">Sad</button>
                        <button class="mx-1 my-1" type="submit">Shouting</button>
                        <button class="mx-1 my-1" type="submit">Terrified</button>
                        </div>
                    </div>
                    </div>
                </div>

                <button type="submit" class="speech-btn">
                    <span></span>
                    <span></span>
                    <span></span>
                    text to speech
                </button>
                <div class="hidden-btn-wrap">
                    <div class="hidden-btn-inner">
                    <button type="submit">
                        <i class="fas fa-play"></i>listen
                    </button>
                    <button type="submit" class="download">
                        <i class="fas fa-download"></i>Download
                    </button>
                    </div>
                </div>

                </form>
            </div>
            </div>
        </div>
        </div>
    </div>
    <div class="features-shape-wrap">
        <img src="{{ asset('frontend') }}/assets/img/images/features_shape01.png" alt="" data-aos="fade-right" data-aos-delay="300" class="aos-init aos-animate">
        <img src="{{ asset('frontend') }}/assets/img/images/features_shape02.png" alt="" class="alltuchtopdown">
        <img src="{{ asset('frontend') }}/assets/img/images/features_shape03.png" alt="">
    </div>
</div>
