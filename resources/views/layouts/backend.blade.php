<!DOCTYPE html>
<html lang="zxx" class="js">

<head>
    <base href="../../">
    <meta charset="utf-8">

    <meta name="keywords" content="Notis Studios">

    <meta name="description" content="Oklahoma movie and music studios">

    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
{{--    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>--}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- Fav Icon  -->
    <link rel="shortcut icon" href="{{url('/')}}/logo.png">
    <!-- Page Title  -->
    <title>Notis Studios</title>
    <!-- StyleSheets  -->
    <link rel="stylesheet" href="{{url('/backend')}}/assets/css/dashlite.css?ver=2.9.0">
    <link id="skin-default" rel="stylesheet" href="{{url('/backend')}}/assets/css/theme.css?ver=2.9.0">
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Themify Icons -->
    <link rel="stylesheet" type="text/css" href="{{url('/backend')}}/assets/css/libs/themify-icons.css">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" type="text/css" href="{{url('/backend')}}/assets/css/libs/bootstrap-icons.css">
    <style>
        .color_blue{
            color: blue;
        }
    </style>
    @yield('css')

</head>

<body class="nk-body bg-lighter npc-general has-sidebar ">
<div class="nk-app-root">
    <!-- main @s -->
    <div class="nk-main ">
        <!-- sidebar @s -->
        <div class="nk-sidebar nk-sidebar-fixed is-light " data-content="sidebarMenu">
            <div class="nk-sidebar-element nk-sidebar-head position-relative">
                <div class="nk-sidebar-brand">
                    <a href="/" class="logo-link nk-sidebar-logo">
                        <img class="logo-light logo-img" src="{{url('/')}}/logo.png" srcset="{{url('/')}}/logo.png 2x" alt="logo">
                        <img class="logo-dark logo-img" src="{{url('/')}}/logo.png" srcset="{{url('/')}}/logo.png 2x" alt="logo-dark">
                        <img class="logo-small logo-img logo-img-small" src="{{url('/')}}/logo.png" srcset="{{url('/')}}/logo.png 2x" alt="logo-small">
                    </a>
                </div>
                <div class="nk-menu-trigger mr-n2 position-absolute">
                    <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu"><em class="icon ni ni-arrow-left"></em></a>
                    <a href="#" class="nk-nav-compact nk-quick-nav-icon d-none d-xl-inline-flex" data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
                </div>
            </div><!-- .nk-sidebar-element -->
            <div class="nk-sidebar-element" data-content="sidebarElement">
                <div class="nk-sidebar-element">
                    <div class="nk-sidebar-content">
                        <div class="nk-sidebar-menu" data-simplebar>
                            <ul class="nk-menu">
                                <li class="nk-menu-item">
                                    <a href="{{route('dashboard')}}" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-dashboard"></em></span>
                                        <span class="nk-menu-text">Dashboard</span>
                                    </a>
                                </li>

                                @php

                                    $user = \Illuminate\Support\Facades\Auth::user();

                                @endphp

                                @if(!$user->hasRole('super_admin') && !$user->hasRole('admin'))
                                <li class="nk-menu-item">
                                    <a href="{{route('role_request')}}" class="nk-menu-link">
                                        <span class="nk-menu-icon"><em class="icon ni ni-security"></em></span>
                                        <span class="nk-menu-text">Role Request</span>
                                    </a>
                                </li>
                                @endif

                                @if($user->referral)

                                <li class="nk-menu-item has-sub">



                                    <a href="{{route('withdraws')}}" class="nk-menu-link nk-menu-toggle">



                                        <span class="nk-menu-icon"><em class="icon ni ni-tile-thumb-fill"></em></span>



                                        <span class="nk-menu-text">Withdraw Requests</span>



                                    </a>



                                    <ul class="nk-menu-sub">



                                        <li class="nk-menu-item">



                                            <a href="{{route('withdraws')}}" class="nk-menu-link"><span class="nk-menu-text">All Requests</span></a>



                                        </li>



                                        <li class="nk-menu-item">



                                            <a href="{{route('new_withdraws')}}" class="nk-menu-link"><span class="nk-menu-text">New Requests</span></a>



                                        </li>



                                    </ul><!-- .nk-menu-sub -->



                                </li><!-- .nk-menu-item -->

                                @endif



                                @can('view_roles')
                                    <li class="nk-menu-item">
                                        <a href="{{route('role.all')}}" class="nk-menu-link">
                                            <span class="nk-menu-icon"><em class="icon ni ni-security"></em></span>
                                            <span class="nk-menu-text">Roles</span>
                                        </a>
                                    </li>
                                @endcan
                                @can('view_permissions')
                                    <li class="nk-menu-item">
                                        <a href="{{route('permission.all')}}" class="nk-menu-link">
                                            <span class="nk-menu-icon"><em class="icon ni ni-policy"></em></span>
                                            <span class="nk-menu-text">Permissions</span>
                                        </a>
                                    </li>
                                @endcan
                                @can('view_users')
                                    <li class="nk-menu-item">
                                        <a href="{{route('user.all')}}" class="nk-menu-link">
                                            <span class="nk-menu-icon"><em class="icon ni ni-users"></em></span>
                                            <span class="nk-menu-text">Users</span>
                                        </a>
                                    </li>
                                @endcan
                                @can('view_subscriptions')
                                    <li class="nk-menu-item">
                                        <a href="{{route('subscription.all')}}" class="nk-menu-link">
                                            <span class="nk-menu-icon"><em class="icon ni ni-sign-usdc-alt"></em></span>
                                            <span class="nk-menu-text">Subscriptions</span>
                                        </a>
                                    </li>
                                @endcan
                                @can('view_media_categories')
                                    <li class="nk-menu-item">
                                        <a href="{{route('media_categories.all')}}" class="nk-menu-link">
                                            <span class="nk-menu-icon"><em class="icon ni ni-video"></em></span>
                                            <span class="nk-menu-text">Media Categories</span>
                                        </a>
                                    </li>
                                @endcan                                
                                @can('view_contributes')
                                    @can('publish_contribute')
                                    <li class="nk-menu-item">
                                        <a href="{{route('network.all')}}" class="nk-menu-link">
                                            <span class="nk-menu-icon"><em class="icon ni ni-video"></em></span>
                                            <span class="nk-menu-text">Contribute Network Manage</span>
                                        </a>
                                    </li>
                                    @else
                                    <li class="nk-menu-item">
                                        <a href="{{route('network.index')}}" class="nk-menu-link">
                                            <span class="nk-menu-icon"><em class="icon ni ni-video"></em></span>
                                            <span class="nk-menu-text">Contribute Network</span>
                                        </a>
                                    </li>
                                    @endcan
                                    <li class="nk-menu-item">
                                        <a href="{{route('contribute.all')}}" class="nk-menu-link">
                                            <span class="nk-menu-icon"><em class="icon ni ni-video"></em></span>
                                            <span class="nk-menu-text">Contribute Videos</span>
                                        </a>
                                    </li>
                                @endcan                                
                                @can('view_genres')
                                    <li class="nk-menu-item">
                                        <a href="{{route('genres.all')}}" class="nk-menu-link">
                                            <span class="nk-menu-icon"><em class="icon ni ni-align-center"></em></span>
                                            <span class="nk-menu-text">Genres</span>
                                        </a>
                                    </li>
                                @endcan
                                @can('view_movies')
                                    @php
                                        $movies = App\Models\MediaCategory::where('type', 1)->where('status', 1)->get();
                                        foreach($movies as $movie) {
                                    @endphp
                                    <li class="nk-menu-item">
                                        <a href="{{route('movies.all', $movie->id)}}" class="nk-menu-link">
                                            <span class="nk-menu-icon"><i class="fa-solid fa-film"></i></span>
                                            <span class="nk-menu-text">{{ $movie->name }}</span>
                                        </a>
                                    </li>
                                    @php
                                        }
                                    @endphp
                                @endcan
                                @php
                                    $user = Auth::user();
                                    if($user->can('view_shows') || $user->can('view_seasons') || $user->can('view_episodes')) {
                                        $shows = App\Models\MediaCategory::where('type', 2)->where('status', 1)->get();
                                        foreach($shows as $show) {
                                @endphp
                                <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon"><i class="fa-solid fa-tv"></i></span>
                                        <span class="nk-menu-text">{{ $show->name }}</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                        @can('view_shows')
                                            <li class="nk-menu-item">
                                                <a href="{{route('shows.all', $show->id)}}" class="nk-menu-link"><span class="nk-menu-text">Show all</span></a>
                                            </li>
                                        @endcan
                                        @can('view_seasons')
                                            <li class="nk-menu-item">
                                                <a href="{{route('seasons.all', $show->id)}}" class="nk-menu-link"><span class="nk-menu-text">Seasons</span></a>
                                            </li>
                                        @endcan
                                        @can('view_episodes')
                                            <li class="nk-menu-item">
                                                <a href="{{route('episodes.all', $show->id)}}" class="nk-menu-link"><span class="nk-menu-text">Episodes</span></a>
                                            </li>
                                        @endcan
                                    </ul><!-- .nk-menu-sub -->
                                </li><!-- .nk-menu-item -->
                                @php
                                    }
                                }
                                @endphp

                                @can('view_advertisements')
                                    <li class="nk-menu-item">
                                        <a href="{{route('advertisements.all')}}" class="nk-menu-link">
                                            <span class="nk-menu-icon"><i class="fa-solid fa-rectangle-ad"></i></span>
                                            <span class="nk-menu-text">Advertisements</span>
                                        </a>
                                    </li>
                                    <li class="nk-menu-item">
                                        <a href="{{route('advertisements.deposit')}}" class="nk-menu-link">
                                            <span class="nk-menu-icon"><em class="icon ni ni-money"></em></span>
                                            <span class="nk-menu-text">Deposit</span>
                                        </a>
                                    </li>
                                @endcan
                                @php
                                    $user = Auth::user();
                                    if($user->can('view_visits') || $user->can('view_visits_graph') || $user->can('view_movies_views') || 
                                    $user->can('view_movies_views') || $user->can('view_ads_views')) {
                                @endphp
                                <li class="nk-menu-item has-sub">
                                    <a href="#" class="nk-menu-link nk-menu-toggle">
                                        <span class="nk-menu-icon"><i class="fa-solid fa-chart-line"></i></span>
                                        <span class="nk-menu-text">Analytics</span>
                                    </a>
                                    <ul class="nk-menu-sub">
                                        @can('view_visits')
                                            <li class="nk-menu-item">
                                                <a href="{{route('visits.all')}}" class="nk-menu-link"><span class="nk-menu-text">Visits</span></a>
                                            </li>
                                        @endcan
                                        @can('view_visits_graph')
                                            <li class="nk-menu-item">
                                                <a href="{{route('visits_graph')}}" class="nk-menu-link"><span class="nk-menu-text">Visit Graph</span></a>
                                            </li>
                                        @endcan
                                        @can('view_movies_views')
                                            <li class="nk-menu-item">
                                                <a href="{{route('views.movies.all')}}" class="nk-menu-link"><span class="nk-menu-text">Movie Views</span></a>
                                            </li>
                                        @endcan
                                        @can('view_shows_views')
                                            <li class="nk-menu-item">
                                                <a href="{{route('views.shows.all')}}" class="nk-menu-link"><span class="nk-menu-text">Tv Show Views</span></a>
                                            </li>
                                        @endcan
                                        @can('view_ads_views')
                                            <li class="nk-menu-item">
                                                <a href="{{route('views.ads.all')}}" class="nk-menu-link"><span class="nk-menu-text">Advertisement Views</span></a>
                                            </li>
                                        @endcan
                                    </ul><!-- .nk-menu-sub -->
                                </li><!-- .nk-menu-item -->
                                @php
                                }
                                @endphp

                                @can('view_settings')
                                    <li class="nk-menu-item">
                                        <a href="{{route('settings')}}" class="nk-menu-link">
                                            <span class="nk-menu-icon"><i class="fa-solid fa-gear"></i></span>
                                            <span class="nk-menu-text">Settings</span>
                                        </a>
                                    </li>

                                    <li class="nk-menu-item has-sub">

                                        <a href="#" class="nk-menu-link nk-menu-toggle">

                                            <span class="nk-menu-icon"><em class="icon ni ni-tile-thumb-fill"></em></span>

                                            <span class="nk-menu-text">Withdraw Requests</span>

                                        </a>

                                        <ul class="nk-menu-sub">

                                            <li class="nk-menu-item">

                                                <a href="{{route('admin.withdraws')}}" class="nk-menu-link"><span class="nk-menu-text">All Requests</span></a>

                                            </li>

                                            <li class="nk-menu-item">

                                                <a href="{{route('withdraws.types')}}" class="nk-menu-link"><span class="nk-menu-text">Withdraw Type</span></a>

                                            </li>

                                            <li class="nk-menu-item">

                                                <a href="{{route('withdraws.types.add')}}" class="nk-menu-link"><span class="nk-menu-text">Add Withdraw Type</span></a>

                                            </li>

                                        </ul><!-- .nk-menu-sub -->

                                    </li><!-- .nk-menu-item -->

                                @endcan
                                @can('view_avatars')
                                    <li class="nk-menu-item">
                                        <a href="{{route('avatars.all')}}" class="nk-menu-link">
                                            <span class="nk-menu-icon"><i class="fa-solid fa-user-astronaut"></i></span>
                                            <span class="nk-menu-text">Avatars</span>
                                        </a>
                                    </li>
                                @endcan
                                {{--
                                <li class="nk-menu-heading">
                                    <h6 class="overline-title text-primary-alt">Rental</h6>
                                </li><!-- .nk-menu-heading -->
                                @can('view_rooms')
                                    <li class="nk-menu-item">
                                        <a href="{{route('rooms.all')}}" class="nk-menu-link">
                                            <span class="nk-menu-icon"><i class="fa-solid fa-person-shelter"></i></span>
                                            <span class="nk-menu-text">Rooms</span>
                                        </a>
                                    </li>
                                @endcan
                                @can('view_categories')
                                    <li class="nk-menu-item">
                                        <a href="{{route('top_category.all')}}" class="nk-menu-link">
                                            <span class="nk-menu-icon"><i class="fa-solid fa-icons"></i></span>
                                            <span class="nk-menu-text">Top Categories</span>
                                        </a>
                                    </li>
                                @endcan
                                @can('view_categories')
                                    <li class="nk-menu-item">
                                        <a href="{{route('category.all')}}" class="nk-menu-link">
                                            <span class="nk-menu-icon"><i class="fa-solid fa-icons"></i></span>
                                            <span class="nk-menu-text">Sub Categories</span>
                                        </a>
                                    </li>
                                @endcan
                                @can('view_equipments')
                                    <li class="nk-menu-item">
                                        <a href="{{route('equipments.all')}}" class="nk-menu-link">
                                            <span class="nk-menu-icon"><i class="fa-solid fa-icons"></i></span>
                                            <span class="nk-menu-text">Tools / Equipments</span>
                                        </a>
                                    </li>
                                @endcan
                                --}}
                                
{{--                                <li class="nk-menu-item">--}}
{{--                                    <a href="{{route('user.change_payment_method')}}" class="nk-menu-link">--}}
{{--                                        <span class="nk-menu-icon"><em class="icon ni ni-update"></em></span>--}}
{{--                                        <span class="nk-menu-text">Payment Method</span>--}}
{{--                                    </a>--}}
{{--                                </li>--}}

                            </ul><!-- .nk-menu -->
                        </div><!-- .nk-sidebar-menu -->
                    </div><!-- .nk-sidebar-content -->
                </div><!-- .nk-sidebar-element -->
            </div><!-- .nk-sidebar-element -->
        </div>
        <!-- sidebar @e -->
        <!-- wrap @s -->
        <div class="nk-wrap ">
            <!-- main header @s -->
            <div class="nk-header nk-header-fixed is-light">
                <div class="container-fluid">
                    <div class="nk-header-wrap">
                        <div class="nk-menu-trigger d-xl-none ml-n1">
                            <a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
                        </div>
                        <div class="nk-header-brand d-xl-none">
                            <a href="/" class="logo-link">
                                <img class="logo-light logo-img" src="{{url('/')}}/logo.png" srcset="{{url('/')}}/logo.png 2x" alt="logo">
                                <img class="logo-dark logo-img" src="{{url('/')}}/logo.png" srcset="{{url('/')}}/logo.png 2x" alt="logo-dark">
                            </a>
                        </div><!-- .nk-header-brand -->
                        <div class="nk-header-tools">
                            <ul class="nk-quick-nav">
                                <li class="dropdown user-dropdown">
                                    <a href="#" class="dropdown-toggle mr-n1" data-toggle="dropdown">
                                        <div class="user-toggle">
                                            <div class="user-avatar sm">
                                                <em class="icon ni ni-user-alt"></em>
                                            </div>
                                            <div class="user-info d-none d-xl-block">
                                                @php
                                                    $roles=Auth::user()->getRoleNames()->toArray();
                                                @endphp
                                                <div class="user-status user-status-active">@foreach($roles as $key=>$role) {{str_replace('_',' ',$role)}} @if($key+1!=count($roles)) ,@endif @endforeach</div>
                                                <div class="user-name dropdown-indicator">{{Auth::user()->name}}</div>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
                                        <div class="dropdown-inner user-card-wrap bg-lighter d-none d-md-block">
                                            <div class="user-card">
                                                <div class="user-avatar">
                                                    <span>AB</span>
                                                </div>
                                                <div class="user-info">
                                                    <span class="lead-text">{{Auth::user()->name}}</span>
                                                    <span class="sub-text">{{Auth::user()->email}}</span>
                                                    <div style="color:blue;">Balance: ${{ Auth::user()->a_cash }}</div>
                                                    <div style="color:red;">Ad Balance: ${{ Auth::user()->balance }}</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="dropdown-inner">
                                            <ul class="link-list">
                                                <li><a href="{{route('user.profile')}}"><em class="icon ni ni-user-alt"></em><span>View Profile</span></a></li>
                                                {{--                                                <li><a href="html/ecommerce/user-profile.html"><em class="icon ni ni-user-alt"></em><span>View Profile</span></a></li>--}}
                                                {{--                                                <li><a href="html/ecommerce/user-profile.html"><em class="icon ni ni-setting-alt"></em><span>Account Setting</span></a></li>--}}
                                                {{--                                                <li><a href="html/ecommerce/user-profile.html"><em class="icon ni ni-activity-alt"></em><span>Login Activity</span></a></li>--}}
                                                <li><a class="dark-switch" href="#"><em class="icon ni ni-moon"></em><span>Dark Mode</span></a></li>
                                            </ul>
                                        </div>
                                        <div class="dropdown-inner">
                                            <ul class="link-list">
                                                <li><a href="javascript:void(0)" onclick="$('#logout-form').submit();"><em class="icon ni ni-signout"></em><span>Sign out</span></a></li>
                                            </ul>
                                        </div>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div><!-- .nk-header-wrap -->
                </div><!-- .container-fliud -->
            </div>
            <!-- main header @e -->
            <!-- content @s -->
            <div class="nk-content ">
                <div class="container-fluid">
                    <div class="nk-content-inner">
                        <div class="nk-content-body">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
            <!-- content @e -->
            <!-- footer @s -->
            <div class="nk-footer" style="position:fixed; bottom: 0; right:0;display: none;">
                <div class="container-fluid">
                    <div class="nk-footer-wrap">
{{--                        <div class="nk-footer-copyright"> &copy; {{date('Y')}} Designed and developed by <a href="https://maxbitz.com/" target="_blank"> Syed Sibtain Haider - MaxBitz</a></a>--}}
                        </div>
                        {{--                        <div class="nk-footer-links">--}}
                        {{--                            <ul class="nav nav-sm">--}}
                        {{--                                <li class="nav-item dropup">--}}
                        {{--                                    <a herf="#" class="dropdown-toggle dropdown-indicator has-indicator nav-link" data-toggle="dropdown" data-offset="0,10"><span>English</span></a>--}}
                        {{--                                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">--}}
                        {{--                                        <ul class="language-list">--}}
                        {{--                                            <li>--}}
                        {{--                                                <a href="#" class="language-item">--}}
                        {{--                                                    <span class="language-name">English</span>--}}
                        {{--                                                </a>--}}
                        {{--                                            </li>--}}
                        {{--                                            <li>--}}
                        {{--                                                <a href="#" class="language-item">--}}
                        {{--                                                    <span class="language-name">Español</span>--}}
                        {{--                                                </a>--}}
                        {{--                                            </li>--}}
                        {{--                                            <li>--}}
                        {{--                                                <a href="#" class="language-item">--}}
                        {{--                                                    <span class="language-name">Français</span>--}}
                        {{--                                                </a>--}}
                        {{--                                            </li>--}}
                        {{--                                            <li>--}}
                        {{--                                                <a href="#" class="language-item">--}}
                        {{--                                                    <span class="language-name">Türkçe</span>--}}
                        {{--                                                </a>--}}
                        {{--                                            </li>--}}
                        {{--                                        </ul>--}}
                        {{--                                    </div>--}}
                        {{--                                </li>--}}
                        {{--                                <li class="nav-item">--}}
                        {{--                                    <a href="#" data-toggle="modal" data-target="#region" class="nav-link"><em class="icon ni ni-globe"></em><span class="ml-1">Select Region</span></a>--}}
                        {{--                                </li>--}}
                        {{--                            </ul>--}}
                        {{--                        </div>--}}
                    </div>
                </div>
            </div>
            <!-- footer @e -->
        </div>
        <!-- wrap @e -->
    </div>
    <!-- main @e -->
</div>
<div class="nk-add-product toggle-slide toggle-slide-right" data-content="formTier" data-toggle-screen="any" data-toggle-overlay="true" data-toggle-body="true" data-simplebar>
    <div class="ajax_form">
        <div class="d-flex justify-content-center">  <div class="spinner-border" role="status">    <span class="sr-only">Loading...</span>  </div></div>
    </div>
</div>
<!-- app-root @e -->
<!-- JavaScript -->
<script src="{{url('/backend')}}/assets/js/bundle.js?ver=2.9.0"></script>
<script src="{{url('/backend')}}/assets/js/scripts.js?ver=2.9.0"></script>
<script src="{{url('/backend')}}/assets/js/charts/chart-ecommerce.js?ver=2.9.0"></script>
<script src="{{url('/backend')}}/assets/js/example-toastr.js?ver=2.9.0"></script>
<script src="{{url('/backend')}}/assets/js/example-sweetalert.js?ver=2.9.0"></script>
<script src="{{url('/backend')}}/assets/js/libs/datatable-btns.js?ver=2.9.0"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

<script>
    $( document ).ready(function() {
        // $.fn.successToast('aaaaaa');
        if ('{{session()->has('success')}}'){
            $.fn.successToast('{{ session()->get('success') }}');
        }else if('{{session()->has('error')}}'){
            $.fn.errorToast('{{ session()->get('error') }}');
        }else if('{{$errors->any()}}'){
            var arrayFromPHP = <?php echo json_encode($errors->all()); ?>;
            $( arrayFromPHP ).each(function( index ) {
                $.fn.errorToast(this);
            });
        }
    });
    function get_form(model, mode, id = ''){
        var url = '/'+model+'/form/'+mode+'/'+id;
        $.get(url, function (data) {
            $('.ajax_form').html(data);
        })
    }
    function delete_record(model,record_id){
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!'
        }).then(function (result) {
            if (result.value) {
                var url = '/'+model+'/delete/'+record_id;
                var token = $("meta[name='csrf-token']").attr("content");
                $.ajax(
                    {
                        url: url,
                        type: 'DELETE',
                        data: {
                            "id": record_id,
                            "_token": token,
                        },
                        success: function () {
                            Swal.fire('Deleted!', 'Record has been deleted.', 'success');
                            location.reload()
                        }
                    });
            }
        });
    }
    function get_data(route){
        $.get(route, function (data) {
            $('#modal_data').html(data);
        })
    }

    {{--$('body').on('click', '.product_like', function(event){--}}
    {{--    $.ajaxSetup({--}}
    {{--        headers: {--}}
    {{--            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
    {{--        }--}}
    {{--    });--}}
    {{--    var product = event.target.id;--}}
    {{--    var clicked_element = this--}}
    {{--    $.ajax({--}}
    {{--        type:'POST',--}}
    {{--        url:"{{ route('product_like') }}",--}}
    {{--        data:{product:product},--}}
    {{--        success:function(data){--}}
    {{--            $(clicked_element).removeClass('product_like');--}}
    {{--            $(clicked_element).addClass('color_blue');--}}
    {{--            $('#product_like_'+product).html(data)--}}
    {{--        }--}}
    {{--    });--}}
    {{--});--}}
</script>
@yield('script')
</body>

</html>



