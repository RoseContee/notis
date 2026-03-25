<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <base href="{{url('/back')}}">
    <meta charset="utf-8">
    <meta name="author" content="Syed Subtain Haider | MaxBitz">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="free, free forex, free forex indicators, forex indicators, rsi, jcash, rsi scanner, jcash rsi, jcash scanner,trade confirmation, confirmation, price reversal, channels, price, price action, price-action,forex, forex day trading, forex trading, make money online, forex trader, how to trade forex, how to make money, day trading, day trading for beginners, trading strategy, Forex trading strategy, learn to trade, how to day trade, how to swing trade, candlestick patterns, how to enter a trade, how to swing trade forex, forex swing trading, structure trading, support and resistance, best forex strategy, price action trading, price ation strategy, best forex entries, indicators">
    <meta name="description" content="Trading has large potential rewards, having the right tools makes a big difference. Join OW Forex and have access to the worlds best indicators, scanners, and expert advisors.">
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="{{url('/')}}/logo_black.png">
    <!-- Page Title  -->
    <title>Notis Studios</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="{{url('/')}}/backend/assets/css/dashlite.css?ver=2.9.0">
    <link id="skin-default" rel="stylesheet" href="{{url('/')}}/backend/assets/css/theme.css?ver=2.9.0">
    @yield('css')
</head>

<body class="nk-body bg-white npc-default pg-auth ">
<div class="nk-app-root ">
    <!-- main @s -->
    <div class="nk-main  ">
        <!-- wrap @s -->
        <div class="nk-wrap nk-wrap-nosidebar ">
            <div class="nk-content ">
                @yield('content')
                <div class="nk-footer nk-auth-footer-full">
                    <div class="container wide-lg">
                        <div class="row g-3">
                            <div class="col-lg-6 order-lg-last">
                                <ul class="nav nav-sm justify-content-center justify-content-lg-end">
                                    <li class="nav-item">
                                        {{-- <a class="nav-link" href="{{route('terms_conditions')}}">Terms & Condition</a> --}}
                                    </li>
                                    <li class="nav-item">
                                        {{-- <a class="nav-link" href="{{route('privacy_policy')}}">Privacy Policy</a> --}}
                                    </li>
                                    <li class="nav-item">
                                        {{-- <a class="nav-link" href="{{route('contact')}}">Help</a> --}}
                                    </li>
                                    {{--                        <li class="nav-item dropup">--}}
                                    {{--                            <a class="dropdown-toggle dropdown-indicator has-indicator nav-link" data-toggle="dropdown" data-offset="0,10"><span>English</span></a>--}}
                                    {{--                            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">--}}
                                    {{--                                <ul class="language-list">--}}
                                    {{--                                    <li>--}}
                                    {{--                                        <a href="#" class="language-item">--}}
                                    {{--                                            <img src="{{url('/')}}/backend/images/flags/english.png" alt="" class="language-flag">--}}
                                    {{--                                            <span class="language-name">English</span>--}}
                                    {{--                                        </a>--}}
                                    {{--                                    </li>--}}
                                    {{--                                    <li>--}}
                                    {{--                                        <a href="#" class="language-item">--}}
                                    {{--                                            <img src="{{url('/')}}/backend/images/flags/spanish.png" alt="" class="language-flag">--}}
                                    {{--                                            <span class="language-name">Español</span>--}}
                                    {{--                                        </a>--}}
                                    {{--                                    </li>--}}
                                    {{--                                    <li>--}}
                                    {{--                                        <a href="#" class="language-item">--}}
                                    {{--                                            <img src="{{url('/')}}/backend/images/flags/french.png" alt="" class="language-flag">--}}
                                    {{--                                            <span class="language-name">Français</span>--}}
                                    {{--                                        </a>--}}
                                    {{--                                    </li>--}}
                                    {{--                                    <li>--}}
                                    {{--                                        <a href="#" class="language-item">--}}
                                    {{--                                            <img src="{{url('/')}}/backend/images/flags/turkey.png" alt="" class="language-flag">--}}
                                    {{--                                            <span class="language-name">Türkçe</span>--}}
                                    {{--                                        </a>--}}
                                    {{--                                    </li>--}}
                                    {{--                                </ul>--}}
                                    {{--                            </div>--}}
                                    {{--                        </li>--}}
                                </ul>
                            </div>
                            <div class="col-lg-6">
                                <div class="nk-block-content text-center text-lg-left">
{{--                                    <p class="site-footer__bottom-text">Designed and developed by <a href="https://maxbitz.com/" target="_blank"> Syed Sibtain Haider - MaxBitz</a></p>--}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- content @e -->
    </div>
    <!-- main @e -->
</div>
<!-- app-root @e -->
<!-- JavaScript -->
<script src="{{url('/')}}/backend/assets/js/bundle.js?ver=2.9.0"></script>
<script src="{{url('/')}}/backend/assets/js/scripts.js?ver=2.9.0"></script>
@yield('scripts')

</html>
