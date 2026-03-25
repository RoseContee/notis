<!DOCTYPE html>
<!--
    Designed and developed by MaxBitz https://maxbitz.com/
-->
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <title> Notis Streaming </title>

    <meta name="description" content="Fliqs - Superpower for Gaming Websites" />
    <meta name="keywords" content="gaming, game, esports, community, template, html, bootstrap, webpack" />
    <meta name="author" content="nK" />
    <link rel="icon" type="image/png" href="{{url('/')}}/front/assets/images/favicon.png" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- START: Styles -->
    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@500;600;700;800&amp;display=swap" />
    <!-- Bootstrap -->
    <!-- <link rel="stylesheet" href="assets/vendor/bootstrap/dist/css/bootstrap.min.css" /> -->
    <!-- Swiper -->
    <link rel="stylesheet" href="{{url('/')}}/front/assets/vendor/swiper/swiper-bundle.min.css?v=7.2.0" />
    <!-- Fancybox -->
    <link rel="stylesheet" href="{{url('/')}}/front/assets/vendor/fancybox/dist/jquery.fancybox.min.css?v=3.5.7" />
    <!-- Fliqs -->
    <link rel="stylesheet" href="{{url('/')}}/front/assets/css/bootstrap-custom.css?v=1.0.0" />
    <link rel="stylesheet" href="{{url('/')}}/front/assets/css/fliqs.css?v=1.0.0" />
    <!-- RTL (uncomment this to enable RTL support) -->
    <!-- <link rel="stylesheet" href="assets/css/fliqs-rtl.min.css?v=1.0.0" /> -->
    <!-- Custom Styles -->
    <link rel="stylesheet" href="{{url('/')}}/front/assets/css/custom.css?v=1.0.0" />
    <!-- END: Styles -->
    <!-- jQuery -->
    <script src="{{url('/')}}/front/assets/vendor/jquery/dist/jquery.min.js?v=3.6.0"></script>
    <!-- Preloader -->
    <script src="{{url('/')}}/front/assets/js/preloader.min.js?v=1.0.0"></script>
</head>
<body id="page" class="flq-navbar-icons-existence">
<div class="content-wrap">
    <div class="min-vh-100 flq-background flq-background-move">
{{--        <div class="flq-background-image">--}}
{{--                    <span class="flq-image">--}}
{{--                        <img src="{{url('/')}}/front/assets/images/coming-soon.jpg" alt="">--}}
{{--                    </span>--}}
{{--        </div>--}}
        <div class="flq-background-overlay" style="background-color: rgba(19, 23, 34, 0.5);"></div>
        <div class="d-flex align-items-center justify-content-center py-7 min-vh-100">
            <div class="container text-center pt-navbar" data-sr="coming-soon" data-sr-delay="100" data-sr-interval="100" data-sr-duration="1300" data-sr-distance="10">

                <h1 class="display-3 mb-1" data-sr-item="coming-soon">Notis Streaming</h1>

                <p class="lead mb-5" data-sr-item="coming-soon">Select Your Profile</p>
                <div class="flq-countdown row justify-content-center gy-4 h1 mb-5" >
                    @php
                        $now = \Carbon\Carbon::now();
                        $userSub = $user->p_subscriptions()->where('expire_at', '>', $now)->first();
                        $maxProfiles = $userSub->number_of_profiles;
                        $userProfiles = $user->profiles;
                    @endphp
                    @foreach($userProfiles as $profile)
                        <div class="col-auto">
                            <a href="{{route('select_profile', $profile->id)}}">
                                <div class="flq-countdown-item" data-sr-item="coming-soon">

                                    <img width="150px" height="150px" src="{{url('/')}}/avatars/{{$profile->avatar ? $profile->avatar->avatar_path : ''}}" alt="">
                                </div>
                                <span class="h6">{{$profile->name}}</span>
                            </a>
                        </div>
                    @endforeach
                    @if(count($userProfiles) < $maxProfiles)
                        @php
                            $difference = $maxProfiles - count($userProfiles);
                        @endphp
                        @for($x=1; $x<=$difference; $x++ )
                            <div class="col-auto">
                                <a href="{{route('new_profile', $user->id)}}">
                                    <div class="flq-countdown-item" data-sr-item="coming-soon">
                                        @php
                                            $avatar = \App\Models\Avatar::where('is_default',1)->first();
                                        @endphp
                                        <img width="150px" height="150px" src="{{url('/')}}/avatars/{{$avatar->avatar_path}}" alt="">
                                    </div>
                                    <span class="h6">Create new Profile</span>
                                </a>
                            </div>
                        @endfor
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>

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

</body>
</html>
