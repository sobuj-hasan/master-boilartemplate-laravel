<!-- header-area -->
<header>
    <div id="header-fixed-height"></div>
    <!-- <div class="header-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="header-top-content text-center">
                            <p>Sign up and receive 20% bonus discount on checkout. <a href="contact.html">Learn more <i class="far fa-angle-right"></i></a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
    <div id="sticky-header" class="menu-area menu-area-two">
    <div class="container custom-container">
        <div class="row">
        <div class="col-12">
            <div class="mobile-nav-toggler"><i class="fas fa-bars"></i></div>
            <div class="menu-wrap">
            <nav class="menu-nav">
                <div class="logo">
                <a href="{{route('homepage')}}"
                    ><img src="{{ asset('frontend') }}/assets/img/logo/logo02.png" alt="Logo"
                /></a>
                </div>
                <div class="navbar-wrap main-menu d-none d-lg-flex">
                <ul class="navigation">
                    <li class="active menu-item-has-children">
                    <a href="{{route('homepage')}}">Home</a>
                    <ul class="sub-menu">
                        <li><a href="index.html">Home One</a></li>
                        <li class="active">
                        <a href="index-2.html">Home Two</a>
                        </li>
                        <li><a href="index-3.html">Home Three</a></li>
                    </ul>
                    </li>
                    <li><a href="{{route('aboutUs')}}">About Us</a></li>
                    <li class="menu-item-has-children">
                    <a href="#">Pages</a>
                    <ul class="sub-menu">
                        <li><a href="work.html">How It Work</a></li>
                        <li><a href="faq.html">Faq Page</a></li>
                        <li><a href="help.html">Help Center</a></li>
                        <li><a href="{{route('login')}}">Login Page</a></li>
                        <li><a href="error.html">404 Error Page</a></li>
                    </ul>
                    </li>
                    <li class="menu-item-has-children">
                    <a href="#">News</a>
                    <ul class="sub-menu">
                        <li><a href="blog.html">Our Blog</a></li>
                        <li><a href="blog-details.html">Blog Details</a></li>
                    </ul>
                    </li>
                    <li><a href="{{route('contact')}}">contacts</a></li>
                </ul>
                </div>
                <div class="header-action d-none d-md-block">
                <ul class="list-wrap">
                    <li class="header-lang">
                    <div class="dropdown">
                        <button
                        class="dropdown-toggle"
                        type="button"
                        id="dropdownMenuButton1"
                        data-bs-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false"
                        >
                        <img
                            src="{{ asset('frontend') }}/assets/img/icon/united-states02.png"
                            alt=""
                        />EN
                        </button>
                        <div
                        class="dropdown-menu"
                        aria-labelledby="dropdownMenuButton1"
                        >
                        <a class="dropdown-item" href="index.html"
                            ><img
                            src="{{ asset('frontend') }}/assets/img/icon/russia02.png"
                            alt=""
                            />RUS</a
                        >
                        <a class="dropdown-item" href="index.html"
                            ><img
                            src="{{ asset('frontend') }}/assets/img/icon/india02.png"
                            alt=""
                            />IND</a
                        >
                        <a class="dropdown-item" href="index.html"
                            ><img
                            src="{{ asset('frontend') }}/assets/img/icon/bangladesh02.png"
                            alt=""
                            />BAN</a
                        >
                        </div>
                    </div>
                    </li>
                    <li class="header-btn">
                    <a href="{{route('register')}}" class="btn">sign up</a>
                    </li>
                </ul>
                </div>
            </nav>
            </div>

            <!-- Mobile Menu  -->
            <div class="mobile-menu">
            <nav class="menu-box">
                <div class="close-btn"><i class="fas fa-times"></i></div>
                <div class="nav-logo">
                <a href="index.html"
                    ><img src="{{ asset('frontend') }}/assets/img/logo/logo02.png" alt="Logo"
                /></a>
                </div>
                <div class="menu-outer">
                <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
                </div>
                <div class="social-links">
                <ul class="clearfix list-wrap">
                    <li>
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    </li>
                    <li>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    </li>
                    <li>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    </li>
                    <li>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    </li>
                    <li>
                    <a href="#"><i class="fab fa-youtube"></i></a>
                    </li>
                </ul>
                </div>
            </nav>
            </div>
            <div class="menu-backdrop"></div>
            <!-- End Mobile Menu -->
        </div>
        </div>
    </div>
    </div>
</header>
<!-- header-area-end -->
