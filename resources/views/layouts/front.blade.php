<!DOCTYPE html>
<!--
    Designed and developed by MaxBitz https://maxbitz.com/
-->
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title> Notis Studios </title>

    <meta name="description" content="Providing quality entertainment for the family. Notis Studios is an independent film company out of Oklahoma City with a unique style of filmmaking and music production. This company is made up of 5 individuals that have brought their talents together to create interesting pieces of entertainment for the masses. Our goal is to continue to grow in our craft and release features, shorts, and micro-shorts & original soundtracks as often as possible, adding to the wealth of diverse films released each year." />

    <meta name="keywords" content="movies, film, sport, oklahom, entertainment, tv, shows" />

    <meta name="author" content="nK" />
    <link rel="icon" type="image/png" href="{{url('/')}}/logo.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- START: Styles -->
    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@500;600;700;800&amp;display=swap" />
    <!-- Bootstrap -->
<!-- <link rel="stylesheet" href="{{url('/')}}/front/assets/vendor/bootstrap/dist/css/bootstrap.min.css" /> -->
    <!-- Swiper -->
    <link rel="stylesheet" href="{{url('/')}}/front/assets/vendor/swiper/swiper-bundle.min.css?v=7.2.0" />
    <!-- Fancybox -->
    <link rel="stylesheet" href="{{url('/')}}/front/assets/vendor/fancybox/dist/jquery.fancybox.min.css?v=3.5.7" />
    <!-- Fliqs -->
    <link rel="stylesheet" href="{{url('/')}}/front/assets/css/bootstrap-custom.css?v=1.0.0" />
    <link rel="stylesheet" href="{{url('/')}}/front/assets/css/fliqs.css?v=1.0.0" />
    <!-- RTL (uncomment this to enable RTL support) -->
<!-- <link rel="stylesheet" href="{{url('/')}}/front/assets/css/fliqs-rtl.min.css?v=1.0.0" /> -->
    <!-- Custom Styles -->
    <link rel="stylesheet" href="{{url('/')}}/front/assets/css/custom.css?v=1.0.0" />
    <!-- END: Styles -->
    <!-- jQuery -->
    <script src="{{url('/')}}/front/assets/vendor/jquery/dist/jquery.min.js?v=3.6.0"></script>
    <!-- Preloader -->
    <script src="{{url('/')}}/front/assets/js/preloader.min.js?v=1.0.0"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @yield('css')

    <style>
        @font-face {
            font-family: 'trajon';
            src: url('/fonts/Trajan Pro.ttf') format('truetype');
            font-weight: normal;
            font-style: normal;
        }
    </style>
    <style>
        .changeFont {
            font-family: 'trajon', Arial, sans-serif;
        }
    </style>
</head>
<body id="page" class="flq-navbar-icons-existence">
<!-- Preloader -->
<div class="flq-preloader">
    <div class="flq-preloader-title display-1 h1" style="display: block !important;">
        <img src="{{url('/')}}/logo.png" class="flq-logo" alt="" style="display: block !important; width: 100px; height: 100px">
    </div>
    <div class="flq-preloader-title display-1 h1">
        <span class="changeFont">N</span>
        <span class="changeFont">O</span>
        <span class="changeFont">T</span>
        <span class="changeFont">I</span>
        <span class="changeFont">S</span>
    </div>
</div>
<div class="flq-preloader-bg"></div>
<!-- / Preloader -->
<!-- Navbar top -->
<nav class="flq-navbar flq-navbar-top flq-navbar-top-cloud flq-navbar-top-fixed">
    <div class="flq-navbar-container container-fluid">
        <a href="{{url('/')}}" class="flq-navbar-brand me-auto me-auto me-lg-4">
            <img src="{{url('/')}}/logo.png" class="flq-logo" alt="">
        </a>
        <ul class="nav nav-parent flex-grow-1 flq-navbar-nav justify-content-center d-none d-lg-flex">
            <li class="nav-item {{ request()->routeIs('home') ? 'active' : '' }}">
                <a href="{{url('/')}}" class="nav-link">
                    <span class="nav-link-name">Home</span>
                </a>
            </li>
            <li class="nav-item {{ request()->routeIs('pricing') ? 'active' : '' }}">
                <a href="{{route('pricing')}}" class="nav-link">
                    <span class="nav-link-name">Pricing</span>
                </a>
            </li>
            <li class="nav-item {{ request()->routeIs('networks') ? 'active' : '' }}">
                <a href="{{route('networks')}}" class="nav-link">
                    <span class="nav-link-name">Network</span>
                </a>
            </li>
            @php
                $movies = App\Models\MediaCategory::where('type', 1)->where('status', 1)->get();
                foreach($movies as $movie) {
            @endphp
            <li class="nav-item {{ request()->fullUrlIs(route('movies', $movie->id)) ? 'active' : '' }}">
                <a href="{{route('movies', $movie->id)}}" class="nav-link">
                    <span class="nav-link-name">{{ $movie->name }}</span>
                </a>
            </li>
            @php
                }
            @endphp
            @php
                $shows = App\Models\MediaCategory::where('type', 2)->where('status', 1)->get();
                foreach($shows as $show) {
            @endphp
            <li class="nav-item {{ request()->fullUrlIs(route('tvshows', $show->id)) ? 'active' : '' }}">
                <a href="{{route('tvshows', $show->id)}}" class="nav-link">
                    <span class="nav-link-name">{{ $show->name }}</span>
                </a>
            </li>
            @php
                }
            @endphp
        </ul>
{{--        <button class="btn btn-link btn-icon-md ms-5 d-none d-sm-flex" data-fancybox data-src="#flq_popup_search" data-base-class="flq-fancybox-search" data-animation-duration="1000" data-keyboard="false" data-auto-focus="true" data-touch="false" data-close-existing="true" data-small-btn="false" data-toolbar="false">--}}
{{--            search--}}
{{--        </button>--}}
        @if(!\Illuminate\Support\Facades\Auth::check())
        <div class="d-flex align-items-center ms-4 d-none d-sm-flex">
            <button class="btn btn-xs btn-outline btn-white d-none d-md-flex" data-fancybox data-src="#flq_popup_signin" data-base-class="flq-fancybox-signin" data-animation-duration="1000" data-keyboard="false" data-auto-focus="false" data-touch="false" data-close-existing="true" data-small-btn="false" data-toolbar="false"> Sign in / Sign Up </button>
            <button class="btn btn-link btn-icon-md d-md-none" data-fancybox data-src="#flq_popup_signin" data-base-class="flq-fancybox-signin" data-animation-duration="1000" data-keyboard="false" data-auto-focus="false" data-touch="false" data-close-existing="true" data-small-btn="false" data-toolbar="false">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M10 17L15 12M15 12L10 7M15 12H3M15 3H19C19.5304 3 20.0391 3.21071 20.4142 3.58579C20.7893 3.96086 21 4.46957 21 5V19C21 19.5304 20.7893 20.0391 20.4142 20.4142C20.0391 20.7893 19.5304 21 19 21H15" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </button>
        </div>
        @else
        <div class="flq-dropdown flq-dropdown-nav ms-4 d-none d-sm-flex">
            <button class="btn btn-link align-self-center">
                        <span class="flq-image flq-navbar-top-user">
                            @php
                                $selectedProfile = \App\Models\Profile::find(request()->session()->get('selected_profile'));
if ($selectedProfile){
    if (!$selectedProfile->avatar){
                                    $avatar = \App\Models\Avatar::where('is_default',1)->first();
                                    $selectedProfile->update(['avatar_id' => $avatar->id]);
                                }
    $avatar_pic = url('/').'/avatars/'.$selectedProfile->avatar->avatar_path;
}else{
    $avatar_pic = url('/').'/avatars/'.\App\Models\Avatar::where('is_default', 1)->first()->avatar_path;
}

                            @endphp
                            <img src="{{$avatar_pic}}" alt="">
                        </span>
            </button>
            <div class="dropdown-menu gy-2">
                <ul class="nav">
                    <li class="nav-item">
                        <a href="{{route('profile')}}" class="nav-link">
                            <span class="nav-link-name">Profile</span>
                        </a>
                    </li>
{{--                    <li class="nav-item">--}}
{{--                        <a href="account-favorites.html" class="nav-link">--}}
{{--                            <span class="nav-link-name">Recent Watched</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}
                    @role('Contributor')
                    <li class="nav-item">
                        <a href="{{route('my_movies')}}" class="nav-link">
                            <span class="nav-link-name">My Movies</span>
                        </a>
                    </li>
                    @endrole
                    <li class="nav-item">
                        <a href="{{route('account_edit')}}" class="nav-link">
                            <span class="nav-link-name">Profile Edit</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('change_password')}}" class="nav-link">
                            <span class="nav-link-name">Change Password</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('switch_profile')}}" class="nav-link">
                            <span class="nav-link-name">Switch Profile</span>
                        </a>
                    </li>
                    @if(\App\Models\Setting::first()->stripe)
                    <li class="nav-item">
                        <a href="{{route('payment_method')}}" class="nav-link">
                            <span class="nav-link-name">Payment Method</span>
                        </a>
                    </li>
                    @endif

                    @php

                        $user = Illuminate\Support\Facades\Auth::user();

                    @endphp

                    @if($user->referral)

                        <li class="nav-item">

                            <a href="{{route('dashboard')}}" class="nav-link">

                                <span class="nav-link-name">Dashboard</span>

                            </a>

                        </li>

                    @endif

                    <li class="nav-item">
                        <a href="javascript:void(0)" onclick="$('#logout-form').submit();" class="nav-link">
                            <span class="nav-link-name">Logout</span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </div>
        @endif
        <button class="flq-navbar-top-toggle btn btn-link ms-4 d-flex d-lg-none" data-fancybox data-src="#flq_navbar_mobile" data-base-class="flq-fancybox-navbar" data-animation-duration="1000" data-keyboard="false" data-auto-focus="false" data-touch="false" data-close-existing="true" data-small-btn="false" data-toolbar="false">
            <span></span>
            <span></span>
            <span></span>
        </button>
    </div>
</nav>
<!-- / Navbar top -->


@yield('content')

{{--<div class="swiper flq-swiper-effect-touch container-fluid mt-7 mb-3" data-sr data-sr-duration=1500 data-gap=20 data-buttons=true data-autoplay=2000 data-loop=true data-free-mode=true data-speed=1000 data-touch-ratio=0.6 data-breakpoints=320:3,500:4,848:5,1072:6,1280:8,1480:10>--}}
{{--    <div class="swiper-container">--}}
{{--        <div class="swiper-wrapper">--}}
{{--            @php--}}
{{--                $movies = \App\Models\Movie::all();--}}
{{--                $episodes = \App\Models\Episode::all();--}}
{{--                $collection = \Illuminate\Support\Collection::make([$movies, $episodes])->flatten();--}}
{{--            @endphp--}}
{{--            @foreach($collection as $collect)--}}
{{--            <div class="swiper-slide">--}}
{{--                <div class="card flq-card-image flq-card-image-instagram">--}}
{{--                    <a href="#" class="card-image">--}}
{{--                                    <span class="flq-image flq-responsive--}}
{{--  flq-responsive-1x1">--}}
{{--                                        <img src="{{$collect->getFirstMediaUrl('poster')}}" class="jarallax-img" alt="">--}}
{{--                                    </span>--}}
{{--                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
{{--                            <path fill-rule="evenodd" clip-rule="evenodd" d="M6.22506 0.450134C3.03566 0.450134 0.450134 3.03566 0.450134 6.22506V17.7749C0.450134 20.9643 3.03566 23.5498 6.22506 23.5498H17.7749C20.9643 23.5498 23.5498 20.9643 23.5498 17.7749V6.22506C23.5498 3.03566 20.9643 0.450134 17.7749 0.450134H6.22506ZM5.5834 12C5.5834 15.5437 8.45621 18.4166 12 18.4166C15.5437 18.4166 18.4166 15.5437 18.4166 12C18.4166 8.45621 15.5437 5.5834 12 5.5834C8.45621 5.5834 5.5834 8.45621 5.5834 12ZM12 15.8499C14.1263 15.8499 15.8499 14.1263 15.8499 12C15.8499 9.87365 14.1263 8.15003 12 8.15003C9.87366 8.15003 8.15004 9.87365 8.15004 12C8.15004 14.1263 9.87366 15.8499 12 15.8499ZM19.6999 4.30008C19.6999 5.00883 19.1253 5.5834 18.4166 5.5834C17.7078 5.5834 17.1333 5.00883 17.1333 4.30008C17.1333 3.59133 17.7078 3.01677 18.4166 3.01677C19.1253 3.01677 19.6999 3.59133 19.6999 4.30008Z" fill="currentColor" />--}}
{{--                        </svg>--}}
{{--                    </a>--}}
{{--                    <div class="card-body">--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            @endforeach--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
<!-- Footer -->
<footer class="flq-footer flq-background py-7" data-sr="footer" data-sr-interval="60" data-sr-duration="1000" data-sr-distance="10">
    <div class="flq-background-image">
                    <span class="flq-image jarallax" data-speed=0.7>
                        <img src="{{url('/')}}/front/assets/images/coming-soon.jpg" class="jarallax-img" alt="">
                    </span>
    </div>
    <div class="flq-background-overlay" style="background-color: hsla(var(--flq-color-background), .8);"></div>
    <div class="container">
        <div class="row gx-5 gy-5 mb-6 justify-content-center justify-content-sm-start">
            <div class="col-md-9 col-lg-3 text-center text-sm-start" data-sr-item="footer">
                <a href="{{url('/')}}">
                    <img src="{{url('/')}}/logo.png" class="flq-logo" alt="">
                </a>
                <p class="mt-1 pt-1">With Notis Films, You Must Notice Everything.</p>
            </div>
            <div class="col-lg-1 col-xl d-none d-lg-block"></div>
            <div class="col-12 col-md-4 col-lg col-xl-2">
                <nav>
                    <ul class="nav flex-column gy-3">
                        <li class="nav-item" data-sr-item="footer">
                            <a href="{{route('about_us')}}" class="nav-link">About Us</a>
                        </li>
                        <li class="nav-item" data-sr-item="footer">
                            <a href="{{route('terms')}}" class="nav-link">Terms Of use</a>
                        </li>
                        <li class="nav-item" data-sr-item="footer">
                            <a href="{{route('privacy_policy')}}" class="nav-link">Privacy Policy</a>
                        </li>
                        <li class="nav-item" data-sr-item="footer">
                            <a href="{{route('contact_us')}}" class="nav-link">Contact Us</a>
                        </li>
                    </ul>
                </nav>
            </div>
{{--            <div class="col-12 col-md-4 col-lg col-xl-2">--}}
{{--                <nav>--}}
{{--                    <ul class="nav flex-column gy-3">--}}
{{--                        <li class="nav-item" data-sr-item="footer">--}}
{{--                            <a href="#" class="nav-link">Help Center</a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item" data-sr-item="footer">--}}
{{--                            <a href="#" class="nav-link">Jobs</a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item" data-sr-item="footer">--}}
{{--                            <a href="#" class="nav-link">Cookie Preferences</a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item" data-sr-item="footer">--}}
{{--                            <a href="#" class="nav-link">Legal Notices</a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </nav>--}}
{{--            </div>--}}
{{--            <div class="col-12 col-md-4 col-lg col-xl-2">--}}
{{--                <nav>--}}
{{--                    <ul class="nav flex-column gy-3">--}}
{{--                        <li class="nav-item" data-sr-item="footer">--}}
{{--                            <a href="#" class="nav-link">Account</a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item" data-sr-item="footer">--}}
{{--                            <a href="#" class="nav-link">Ways to Watch</a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item" data-sr-item="footer">--}}
{{--                            <a href="#" class="nav-link">Corporate Information</a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item" data-sr-item="footer">--}}
{{--                            <a href="#" class="nav-link">Contact Us</a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </nav>--}}
{{--            </div>--}}
        </div>
        <div class="row gy-4 justify-content-between" data-sr="footer-copyright" data-sr-interval="100" data-sr-delay="200" data-sr-duration="1000" data-sr-distance="10">
            <div class="col-12 col-sm-auto text-center text-sm-start" data-sr-item="footer-copyright">
                <p>© {{date('Y')}} Notis Studios.</p>
            </div>
            <div class="col-12 col-sm-auto text-center text-sm-start" data-sr-item="footer-copyright">
                <div class="flq-social text-center">
                    <ul class="gy-4 gx-4">
                        <li>
                            <a href="https://twitter.com/notisstudios/" target="_blank" class="flq-social-link" data-sr-item=footer-copyright>
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M21.533 7.11169C21.5482 7.32488 21.5482 7.53811 21.5482 7.7513C21.5482 14.2538 16.599 21.7462 7.5533 21.7462C4.76648 21.7462 2.17767 20.9391 0 19.5381C0.395953 19.5838 0.776625 19.599 1.18781 19.599C3.48727 19.599 5.60405 18.8224 7.29441 17.4975C5.13197 17.4518 3.31978 16.0356 2.69541 14.0863C3 14.132 3.30455 14.1624 3.62437 14.1624C4.06598 14.1624 4.50764 14.1015 4.91878 13.995C2.66498 13.5381 0.974578 11.5584 0.974578 9.16753V9.10664C1.62937 9.47213 2.39086 9.70055 3.19791 9.73097C1.87303 8.8477 1.00505 7.34011 1.00505 5.63452C1.00505 4.72083 1.24866 3.88327 1.67508 3.1523C4.09641 6.13706 7.73601 8.08627 11.8172 8.2995C11.7411 7.93402 11.6954 7.55335 11.6954 7.17263C11.6954 4.46194 13.8883 2.25385 16.6141 2.25385C18.0304 2.25385 19.3095 2.84775 20.208 3.80714C21.3197 3.59395 22.3857 3.18277 23.3299 2.61933C22.9643 3.76149 22.1877 4.72088 21.1674 5.32997C22.1573 5.22342 23.1167 4.94925 23.9999 4.56858C23.33 5.54316 22.4924 6.41114 21.533 7.11169V7.11169Z" fill="currentColor" />
                                </svg>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.facebook.com/NotisStudios/" target="_blank" class="flq-social-link" data-sr-item=footer-copyright>
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M23.625 12C23.625 5.57812 18.4219 0.375 12 0.375C5.57812 0.375 0.375 5.57812 0.375 12C0.375 17.8022 4.62609 22.6116 10.1836 23.4844V15.3605H7.23047V12H10.1836V9.43875C10.1836 6.52547 11.918 4.91625 14.5744 4.91625C15.8466 4.91625 17.1769 5.14313 17.1769 5.14313V8.0025H15.7106C14.2669 8.0025 13.8164 8.89875 13.8164 9.81797V12H17.0405L16.5248 15.3605H13.8164V23.4844C19.3739 22.6116 23.625 17.8022 23.625 12Z" fill="currentColor" />
                                </svg>
                            </a>
                        </li>
                        <li>
                            <a href="https://www.instagram.com/notisstudios/" target="_blank" class="flq-social-link" data-sr-item=footer-copyright>
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M6.22506 0.450134C3.03566 0.450134 0.450134 3.03566 0.450134 6.22506V17.7749C0.450134 20.9643 3.03566 23.5498 6.22506 23.5498H17.7749C20.9643 23.5498 23.5498 20.9643 23.5498 17.7749V6.22506C23.5498 3.03566 20.9643 0.450134 17.7749 0.450134H6.22506ZM5.5834 12C5.5834 15.5437 8.45621 18.4166 12 18.4166C15.5437 18.4166 18.4166 15.5437 18.4166 12C18.4166 8.45621 15.5437 5.5834 12 5.5834C8.45621 5.5834 5.5834 8.45621 5.5834 12ZM12 15.8499C14.1263 15.8499 15.8499 14.1263 15.8499 12C15.8499 9.87365 14.1263 8.15003 12 8.15003C9.87366 8.15003 8.15004 9.87365 8.15004 12C8.15004 14.1263 9.87366 15.8499 12 15.8499ZM19.6999 4.30008C19.6999 5.00883 19.1253 5.5834 18.4166 5.5834C17.7078 5.5834 17.1333 5.00883 17.1333 4.30008C17.1333 3.59133 17.7078 3.01677 18.4166 3.01677C19.1253 3.01677 19.6999 3.59133 19.6999 4.30008Z" fill="currentColor" />
                                </svg>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- /Footer -->
<!-- Navbar icons -->
<div class="flq-navbar-icons">
    <ul>
        <li>
            <a href="{{url('/')}}" class="btn btn-link btn-icon-md">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M15 12H9V22H5C4.46957 22 3.96086 21.7893 3.58579 21.4142C3.21071 21.0392 3 20.5305 3 20V9.9782C3 9.36102 3.28495 8.77841 3.77212 8.39949L10.7721 2.95505C11.4943 2.39332 12.5057 2.39332 13.2279 2.95505L20.2279 8.39949C20.7151 8.77841 21 9.36102 21 9.9782V20C21 20.5305 20.7893 21.0392 20.4142 21.4142C20.0391 21.7893 19.5304 22 19 22H15V15" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </a>
        </li>
{{--        <li>--}}
{{--            <button class="btn btn-link btn-icon-md" data-fancybox data-src="#flq_popup_search" data-base-class="flq-fancybox-search" data-animation-duration="1000" data-keyboard="false" data-auto-focus="true" data-touch="false" data-close-existing="true" data-small-btn="false" data-toolbar="false">--}}
{{--                <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
{{--                    <path d="M10.0833 17.4167C14.1334 17.4167 17.4167 14.1334 17.4167 10.0833C17.4167 6.03325 14.1334 2.75 10.0833 2.75C6.03325 2.75 2.75 6.03325 2.75 10.0833C2.75 14.1334 6.03325 17.4167 10.0833 17.4167Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />--}}
{{--                    <path d="M19.25 19.25L15.2625 15.2625" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />--}}
{{--                </svg>--}}
{{--            </button>--}}
{{--        </li>--}}
        @if(\Illuminate\Support\Facades\Auth::check())
        <li>
            <button class="btn btn-link btn-icon-md" data-fancybox data-src="#flq_popup_user" data-base-class="flq-fancybox-navbar" data-animation-duration="1000" data-keyboard="false" data-auto-focus="false" data-touch="false" data-close-existing="true" data-small-btn="false" data-toolbar="false">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M16.4999 21.1422C17.888 20.8923 18.9884 20.5116 19.5 20C19.5718 19.3531 19.5 18.3333 19.5 18.3333C19.5 17.4493 19.0785 16.6014 18.3284 15.9763C15.9594 14.0022 8.04049 14.0022 5.67154 15.9763C4.92139 16.6014 4.49996 17.4493 4.49996 18.3333C4.49996 18.3333 4.42809 19.3531 4.49996 20C5.01153 20.5116 6.11194 20.8923 7.49996 21.1422M16 7C16 9.20914 14.2091 11 12 11C9.79082 11 7.99996 9.20914 7.99996 7C7.99996 4.79086 9.79082 3 12 3C14.2091 3 16 4.79086 16 7Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </button>
        </li>
        @else
        <li>
            <button class="btn btn-link btn-icon-md" data-fancybox data-src="#flq_popup_signin" data-base-class="flq-fancybox-signin" data-animation-duration="1000" data-keyboard="false" data-auto-focus="false" data-touch="false" data-close-existing="true" data-small-btn="false" data-toolbar="false">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M10 17L15 12M15 12L10 7M15 12H3M15 3H19C19.5304 3 20.0391 3.21071 20.4142 3.58579C20.7893 3.96086 21 4.46957 21 5V19C21 19.5304 20.7893 20.0391 20.4142 20.4142C20.0391 20.7893 19.5304 21 19 21H15" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </button>
        </li>
        @endif
        <li class="d-flex align-items-center">
            <div class="flq-scroll-top-wrapper">
                <a class="flq-scroll-top-button flq-anchor" href="#page">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9 6L15 12L9 18" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </a>
                <div class="flq-scroll-progress flq-scroll-progress-circle">
                    <svg>
                        <circle stroke="currentColor" r="0" fill="none" />
                    </svg>
                </div>
            </div>
        </li>
    </ul>
</div>
<!-- / Navbar icons -->
<!-- Scroll top button -->
<div class="flq-scroll-top-wrapper">
    <a class="flq-scroll-top-button flq-anchor" href="#page">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M9 6L15 12L9 18" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
    </a>
    <div class="flq-scroll-progress flq-scroll-progress-circle">
        <svg>
            <circle stroke="currentColor" r="0" fill="none" />
        </svg>
    </div>
</div>
<!-- / Scroll top button -->
<!-- Popup navbar mobile -->
<nav class="flq-navbar-mobile fancybox-content" id="flq_navbar_mobile">
    <div class="flq-fancybox-head">
        <div class="container-fluid">
            <a href="{{url('/')}}" class="flq-fancybox-brand me-auto">
                <img src="{{url('/')}}/logo.png" class="flq-logo" alt="">
            </a>
            <button class="flq-fancybox-close btn btn-link ms-4" data-fancybox-close>
                <span></span>
            </button>
        </div>
    </div>
    <div class="container pt-4 pb-6">
        <div class="flq-fancybox-body row gy-6 gx-6">
            <div class="col-12 col-lg">
                <ul class="nav flex-column flq-navbar-nav accordion gy-3">
                    <li class="nav-item active">
                        <a href="{{url('/')}}" class="nav-link">
                            <span class="nav-link-name">Home</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('pricing')}}" class="nav-link">
                            <span class="nav-link-name">Pricing</span>
                        </a>
                    </li>
                    @php
                        $movies = App\Models\MediaCategory::where('type', 1)->where('status', 1)->get();
                        foreach($movies as $movie) {
                    @endphp
                    <li class="nav-item {{ request()->fullUrlIs(route('movies', $movie->id)) ? 'active' : '' }}">
                        <a href="{{route('movies', $movie->id)}}" class="nav-link">
                            <span class="nav-link-name">{{ $movie->name }}</span>
                        </a>
                    </li>
                    @php
                        }
                    @endphp
                    @php
                        $shows = App\Models\MediaCategory::where('type', 2)->where('status', 1)->get();
                        foreach($shows as $show) {
                    @endphp
                    <li class="nav-item {{ request()->fullUrlIs(route('tvshows', $show->id)) ? 'active' : '' }}">
                        <a href="{{route('tvshows', $show->id)}}" class="nav-link">
                            <span class="nav-link-name">{{ $show->name }}</span>
                        </a>
                    </li>
                    @php
                        }
                    @endphp
                    @if(!\Illuminate\Support\Facades\Auth::check())
                        <li class="nav-item">
                            <a class="nav-link" data-fancybox data-src="#flq_popup_signin" data-base-class="flq-fancybox-signin" data-animation-duration="1000" data-keyboard="false" data-auto-focus="false" data-touch="false" data-close-existing="true" data-small-btn="false" data-toolbar="false">
                                Login
                            </a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a href="{{route('switch_profile')}}" class="nav-link">
                                <span class="nav-link-name">Switch Profile</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="javascript:void(0)" onclick="$('#logout-form').submit();" class="nav-link">
                                <span class="nav-link-name">Logout</span>
                            </a>
                        </li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</nav>
<!-- / Popup navbar mobile -->
<!-- Popup navbar user -->
<nav class="flq-navbar-mobile fancybox-content" id="flq_popup_user">
    <div class="flq-fancybox-head">
        <div class="container-fluid">
            <a href="{{url('/')}}" class="flq-fancybox-brand me-auto">
                <img src="{{url('/')}}/logo.png" class="flq-logo" alt="">
            </a>
            <button class="flq-fancybox-close btn btn-link ms-4" data-fancybox-close>
                <span></span>
            </button>
        </div>
    </div>
    <div class="container pt-4 pb-6">
        <div class="flq-fancybox-body row gy-6 gx-6">
            <div class="col-12 col-lg">
                <ul class="nav flex-column flq-navbar-nav accordion gy-3">
                    <li class="nav-item">
                        <a href="{{route('profile')}}" class="nav-link">
                            <span class="nav-link-name">Profile</span>
                        </a>
                    </li>
                    @role('Contributor')
                    <li class="nav-item">
                        <a href="{{route('my_movies')}}" class="nav-link">
                            <span class="nav-link-name">My Movies</span>
                        </a>
                    </li>
                    @endrole
                    <li class="nav-item">
                        <a href="{{route('account_edit')}}" class="nav-link">
                            <span class="nav-link-name">Profile Edit</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('change_password')}}" class="nav-link">
                            <span class="nav-link-name">Change Password</span>
                        </a>
                    </li>
                    @if(\App\Models\Setting::first()->stripe)
                    <li class="nav-item">
                        <a href="{{route('payment_method')}}" class="nav-link">
                            <span class="nav-link-name">Payment Method</span>
                        </a>
                    </li>
                    @endif
                    <li class="nav-item">
                        <a href="javascript:void(0)" onclick="$('#logout-form').submit();" class="nav-link">
                            <span class="nav-link-name">Logout</span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<!-- / Popup navbar user -->
<!-- Popup search -->
<div class="flq-fancybox-content-search fancybox-content" id="flq_popup_search">
    <div class="flq-search">
        <div class="flq-fancybox-body pb-6">
            <div class="container-small">
                <div class="flq-search-content">
                    <form action="#">
                        <input class="form-control form-control-lg flq-form-glass flq-search-input" type="text" placeholder="Type to Search" name=search>
                        <button class="btn btn-link btn-icon-md flq-search-btn" type="button">
                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10.0833 17.4167C14.1334 17.4167 17.4167 14.1334 17.4167 10.0833C17.4167 6.03325 14.1334 2.75 10.0833 2.75C6.03325 2.75 2.75 6.03325 2.75 10.0833C2.75 14.1334 6.03325 17.4167 10.0833 17.4167Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M19.25 19.25L15.2625 15.2625" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <div class="flq-fancybox-head">
            <div class="container-fluid">
                <a href="{{url('/')}}" class="flq-fancybox-brand me-auto">
                    <img src="{{url('/')}}/logo.png" class="flq-logo" alt="">
                </a>
                <button class="flq-fancybox-close btn btn-link ms-4" data-fancybox-close>
                    <span></span>
                </button>
            </div>
        </div>
        <div class="flq-fancybox-footer">
            <div class="container-small">
                <div class="flq-social text-center">
                    <ul class="g-4">
                        <li>
                            <a href="#" class="flq-social-link" data-sr-item=footer-copyright>
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M21.533 7.11169C21.5482 7.32488 21.5482 7.53811 21.5482 7.7513C21.5482 14.2538 16.599 21.7462 7.5533 21.7462C4.76648 21.7462 2.17767 20.9391 0 19.5381C0.395953 19.5838 0.776625 19.599 1.18781 19.599C3.48727 19.599 5.60405 18.8224 7.29441 17.4975C5.13197 17.4518 3.31978 16.0356 2.69541 14.0863C3 14.132 3.30455 14.1624 3.62437 14.1624C4.06598 14.1624 4.50764 14.1015 4.91878 13.995C2.66498 13.5381 0.974578 11.5584 0.974578 9.16753V9.10664C1.62937 9.47213 2.39086 9.70055 3.19791 9.73097C1.87303 8.8477 1.00505 7.34011 1.00505 5.63452C1.00505 4.72083 1.24866 3.88327 1.67508 3.1523C4.09641 6.13706 7.73601 8.08627 11.8172 8.2995C11.7411 7.93402 11.6954 7.55335 11.6954 7.17263C11.6954 4.46194 13.8883 2.25385 16.6141 2.25385C18.0304 2.25385 19.3095 2.84775 20.208 3.80714C21.3197 3.59395 22.3857 3.18277 23.3299 2.61933C22.9643 3.76149 22.1877 4.72088 21.1674 5.32997C22.1573 5.22342 23.1167 4.94925 23.9999 4.56858C23.33 5.54316 22.4924 6.41114 21.533 7.11169V7.11169Z" fill="currentColor" />
                                </svg>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flq-social-link" data-sr-item=footer-copyright>
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M23.625 12C23.625 5.57812 18.4219 0.375 12 0.375C5.57812 0.375 0.375 5.57812 0.375 12C0.375 17.8022 4.62609 22.6116 10.1836 23.4844V15.3605H7.23047V12H10.1836V9.43875C10.1836 6.52547 11.918 4.91625 14.5744 4.91625C15.8466 4.91625 17.1769 5.14313 17.1769 5.14313V8.0025H15.7106C14.2669 8.0025 13.8164 8.89875 13.8164 9.81797V12H17.0405L16.5248 15.3605H13.8164V23.4844C19.3739 22.6116 23.625 17.8022 23.625 12Z" fill="currentColor" />
                                </svg>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flq-social-link" data-sr-item=footer-copyright>
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M6.22506 0.450134C3.03566 0.450134 0.450134 3.03566 0.450134 6.22506V17.7749C0.450134 20.9643 3.03566 23.5498 6.22506 23.5498H17.7749C20.9643 23.5498 23.5498 20.9643 23.5498 17.7749V6.22506C23.5498 3.03566 20.9643 0.450134 17.7749 0.450134H6.22506ZM5.5834 12C5.5834 15.5437 8.45621 18.4166 12 18.4166C15.5437 18.4166 18.4166 15.5437 18.4166 12C18.4166 8.45621 15.5437 5.5834 12 5.5834C8.45621 5.5834 5.5834 8.45621 5.5834 12ZM12 15.8499C14.1263 15.8499 15.8499 14.1263 15.8499 12C15.8499 9.87365 14.1263 8.15003 12 8.15003C9.87366 8.15003 8.15004 9.87365 8.15004 12C8.15004 14.1263 9.87366 15.8499 12 15.8499ZM19.6999 4.30008C19.6999 5.00883 19.1253 5.5834 18.4166 5.5834C17.7078 5.5834 17.1333 5.00883 17.1333 4.30008C17.1333 3.59133 17.7078 3.01677 18.4166 3.01677C19.1253 3.01677 19.6999 3.59133 19.6999 4.30008Z" fill="currentColor" />
                                </svg>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- / Popup search -->
<!-- Popup signin -->
@if(!\Illuminate\Support\Facades\Auth::check())
<div class="flq-fancybox-content-signin fancybox-content" id="flq_popup_signin">
    <div class="flq-signin">
        <div class="flq-fancybox-head">
            <div class="container-fluid">
                <a href="{{url('/')}}" class="flq-fancybox-brand me-auto">
                    <img src="{{url('/')}}/logo.png" class="flq-logo" alt="">
                </a>
                <button class="flq-fancybox-close btn btn-link ms-4" data-fancybox-close>
                    <span></span>
                </button>
            </div>
        </div>
        <div class="flq-fancybox-body pb-6">
            <form action="{{ route('login') }}" method="POST" id="login_form" class="flq-signin-content">
                @csrf
                <h4 class="mb-4 pb-1 text-center">Login</h4>
                <div class="row justify-content-between gy-4">
                    <div class="col-12">
                        <input class="form-control flq-form-user flq-form-translucent" type="email" name="email" placeholder="Email">
                    </div>
                    <div class="col-12">
                        <input class="form-control flq-form-lock flq-form-translucent" type="password" name="password" placeholder="Password">
                    </div>
                    <div class="col-auto">
                        <div class="form-check flq-form-translucent">
                            <input class="form-check-input" type="checkbox" id="signinRememberMe"><label class="form-check-label" for="signinRememberMe">Remember Me</label>
                        </div>
                    </div>
{{--                    <div class="col-auto">--}}
{{--                        <a href="#" class="flq-color-meta flq-color-title-hover">Lost Password</a>--}}
{{--                    </div>--}}
                    <div class="col-12">
                        <button type="submit" id="login_btn" class="btn btn-block">Login</button>
                    </div>
                    <div class="col-12 mt-3 text-center">
                        <a href="{{route('register')}}" class="btn btn-link"> Sign Up </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- / Popup signin -->
<!-- Popup signup -->
{{--<div class="flq-fancybox-content-signup fancybox-content" id="flq_popup_signup">--}}
{{--    <div class="flq-signup">--}}
{{--        <div class="flq-fancybox-head">--}}
{{--            <div class="container-fluid">--}}
{{--                <a href="{{url('/')}}" class="flq-fancybox-brand me-auto">--}}
{{--                    <img src="{{url('/')}}/logo.png" class="flq-logo" alt="">--}}
{{--                </a>--}}
{{--                <button class="flq-fancybox-close btn btn-link ms-4" data-fancybox-close>--}}
{{--                    <span></span>--}}
{{--                </button>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="flq-fancybox-body pb-6">--}}
{{--            <form method="POST" action="{{ route('register') }}" id="register_form" class="flq-signup-content">--}}
{{--                @csrf--}}
{{--                <h4 class="mb-4 pb-1 text-center">Sign Up</h4>--}}
{{--                <div class="row gy-4">--}}
{{--                    <div class="col-12">--}}
{{--                        <input class="form-control flq-form-mail flq-form-translucent" type="email" name="email" placeholder="Email" required>--}}
{{--                    </div>--}}
{{--                    <div class="col-12">--}}
{{--                        <input class="form-control flq-form-lock flq-form-translucent" type="password" name="password" placeholder="Password" required>--}}
{{--                    </div>--}}
{{--                    <div class="col-12">--}}
{{--                        <input class="form-control flq-form-lock flq-form-translucent" type="password" name="password_confirmation" placeholder="Confirm Password" required>--}}
{{--                    </div>--}}

{{--                    @if(!\Illuminate\Support\Facades\Auth::check())--}}
{{--                        @php--}}
{{--                            $movies = \App\Models\Movie::where('status', 1)->orderBy('date_sort', 'desc')->get();--}}
{{--                            $shows = \App\Models\Show::where('status', 1)->orderBy('date_sort', 'desc')->get();--}}
{{--                        @endphp--}}
{{--                        <div class="col-12">--}}
{{--                            <div class="form-group">--}}
{{--                                <label class="form-label">What show/movie brought you to Notis Studios?</label>--}}
{{--                                <div class="form-control-wrap">--}}
{{--                                    <select class="form-select" data-search="on" name="interest_id" required>--}}
{{--                                        @foreach($movies as $movie)--}}
{{--                                            <option value="{{$movie->id}}">{{$movie->title}}</option>--}}
{{--                                        @endforeach--}}
{{--                                        @foreach($shows as $movie)--}}
{{--                                            <option value="{{$movie->id}}">{{$movie->title}}</option>--}}
{{--                                        @endforeach--}}
{{--                                    </select>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    @endif--}}
{{--                    <div class="col-12">--}}
{{--                        <div class="form-check flq-form-translucent">--}}
{{--                            <input class="form-check-input" type="checkbox" id="signupTerms" required><label class="form-check-label" for="signupTerms">I have read and agree to the--}}
{{--                                <a href="{{route('terms')}}">Terms and Conditions</a>.</label>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="col-12">--}}
{{--                        <button type="submit" class="btn btn-block" id="signup_btn">Sign Up</button>--}}
{{--                    </div>--}}
{{--                        <div class="col-12 text-center mt-1">or</div>--}}
{{--                        <div class="col-12 mt-1">--}}
{{--                            <div class="row justify-content-center gy-1">--}}
{{--                                <div class="col-auto">--}}
{{--                                    <a href="#" class="btn btn-link">Facebook</a>--}}
{{--                                </div>--}}
{{--                                <div class="col-auto">--}}
{{--                                    <a href="#" class="btn btn-link">Twitter</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                </div>--}}
{{--            </form>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
<!-- / Popup signup -->
@endif
<!-- START: Scripts -->
<!-- Object Fit Polyfill -->
<script src="{{url('/')}}/front/assets/vendor/object-fit-images/dist/ofi.min.js?v=3.2.4"></script>
<!-- Popper -->
<script src="{{url('/')}}/front/assets/vendor/@popperjs/core/dist/umd/popper.min.js?v=2.10.2"></script>
<!-- ScrollReveal -->
<script src="{{url('/')}}/front/assets/vendor/scrollreveal/dist/scrollreveal.min.js?v=4.0.9"></script>
<!-- Rellax -->
<script src="{{url('/')}}/front/assets/vendor/rellax/rellax.min.js?v=1.12.1"></script>
<!-- Tilt -->
<script src="{{url('/')}}/front/assets/vendor/vanilla-tilt/dist/vanilla-tilt.min.js?v=1.7.2"></script>
<!-- Animejs -->
<script src="{{url('/')}}/front/assets/vendor/animejs/lib/anime.min.js?v=3.2.0"></script>
<!-- Bootstrap -->
<script src="{{url('/')}}/front/assets/vendor/bootstrap/dist/js/bootstrap.min.js?v=5.1.3"></script>
<!-- Jarallax -->
<script src="{{url('/')}}/front/assets/vendor/jarallax/dist/jarallax.min.js?v=1.12.7"></script>
<!-- Swiper -->
<script src="{{url('/')}}/front/assets/vendor/swiper/swiper-bundle.min.js?v=7.2.0"></script>
<!-- Fancybox -->
<script src="{{url('/')}}/front/assets/vendor/fancybox/dist/jquery.fancybox.min.js?v=3.5.7"></script>
<!-- jQuery Countdown -->
<script src="{{url('/')}}/front/assets/vendor/jquery-countdown/dist/jquery.countdown.min.js?v=2.2.0"></script>
<!-- Moment.js (needed for jquery countdown) -->
<script src="{{url('/')}}/front/assets/vendor/moment/min/moment.min.js?v=2.29.1"></script>
<script src="{{url('/')}}/front/assets/vendor/moment-timezone/builds/moment-timezone-with-data.min.js?v=0.5.34"></script>
<!-- ImagesLoaded -->
<script src="{{url('/')}}/front/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js?v=4.1.4"></script>
<!-- Isotope -->
<script src="{{url('/')}}/front/assets/vendor/isotope-layout/dist/isotope.pkgd.min.js?v=3.0.6"></script>
<!-- Bootstrap Validator -->
<script src="{{url('/')}}/front/assets/vendor/bootstrap-validator/dist/validator.min.js?v=0.11.9"></script>
<!-- Fliqs -->
<script src="{{url('/')}}/front/assets/js/fliqs.min.js?v=1.0.0"></script>
<script src="{{url('/')}}/front/assets/js/fliqs-init.js?v=1.0.0"></script>
<!-- END: Scripts -->

<script>
    $(document).ready(function(){
        $('#register_form').submit(function(e){
            $('.error_messages').html('');
            $('#signup_btn').html('Signing up..');
            $('#signup_btn').prop('disabled', true);
            e.preventDefault();
            $.ajaxSetup({
                url: "{{route('register')}}",
                data: $('#register_form').serialize(),
                async: true,
                dataType: 'json',
                beforeSend: function () {
                },
                complete: function(){
                }
            });
            $.post()
                .done(function(response) {
                    $('#signup_btn').after( "<p >Registration Successful. Redirecting..</p>" );
                    setTimeout(function () {
                        location.reload(true);
                    }, 3000);
                    console.log(response);
                })
                .fail(function(response) {
                    $('#signup_btn').html('Sign Up');
                    $('#signup_btn').prop('disabled', false);
                    var errros_array = response.responseJSON.errors;
                    $.each(errros_array, function (key, val) {
                        $('input[name="'+key+'"]').after( "<p class='error_messages'>"+val+"</p>" );
                    });
                })
        });

        // For Login
        $('#login_form').submit(function(e){
            $('.error_messages').html('');
            $('#login_btn').html('Logging in..');
            $('#login_btn').prop('disabled', true);
            e.preventDefault();
            $.ajaxSetup({
                url: "{{route('login')}}",
                data: $('#login_form').serialize(),
                async: true,
                dataType: 'json',
                beforeSend: function () {
                },
                complete: function(){
                }
            });
            $.post()
                .done(function(response) {
                    $('#login_btn').after( "<p >Login Successful. Redirecting..</p>" );
                    setTimeout(function () {
                        location.reload(true);
                    }, 3000);
                    console.log(response);
                })
                .fail(function(response) {
                    $('#login_btn').html('Login');
                    $('#login_btn').prop('disabled', false);
                    if(!response.responseJSON){
                        location.reload(true);
                    }
                    var errros_array = response.responseJSON.errors;
                    $.each(errros_array, function (key, val) {
                        $('input[name="'+key+'"]').after( "<p class='error_messages'>"+val+"</p>" );
                    });
                })
        });
    });
    $(document).ready(function() {
        const params = new URLSearchParams(window.location.search);
        console.log(params)
        if (params.get('signin') === '1') {
            $.fancybox.open({
                src: '#flq_popup_signin',
                baseClass: 'flq-fancybox-signin',
                animationDuration: 1000,
                keyboard: false,
                autoFocus: false,
                touch: false,
                closeExisting: true,
                smallBtn: false,
                toolbar: false
            });
        }
    });

</script>

<script>
    $(document).bind("contextmenu",function(e){
        e.preventDefault();
    });
</script>

@yield('script')
</body>
</html>