<section class="banner-area-two">
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-9 col-lg-10">
        <div class="banner-content-two">
            <h2 class="title wow fadeInUp" data-wow-delay=".2s">
            {{ $hbanner->title['restOfWords'] ?? 'Create videos from plain text' }}
            <span>
                <strong>
                    {{ $hbanner->title['lastTwoWords'] ?? 'in minutes' }}
                <svg
                    viewBox="0 0 345 23"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                >
                    <path
                    fill-rule="evenodd"
                    clip-rule="evenodd"
                    d="M344.366 0.00527191C231.51 16.2892 117.803 18.0623 5.82257 7.9456C3.59842 7.74418 0.292572 9.4891 0.0174561 12.1809C-0.260559 14.9221 2.83823 17.0748 5.06818 17.301C117.89 28.79 231.159 22.6085 344.545 1.4609C345.266 1.32606 345.074 -0.0971813 344.366 0.00527191Z"
                    fill="url(#banner)"
                    />
                    <defs>
                    <linearGradient
                        id="banner"
                        x1="376.061"
                        y1="0.000463246"
                        x2="10.2776"
                        y2="101.79"
                        gradientUnits="userSpaceOnUse"
                    >
                        <stop offset="0.0361276" stop-color="#FAEC60" />
                        <stop offset="0.159651" stop-color="#E5A34B" />
                        <stop offset="0.269837" stop-color="#EE6E4D" />
                        <stop offset="0.42316" stop-color="#F44380" />
                        <stop offset="0.55979" stop-color="#BE3DB3" />
                        <stop offset="0.745252" stop-color="#7746E6" />
                        <stop offset="0.888441" stop-color="#5A71F1" />
                        <stop offset="1" stop-color="#439EFF" />
                    </linearGradient>
                    </defs>
                </svg>
                </strong>
            </span>
            </h2>
            <p class="wow fadeInUp" data-wow-delay=".4s">
            {{ $hbanner->description ?? 'DEX.AI is an AI video creation platform. Thousands of companies use it to create videos in 120 languages, saving up to 80% of their time and budget.' }}
            </p>
            <div class="banner-btn-two">
                @foreach ($hbannerbtn as $item)
                    @if ($item->is_active)
                        <a href="{{ $item->url }}" class="gradient-btn gradient-btn-three wow fadeInLeft" data-wow-delay=".6s" target="_blank">
                            {{ $item->title }}
                        </a>
                    @endif
                @endforeach
            </div>
        </div>
        </div>
    </div>
    </div>
    <div class="banner-shape-wrap">
    <img
        src="{{ asset('frontend') }}/assets/img/banner/banner_shape01.png"
        alt=""
        class="rotateme"
    />
    <img
        src="{{ asset('frontend') }}/assets/img/banner/banner_shape02.png"
        alt=""
        class="alltuchtopdown"
    />
    </div>
</section>
