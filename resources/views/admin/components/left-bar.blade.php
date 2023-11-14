 @php
     $admin = Auth::guard('web')->user();
 @endphp
 <div class="vertical-menu">
     <!-- LOGO -->
     <div class="navbar-brand-box">
         <a href="{{ route('dashboard') }}" class="logo logo-dark">
            <span class="logo-lg">
            <h2>Demo Logo</h2>
            {{-- <img src="{{ asset('backend/assets/images/logo.png') }}" alt="logo" height="35"> --}}
            </span>
            {{-- <span class="logo-sm">
                @if (config('app.favicon'))
                    <img src="{{ asset('storage/images/' . config('app.favicon')) }}" alt="logo" height="22">
                @else
                    <img src="{{ asset('assets/images/logo-small.png') }}" alt="logo" height="22">
                @endif
            </span>
            <span class="logo-lg">
                @if (config('app.logo'))
                    <img src="{{ asset('storage/images/' . config('app.logo')) }}" alt="logo" height="35">
                @else
                    <img src="{{ asset('assets/images/logo.png') }}" alt="logo" height="35">
                @endif
            </span> --}}
         </a>
     </div>

     <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect vertical-menu-btn">
         <i class="fa fa-fw fa-bars"></i>
     </button>

     <div data-simplebar class="sidebar-menu-scroll">
         <!--- Sidemenu -->
         <div id="sidebar-menu">
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>
                <li>
                    <a href="{{ route('dashboard') }}">
                        <i class="uil-home-alt"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('settings.view') }}">
                        <i class="uil-cog"></i>
                        <span>Business Settings</span>
                    </a>
                </li>
                <li class="menu-title">Permission</li>
                <li>
                    <a href="{{ route('role.index') }}" class="waves-effect">
                        <i class="mdi mdi-account-cog"></i>
                        <span>Role</span>
                    </a>
                </li>
                <li class="menu-title">Others</li>
                <li>
                    <a href="#" class="has-arrow waves-effect">
                        <i class="mdi mdi-diving-scuba-flag"></i>
                        <span>Banner</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('header_banner.index') }}">Header Banner</a></li>
                        <li><a href="{{ route('header_banner_button.index') }}">Header Banner Button</a></li>
                        <li><a href="{{ route('header_banner_service.index') }}">Header Banner Service</a></li>
                    </ul>
                </li>

                <li>
                    <a href="#" class="has-arrow waves-effect">
                        <i class="fas fa-list-alt"></i>
                        <span>Trusted Clients</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('trusted-client-header.index') }}">Header view</a></li>
                        <li><a href="{{ route('trusted-client-items.index') }}"> Trusted Client Items</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" class="has-arrow waves-effect">
                        <i class="mdi mdi-package"></i>
                        <span>Compare Section</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('compare-header.index')}}">Compare Header </a></li>
                        <li><a href="{{route('compare-item.index')}}"> Compare Item</a></li>
                    </ul>
                </li>
            </ul>
         </div>
         <!-- Sidebar -->
     </div>
 </div>
