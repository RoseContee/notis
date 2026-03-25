<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--favicon-->
    <link rel="icon" href="{{url('/')}}/rental.png" type="image/png" />
    <!--plugins-->
    <link href="{{url('/')}}/rental_files/assets/plugins/OwlCarousel/css/owl.carousel.min.css" rel="stylesheet" />
    <link href="{{url('/')}}/rental_files/assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
    <link href="{{url('/')}}/rental_files/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
    <link href="{{url('/')}}/rental_files/assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
    <!-- loader-->
    <link href="{{url('/')}}/rental_files/assets/css/pace.min.css" rel="stylesheet" />
    <script src="{{url('/')}}/rental_files/assets/js/pace.min.js"></script>
    <!-- Bootstrap CSS -->
    <link href="{{url('/')}}/rental_files/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="{{url('/')}}/rental_files/assets/css/app.css" rel="stylesheet">
    <link href="{{url('/')}}/rental_files/assets/css/icons.css" rel="stylesheet">
    <title> Notis Studios </title>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.print.css" rel="stylesheet" media="print">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    <style>
        .image-container {
            width: 100%;
            height: 300px; /* You can adjust this value to your preferred height */
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .image-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .custom-date-input::-webkit-calendar-picker-indicator {
            background-image: url("data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='%23ffffff'><path d='M19 3h-1V1h-2v2H8V1H6v2H5c-1.11 0-2 .9-2 2v14c0 1.1.89 2 2 2h14c1.11 0 2-.9 2-2V5c0-1.1-.89-2-2-2zm0 16H5V8h14v11zM7 10h5v5H7z'/></svg>");
            background-repeat: no-repeat;
            background-size: contain;
            background-position: center;
            background-color: transparent;
            border: none;
            cursor: pointer;
        }

        .custom-date-input::-webkit-inner-spin-button,
        .custom-date-input::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        .available, .month{
            color: black;
        }
        .fc-toolbar.fc-header-toolbar{
            margin: 0;
            padding: 0;
        }
        .fc-center h2, .fc-day-header span{
            color: black;
        }
        /* Set the font size and font family */
        #special_dates_calendar, .fc {
            font-size: 16px;
            font-family: Arial, sans-serif;
        }

        /* Set the background color to white */
        .fc-unthemed {
            background-color: #fff;
        }

        /* Remove the border */
        .fc-unthemed, .fc-row, .fc-content, .fc-day-header {
            border: none !important;
        }

        /* Set the cell height */
        .fc-row, .fc-content {
            height: 24px;
        }

        /* Set the cell padding */
        .fc-day, .fc-popover, .fc-list-item {
            padding: 0;
        }

        /* Set the color of the text and borders */
        .fc-day-number, .fc-button {
            color: #000;
            border-color: #ccc;
            font-size: 12px;
            padding: 4px;
        }

        /* Set the background color of the selected cell */
        .fc-highlight {
            background-color: #ddd;
        }

        /* Set the hover color of the cells */
        .fc-day:hover, .fc-button:hover {
            background-color: #f5f5f5;
            cursor: pointer;
        }
        #special_dates_calendar {
            max-height: 500px; /* Change the value to adjust the height as needed */
            overflow-y: auto;
        }

    </style>
    @yield('css')
</head>

<body class="bg-theme ">	<b class="screen-overlay"></b>
<!--wrapper-->
<div class="wrapper">
{{--    <div class="discount-alert bg-dark-1 d-none d-lg-block">--}}
{{--        <div class="alert alert-dismissible fade show shadow-none rounded-0 mb-0 border-bottom">--}}
{{--            <div class="d-lg-flex align-items-center gap-2 justify-content-center">--}}
{{--                <p class="mb-0 text-white">Get Up to <strong>40% OFF</strong> New-Season Styles</p>	<a href="javascript:;" class="bg-dark text-white px-1 font-13 cursor-pointer">Men</a>--}}
{{--                <a href="javascript:;" class="bg-dark text-white px-1 font-13 cursor-pointer">Women</a>--}}
{{--                <p class="mb-0 font-13 text-light-3">*Limited time only</p>--}}
{{--            </div>--}}
{{--            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>--}}
{{--        </div>--}}
{{--    </div>--}}
<!--start top header wrapper-->
    <div class="header-wrapper bg-dark-1">
{{--        <div class="top-menu border-bottom">--}}
{{--            <div class="container">--}}
{{--                <nav class="navbar navbar-expand">--}}
{{--                    <div class="shiping-title text-uppercase font-13 text-white d-none d-sm-flex">Welcome to our store!</div>--}}
{{--                    <ul class="navbar-nav ms-auto d-none d-lg-flex">--}}
{{--                        <li class="nav-item"> <a class="nav-link" href="order-tracking.html">Track Order</a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item"> <a class="nav-link" href="about-us.html">About</a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item"> <a class="nav-link" href="shop-categories.html">Our Stores</a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item"> <a class="nav-link" href="blog.html">Blog</a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item">	<a class="nav-link" href="contact-us.html">Contact</a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item">	<a class="nav-link" href="javascript:;">Help & FAQs</a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                    <ul class="navbar-nav">--}}
{{--                        <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">USD</a>--}}
{{--                            <ul class="dropdown-menu dropdown-menu-lg-end">--}}
{{--                                <li><a class="dropdown-item" href="#">USD</a>--}}
{{--                                </li>--}}
{{--                                <li><a class="dropdown-item" href="#">EUR</a>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item dropdown">--}}
{{--                            <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown">--}}
{{--                                <div class="lang d-flex gap-1">--}}
{{--                                    <div><i class="flag-icon flag-icon-um"></i>--}}
{{--                                    </div>--}}
{{--                                    <div><span>ENG</span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </a>--}}
{{--                            <div class="dropdown-menu dropdown-menu-lg-end">--}}
{{--                                <a class="dropdown-item d-flex allign-items-center" href="javascript:;"> <i class="flag-icon flag-icon-de me-2"></i><span>German</span>--}}
{{--                                </a>	<a class="dropdown-item d-flex allign-items-center" href="javascript:;"><i--}}
{{--                                            class="flag-icon flag-icon-fr me-2"></i><span>French</span></a>--}}
{{--                                <a class="dropdown-item d-flex allign-items-center" href="javascript:;"><i--}}
{{--                                            class="flag-icon flag-icon-um me-2"></i><span>English</span></a>--}}
{{--                                <a class="dropdown-item d-flex allign-items-center" href="javascript:;"><i--}}
{{--                                            class="flag-icon flag-icon-in me-2"></i><span>Hindi</span></a>--}}
{{--                                <a class="dropdown-item d-flex allign-items-center" href="javascript:;"><i--}}
{{--                                            class="flag-icon flag-icon-cn me-2"></i><span>Chinese</span></a>--}}
{{--                                <a class="dropdown-item d-flex allign-items-center" href="javascript:;"><i--}}
{{--                                            class="flag-icon flag-icon-ae me-2"></i><span>Arabic</span></a>--}}
{{--                            </div>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                    <ul class="navbar-nav social-link ms-lg-2 ms-auto">--}}
{{--                        <li class="nav-item"> <a class="nav-link" href="javascript:;"><i class='bx bxl-facebook'></i></a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item"> <a class="nav-link" href="javascript:;"><i class='bx bxl-twitter'></i></a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item"> <a class="nav-link" href="javascript:;"><i class='bx bxl-linkedin'></i></a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </nav>--}}
{{--            </div>--}}
{{--        </div>--}}
        <div class="header-content pb-3 pb-md-0">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col col-md-auto">
                        <div class="d-flex align-items-center">
                            <div class="mobile-toggle-menu d-lg-none px-lg-2" data-trigger="#navbar_main"><i class='bx bx-menu'></i>
                            </div>
                            <div class="logo d-none d-lg-flex">
                                <a href="https://notisstudios.com/">
                                    <img src="{{url('/')}}/rental.png" class="logo-icon" alt="" />
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md order-4 order-md-2">
                        <div class="input-group flex-nowrap px-xl-4">
{{--                            <input type="text" class="form-control w-100" placeholder="Search for Products">--}}
{{--                            <span class="input-group-text cursor-pointer"><i class='bx bx-search'></i></span>--}}
                        </div>
                    </div>
                    <div class="col col-md-auto order-3 d-none d-xl-flex align-items-center">
                        <div class="fs-1 text-white"><i class='bx bx-headphone'></i>
                        </div>
                        <div class="ms-2">
                            <p class="mb-0 font-13">CALL US NOW</p>
                            <h5 class="mb-0">(405) 437-4820</h5>
                        </div>
                    </div>
                    <div class="col col-md-auto order-2 order-md-4">
                        <div class="top-cart-icons">
                            <nav class="navbar navbar-expand">
                                <ul class="navbar-nav ms-auto">
                                    <li class="nav-item">
                                        @if(\Illuminate\Support\Facades\Auth::check())
                                            <a href="{{route('rental.dashboard')}}" class="nav-link cart-link"><i class='bx bx-user'></i></a>
                                        @else
                                            <a href="{{route('rental.signin')}}" class="nav-link cart-link"><i class='bx bx-user'></i></a>
                                        @endif
                                    </li>
{{--                                    <li class="nav-item"><a href="{{route('rental.checkout')}}" class="nav-link cart-link"><i class='bx bx-heart'></i></a>--}}
{{--                                    </li>--}}
                                    <li class="nav-item dropdown dropdown-large">
                                        <a href="{{route('rental.checkout')}}" class="nav-linkposition-relative cart-link" >
                                            <i class='bx bx-shopping-bag' style="margin-top: 6px"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">

                                            <div class="cart-list d-none">


                                            </div>

                                            <div class="d-grid p-3 border-top">	<a href="javascript:;" class="btn btn-light btn-ecomm">CHECKOUT</a>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
                <!--end row-->
            </div>
        </div>
        <div class="primary-menu border-top">
            <div class="container">
                <nav id="navbar_main" class="mobile-offcanvas navbar navbar-expand-lg">
                    <div class="offcanvas-header">
                        <button class="btn-close float-end"></button>
                        <h5 class="py-2 text-white">Notis Studios</h5>
                    </div>
                    <ul class="navbar-nav">
                        <li class="nav-item active"> <a class="nav-link" href="{{route('rental')}}">Home </a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="{{route('rental.all_equipment')}}" id="equipments-link">Tools / Equipments <i class='bx bx-chevron-down'></i></a>
                            <div class="dropdown-menu dropdown-large-menu">
                                <div class="row">
                                    <div class="col-md-4">
                                        <ul class="">
                                            @php
                                                $top_categories = \App\Models\Category::where('parent_cat',null)->get();
                                            @endphp
                                            @foreach($top_categories as $top_category)
                                                <li><a href="{{route('top_category',$top_category->id)}}">{{$top_category->name}}</a>
                                                </li>
                                            @endforeach

                                        </ul>
                                    </div>
                                    <!-- end col-3 -->
                                </div>
                                <!-- end row -->
                            </div>
                            <!-- dropdown-large.// -->
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="{{route('rental.all_rooms')}}" id="rooms-link">Rooms <i class='bx bx-chevron-down'></i></a>
                            <div class="dropdown-menu dropdown-large-menu" aria-labelledby="rooms-link">
                                <div class="row">
                                    <div class="col-md-4">
                                        <ul class="">
                                            @php
                                                $rooms = \App\Models\Room::where('status',1)->get();
                                            @endphp
                                            @foreach($rooms as $room)
                                                <li><a href="{{route('view_room',$room->id)}}">{{$room->name}}</a></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <!-- end col-3 -->
                                </div>
                                <!-- end row -->
                            </div>
                            <!-- dropdown-large.// -->
                        </li>

                        {{--                        <li class="nav-item"> <a class="nav-link" href="about-us.html">About Us </a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item"> <a class="nav-link" href="contact-us.html">Contact Us </a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item"> <a class="nav-link" href="shop-categories.html">Our Store</a>--}}
{{--                        </li>--}}
                        @if(\Illuminate\Support\Facades\Auth::check())
                            <li class="nav-item dropdown">	<a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown">My Account  <i class='bx bx-chevron-down'></i></a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{route('rental.dashboard')}}">Dashboard</a>
                                    </li>
                                    <li><a class="dropdown-item" href="{{route('rental.bookings')}}">Bookings</a>
                                    </li>
                                    <li><a class="dropdown-item" href="{{route('rental.purchases')}}">Purchases</a>
                                    </li>
                                    <li><a class="dropdown-item" href="{{route('rental.payment_method')}}">Payment Methods</a>
                                    </li>
                                    <li><a class="dropdown-item" href="{{route('rental.account_detail')}}">Account Details</a>
                                    </li>
                                </ul>
                            </li>
                        @else
                            <li class="nav-item"> <a class="nav-link" href="{{route('rental.signin')}}">Sign in</a></li>
                            <li class="nav-item"> <a class="nav-link" href="{{route('rental.signup')}}">Sign up</a></li>
                        @endif
                        <li class="nav-item"> <a class="nav-link" href="{{route('rental.hire')}}">Hire Notis Studios</a></li>
                        @php
                        $equipments = App\Models\Equipment::where('status', 1)->where('seperate_page', 1)->get();
                        @endphp
                        @foreach($equipments as $equipment)
                            <li class="nav-item"> <a class="nav-link" href="{{route('rental.seperate_page', $equipment->id)}}">{{$equipment->name}}</a></li>
                        @endforeach
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    @yield('content')
    <footer>
        <section class="py-4 bg-dark-1">
            <div class="container">
{{--                <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-4">--}}
{{--                    <div class="col">--}}
{{--                        <div class="footer-section1 mb-3">--}}
{{--                            <h6 class="mb-3 text-uppercase">Contact Info</h6>--}}
{{--                            <div class="address mb-3">--}}
{{--                                <p class="mb-0 text-uppercase text-white">Address</p>--}}
{{--                                <p class="mb-0 font-12">123 Street Name, City, Australia</p>--}}
{{--                            </div>--}}
{{--                            <div class="phone mb-3">--}}
{{--                                <p class="mb-0 text-uppercase text-white">Phone</p>--}}
{{--                                <p class="mb-0 font-13">Toll Free (123) 472-796</p>--}}
{{--                                <p class="mb-0 font-13">Mobile : +91-9910XXXX</p>--}}
{{--                            </div>--}}
{{--                            <div class="email mb-3">--}}
{{--                                <p class="mb-0 text-uppercase text-white">Email</p>--}}
{{--                                <p class="mb-0 font-13">mail@example.com</p>--}}
{{--                            </div>--}}
{{--                            <div class="working-days mb-3">--}}
{{--                                <p class="mb-0 text-uppercase text-white">WORKING DAYS</p>--}}
{{--                                <p class="mb-0 font-13">Mon - FRI / 9:30 AM - 6:30 PM</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col">--}}
{{--                        <div class="footer-section2 mb-3">--}}
{{--                            <h6 class="mb-3 text-uppercase">Tools / Equipments</h6>--}}
{{--                            <ul class="list-unstyled">--}}
{{--                                <li class="mb-1"><a href="javascript:;"><i class='bx bx-chevron-right'></i> Jeans</a>--}}
{{--                                </li>--}}
{{--                                <li class="mb-1"><a href="javascript:;"><i class='bx bx-chevron-right'></i> T-Shirts</a>--}}
{{--                                </li>--}}
{{--                                <li class="mb-1"><a href="javascript:;"><i class='bx bx-chevron-right'></i> Sports</a>--}}
{{--                                </li>--}}
{{--                                <li class="mb-1"><a href="javascript:;"><i class='bx bx-chevron-right'></i> Shirts & Tops</a>--}}
{{--                                </li>--}}
{{--                                <li class="mb-1"><a href="javascript:;"><i class='bx bx-chevron-right'></i> Clogs & Mules</a>--}}
{{--                                </li>--}}
{{--                                <li class="mb-1"><a href="javascript:;"><i class='bx bx-chevron-right'></i> Sunglasses</a>--}}
{{--                                </li>--}}
{{--                                <li class="mb-1"><a href="javascript:;"><i class='bx bx-chevron-right'></i> Bags & Wallets</a>--}}
{{--                                </li>--}}
{{--                                <li class="mb-1"><a href="javascript:;"><i class='bx bx-chevron-right'></i> Sneakers & Athletic</a>--}}
{{--                                </li>--}}
{{--                                <li class="mb-1"><a href="javascript:;"><i class='bx bx-chevron-right'></i> Electronis</a>--}}
{{--                                </li>--}}
{{--                                <li class="mb-1"><a href="javascript:;"><i class='bx bx-chevron-right'></i> Furniture</a>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col">--}}
{{--                        <div class="footer-section3 mb-3">--}}
{{--                            <h6 class="mb-3 text-uppercase">Popular Tags</h6>--}}
{{--                            <div class="tags-box"> <a href="javascript:;" class="tag-link">Cloths</a>--}}
{{--                                <a href="javascript:;" class="tag-link">Electronis</a>--}}
{{--                                <a href="javascript:;" class="tag-link">Furniture</a>--}}
{{--                                <a href="javascript:;" class="tag-link">Sports</a>--}}
{{--                                <a href="javascript:;" class="tag-link">Men Wear</a>--}}
{{--                                <a href="javascript:;" class="tag-link">Women Wear</a>--}}
{{--                                <a href="javascript:;" class="tag-link">Laptops</a>--}}
{{--                                <a href="javascript:;" class="tag-link">Formal Shirts</a>--}}
{{--                                <a href="javascript:;" class="tag-link">Topwear</a>--}}
{{--                                <a href="javascript:;" class="tag-link">Headphones</a>--}}
{{--                                <a href="javascript:;" class="tag-link">Bottom Wear</a>--}}
{{--                                <a href="javascript:;" class="tag-link">Bags</a>--}}
{{--                                <a href="javascript:;" class="tag-link">Sofa</a>--}}
{{--                                <a href="javascript:;" class="tag-link">Shoes</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col">--}}
{{--                        <div class="footer-section4 mb-3">--}}
{{--                            <h6 class="mb-3 text-uppercase">Stay informed</h6>--}}
{{--                            <div class="subscribe">--}}
{{--                                <input type="text" class="form-control radius-30" placeholder="Enter Your Email" />--}}
{{--                                <div class="mt-2 d-grid">	<a href="javascript:;" class="btn btn-white btn-ecomm radius-30">Subscribe</a>--}}
{{--                                </div>--}}
{{--                                <p class="mt-2 mb-0 font-13">Subscribe to our newsletter to receive early discount offers, updates and new products info.</p>--}}
{{--                            </div>--}}
{{--                            <div class="download-app mt-3">--}}
{{--                                <h6 class="mb-3 text-uppercase">Download our app</h6>--}}
{{--                                <div class="d-flex align-items-center gap-2">--}}
{{--                                    <a href="javascript:;">--}}
{{--                                        <img src="{{url('/')}}/rental_files/assets/images/icons/apple-store.png" class="" width="160" alt="" />--}}
{{--                                    </a>--}}
{{--                                    <a href="javascript:;">--}}
{{--                                        <img src="{{url('/')}}/rental_files/assets/images/icons/play-store.png" class="" width="160" alt="" />--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
                <!--end row-->
                <hr/>
                <div class="row row-cols-1 row-cols-md-2 align-items-center">
                    <div class="col">
                        <p class="mb-0">Copyright © {{date('Y')}}. All right reserved.</p>
                    </div>
{{--                    <div class="col text-end">--}}
{{--                        <div class="payment-icon">--}}
{{--                            <div class="row row-cols-auto g-2 justify-content-end">--}}
{{--                                <div class="col">--}}
{{--                                    <img src="{{url('/')}}/rental_files/assets/images/icons/visa.png" alt="" />--}}
{{--                                </div>--}}
{{--                                <div class="col">--}}
{{--                                    <img src="{{url('/')}}/rental_files/assets/images/icons/paypal.png" alt="" />--}}
{{--                                </div>--}}
{{--                                <div class="col">--}}
{{--                                    <img src="{{url('/')}}/rental_files/assets/images/icons/mastercard.png" alt="" />--}}
{{--                                </div>--}}
{{--                                <div class="col">--}}
{{--                                    <img src="{{url('/')}}/rental_files/assets/images/icons/american-express.png" alt="" />--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                </div>
                <!--end row-->
            </div>
        </section>
    </footer>
    <!--end footer section-->

{{--    Booking Modal --}}
    <div class="modal fade" id="booking-modal" tabindex="-1" role="dialog" aria-labelledby="booking-modal-label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="booking-modal-label">Select Rental Date</h5>
                </div>
                <div class="modal-body">
                    <div id="popup">

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- The toast container -->
    <div class="toast-container position-fixed top-0 end-0 p-3" style="z-index: 9999">
        <!-- The toast -->
        <div id="my-toast" class="toast">
            <div class="toast-body text-white">
            </div>
        </div>
    </div>
</div>
<!--end wrapper-->
<!-- Bootstrap JS -->
<script src="{{url('/')}}/rental_files/assets/js/bootstrap.bundle.min.js"></script>
<!--plugins-->
<script src="{{url('/')}}/rental_files/assets/js/jquery.min.js"></script>
<script src="{{url('/')}}/rental_files/assets/plugins/simplebar/js/simplebar.min.js"></script>
<script src="{{url('/')}}/rental_files/assets/plugins/OwlCarousel/js/owl.carousel.min.js"></script>
<script src="{{url('/')}}/rental_files/assets/plugins/OwlCarousel/js/owl.carousel2.thumbs.min.js"></script>
<script src="{{url('/')}}/rental_files/assets/plugins/metismenu/js/metisMenu.min.js"></script>
<script src="{{url('/')}}/rental_files/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
<!--app JS-->
<script src="{{url('/')}}/rental_files/assets/js/app.js"></script>
<script src="{{url('/')}}/rental_files/assets/js/index.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js"></script>

<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

@php
    $authenticated = \Illuminate\Support\Facades\Auth::check();
@endphp
<script>
    $(document).ready(function() {
        @if(session('success'))
        // Set the success message
        let successMessage = '{{ session('success') }}';

        // Update the toast content and style
        $('.toast-body').removeClass('bg-danger');
        $('.toast-body').addClass('bg-success');
        $('.toast-body').html(successMessage);
        $('#my-toast').toast('show');
        @endif
    });
</script>
<script>
    // Event listener for Rent button click
    $('.rent-button').on('click', function() {
        var price_type = $(this).data('price_type');
        var auth = "{{ $authenticated }}";
        if(!auth) {
            window.location.href = '{{route('rental.signin')}}';
            return;
        }
        var id = $(this).data('id');
        var type = $(this).data('type');
        var special_request = $(this).data('special_request');
        var quantity = $(this).data('quantity');
        $('.monthly_booking').addClass('d-none')

        $.get('/boooking_modal', data => {
            $('#popup').html(data)

            var html_options = '';
            // if(price_type == 'both'){
            //     html_options = '<option value="hour">Hourly</option> <option value="day" selected>Days (consecutive days)</option> <option value="special">Special Days Selection</option>'
            // }else if (price_type == 'hour'){
            //     html_options = '<option value="hour" selected>Hourly</option> '
            // }else if( price_type == 'day'){
            //     html_options = '<option value="day" selected>Days (consecutive days)</option> <option value="special">Special Days Selection</option>'
            // }

            if(quantity > 1){
                $('.quantity').removeClass('d-none')
            }else{
                $('.quantity').addClass('d-none')
            }

            if(type == 'equipment'){
                $('.booking_type').addClass('d-none')
                range_function()
            }else{
                if(price_type == 'day' ){
                    html_options = '<option value="special">Special Days Selection</option>'
                    special_date_function()
                }else if(price_type == 'hour'){
                    html_options = '<option value="hour" selected>Hourly</option> '
                    hourly_function()
                }else if(price_type == 'both'){
                    html_options = '<option value="special">Special Days Selection</option> <option value="hour" selected>Hourly</option> '
                    hourly_function()
                }else if(price_type == 'monthly'){
                    html_options = '<option value="monthly">Monthly</option>'
                    monthly_function();
                }

                if(special_request){
                    html_options = html_options+'<option value="special_request">Special Request</option>';
                }
            }
            $('#booking_type').html(html_options)

            $('#booking-modal').modal('show');

            $('#booking_type').off('change').change(function () {
                $('#hourly_dateType').addClass('d-none')
                $('#special_dates').addClass('d-none')
                $('#date_ranger').addClass('d-none')

                var booking_type = $(this).val();
                if(booking_type == 'hour'){
                    if(price_type == 'day'){
                        $('.toast-body').addClass('bg-danger');
                        $('.toast-body').html('This is only available for daily booking');
                        $('#my-toast').toast('show');
                        return; // This will stop the execution of the code
                    }
                    $('#special_request').addClass('d-none');
                    $('#special_request').html('');

                    hourly_function();
                }
                else if(booking_type == 'day'){
                    if(price_type == 'hour' ){
                        $('.toast-body').addClass('bg-danger');
                        $('.toast-body').html('This is only available for hourly booking');
                        $('#my-toast').toast('show');
                        return; // This will stop the execution of the code
                    }

                    range_function();
                }else if(booking_type == 'special'){
                    if(price_type == 'hour' ){
                        $('.toast-body').addClass('bg-danger');
                        $('.toast-body').html('This is only available for hourly booking');
                        $('#my-toast').toast('show');
                        return; // This will stop the execution of the code
                    }

                    special_date_function();
                }else if(booking_type == 'special_request'){
                    var html = `<form method="POST" action="{{ route('special_request') }}" >
                    @csrf
                    <input type='hidden' name="id" value=`+id+` required>
                    <input type='hidden' name="type" value=`+type+` required>
                    <br><div class="form-group">
                        <h5>Type Special Request</h5>
                        <div class="form-group">
                            Full Name
                            <input type='text' class="form-control" name="name" placeholder="Name" required>
                        </div>
                        <div class="form-group">
                            Phone Number
                            <input type='text' class="form-control" name="phone" placeholder="Phone Number" required>
                        </div>
                        <div class="form-group">
                            Enter Request Here
                            <textarea name="special_request" id="" cols="30" rows="10" style="width:100%; padding:15px" required></textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary float-right" style="float:right">Submit</button>
                    </form>`;

                    $('#rent_footer_buttons').addClass('d-none');
                    $('#special_request').removeClass('d-none');
                    $('#special_request').html(html);

                }
            });


            function getCurrentDayInCST() {
                const now = new Date();
                const cstOffset = -6 * 60; // CST is UTC-6 hours (this assumes no daylight saving time)
                const currentOffset = now.getTimezoneOffset();
                const targetOffset = currentOffset - cstOffset;
                const today = new Date(now.getTime() + targetOffset * 60 * 1000);

                return new Date(today.getTime() - targetOffset * 60 * 1000);
            }
            function monthly_function(){
                $('.monthly_booking').removeClass('d-none')
                $.get('/monthly_bookings/check', {id}, data => {
                    if(data.status == 'error'){
                        $('.toast-body').addClass('bg-danger');
                        $('.toast-body').html(data.message);
                        $('#my-toast').toast('show');
                        $('.booked_date_html').html(data.message)
                    }else{
                        var html = '<input type="date" name="start_date" id="start_date" value="'+data+'">';
                        $('#monthly_booking_date').html(html);
                        $('.complete-booking-button').prop('disabled', false);
                        // Event listener for Complete Booking button click
                        $('.complete-booking-button').one('click', function(event) {
                            var buttonId = event.target.id;
                            const token = $('meta[name="csrf-token"]').attr('content');

                            // Get the start_date value from the input field
                            var selected_date = $('#start_date').val();
                            console.log(selected_date)
                            var months = $('#monthly_booking_select').val();
                            console.log(months)

                            $.post('/store_monthly_room', {id, start_date: selected_date, months: months, _token: token})
                                .done(data => {
                                    if(data.error){
                                        $('.toast-body').addClass('bg-danger');
                                        $('.toast-body').html(data.message);
                                        $('#my-toast').toast('show');
                                    }else{
                                        $('.toast-body').addClass('bg-success');
                                        $('.toast-body').html(data.message);
                                        $('#my-toast').toast('show');
                                    }
                                    if(buttonId === 'continue'){
                                        $('#booking-modal').modal('hide');
                                    }else{
                                        window.location = '{{route('rental.checkout')}}';
                                    }
                                })
                                .fail(({responseText}) => console.log(responseText));
                        });
                    }
                });
            }
            function hourly_function(){
                $('#hourly_dateType').removeClass('d-none')

                const todayInCST = getCurrentDayInCST();
                const todayString = todayInCST.toISOString().slice(0, 10);
                $('#date').val(todayString);

                // Load the slots for the selected date
                loadHourlySlots(todayString);

                // Event listener for date change
                $('#date').off('change').change(function () {
                    var date = $(this).val();
                    $('.booked_date_html').addClass('d-none').empty();
                    $('#slots_table').empty();
                    $('#my-toast').toast('hide');
                    $('.complete-booking-button').prop('disabled', true);

                    // Load the slots for the selected date
                    loadHourlySlots(date);
                });

                function loadHourlySlots(date) {
                    // Display hourly slots for the selected date
                    $.get('/bookings/check', {id, date, type}, data => {
                        if(data.status == 'error'){
                            $('.toast-body').addClass('bg-danger');
                            $('.toast-body').html(data.message);
                            $('#my-toast').toast('show');
                            $('.booked_date_html').html(data.message)
                        }else{
                            if(data.type == 'both' || data.type == 'hour' ){
                                $('.slots_table').removeClass('d-none')
                                // display the slots
                                // Create the HTML for the checkboxes
                                var html = '';
                                var slots = data.slots;
                                if (!Array.isArray(slots)) {
                                    slots = Object.values(slots);
                                }

                                for (var i = 0; i < slots.length; i++) {
                                    var slot = slots[i];
                                    html += '<tr><td>' + slot + '</td><td><input class="checkboxes" type="checkbox" name="slots[]" value="' + slot + '"></td></tr>';
                                }
                                $('#slots_table').html(html);

                                // Listen for changes on the checkboxes
                                $('input.checkboxes').change(function() {
                                    // Check if at least one checkbox is checked
                                    if ($('input.checkboxes:checked').length > 0) {
                                        // Enable the button
                                        $('.complete-booking-button').prop('disabled', false);
                                    } else {
                                        // Disable the button
                                        $('.complete-booking-button').prop('disabled', true);
                                    }
                                });

                            }else{
                                $('.complete-booking-button').prop('disabled', true);
                                $('.slots_table').addClass('d-none')
                                $('.booked_date_html').removeClass('d-none').html(data.message)
                            }
                        }
                    });
                }

                // Event listener for Complete Booking button click
                $('.complete-booking-button').off('click').one('click', function(event) {
                    var buttonId = event.target.id;
                    const token = $('meta[name="csrf-token"]').attr('content');
                    var booking_type_post = $('#booking_type').val();
                    console.log(booking_type_post)
                    var checkboxValues = $('.checkboxes:checked').map(function() {
                        return $(this).val();
                    }).get();

                    $.post('/store_slots', {id, type, date: $('#date').val(), booking_type_post, checkboxValues, _token: token})
                        .done(data => {
                            if(data.error){
                                $('.toast-body').addClass('bg-danger');
                                $('.toast-body').html(data.message);
                                $('#my-toast').toast('show');
                            }else{
                                $('.toast-body').addClass('bg-success');
                                $('.toast-body').html(data.message);
                                $('#my-toast').toast('show');
                            }
                            if(buttonId === 'continue'){
                                $('#booking-modal').modal('hide');
                            }else{
                                window.location = '{{route('rental.checkout')}}';
                            }
                        })
                        .fail(({responseText}) => console.log(responseText));
                });
            }

            function range_function(){
                $('.slots_table').addClass('d-none')
                var start_date = ''
                var end_date = ''
                $.get('/checkDaysAvailability', {id, type}, data => {
                    $('#date_ranger').removeClass('d-none');
                    $('.complete-booking-button').prop('disabled', false);
                    // Initialize the daterangepicker plugin for the input element with id="daterange"
                    $('input[name="daterange"]').daterangepicker({
                        opens: 'left',
                        isInvalidDate: function(date) {
                            // Check if the date is in the array of disabled dates
                            return data.includes(date.format('YYYY-MM-DD'));
                        },
                        startDate: moment().add(1, 'days').startOf('day'), // Start from tomorrow
                        endDate: moment().add(8, 'days').startOf('day'), // End after 7 days
                        minDate: moment().add(1, 'days').startOf('day'), // Minimum selectable date is tomorrow
                        maxDate: moment().add(90, 'days').startOf('day'), // Maximum selectable date is 90 days from tomorrow
                        autoApply: true // Apply the selected range automatically
                    }, function(start, end, label) {
                        start_date = start.format('YYYY-MM-DD')
                        end_date = end.format('YYYY-MM-DD')
                        $('.complete-booking-button').prop('disabled', false);
                    });

                    // Event listener for Complete Booking button click
                    $('.complete-booking-button').one('click', function(event) {
                        // Get the pre-selected start and end dates
                        const startDate = $('input[name="daterange"]').data('daterangepicker').startDate.format('YYYY-MM-DD');
                        const endDate = $('input[name="daterange"]').data('daterangepicker').endDate.format('YYYY-MM-DD');

                        // Set the start_date and end_date variables
                        start_date = startDate;
                        end_date = endDate;
                        var buttonId = event.target.id;
                        const token = $('meta[name="csrf-token"]').attr('content');
                        $.post('/store_consective_days', {id, type, start_date, end_date, quantity, _token: token})
                            .done(data => {
                                if(data.error){
                                    $('.toast-body').addClass('bg-danger');
                                    $('.toast-body').html(data.message);
                                    $('#my-toast').toast('show');
                                }else{
                                    $('.toast-body').addClass('bg-success');
                                    $('.toast-body').html(data.message);
                                    $('#my-toast').toast('show');
                                }
                                if(buttonId === 'continue'){
                                    $('#booking-modal').modal('hide');
                                }else{
                                    window.location = '{{route('rental.checkout')}}';
                                }
                            })
                            .fail(({responseText}) => console.log(responseText));
                    });
                });
            }

            function special_date_function(){
                $('.slots_table').addClass('d-none')
                $('#special_dates').removeClass('d-none')

                var selectedDates = [];
                // Set calendar options
                var calendarOptions = {
                    contentHeight: 'auto',
                    bookedDates: [],
                    header: {left: 'prev,next today', center: 'title'},
                    defaultView: 'month',
                    selectable: true,
                    events: [],
                    longPressDelay: 0,
                    eventLongPressDelay: 0,
                    selectLongPressDelay: 0,
                    selectAllow: function (selectInfo) {
                        var date = moment(selectInfo.start);
                        var now = moment();
                        return !date.isBefore(now, 'day') && !calendarOptions.bookedDates.includes(date.format('YYYY-MM-DD')) && !date.isSame(now, 'day');
                    },
                    select: function (start, end) {
                        var selectedDate = moment(start).format();
                        var dateIndex = calendarOptions.events.findIndex(function(event){
                            return moment(event.start).format() === selectedDate && event.color === 'green';
                        });
                        if (dateIndex >= 0) {
                            calendarOptions.events.splice(dateIndex, 1);
                            $('#special_dates_calendar').fullCalendar('removeEvents', function(event){
                                return moment(event.start).format() === selectedDate && event.color === 'green';
                            });
                            var selectedIndex = selectedDates.indexOf(selectedDate);
                            if (selectedIndex !== -1) {
                                selectedDates.splice(selectedIndex, 1);
                            }
                        } else {
                            calendarOptions.events.push({
                                start: start,
                                end: end,
                                rendering: 'background',
                                color: 'green'
                            });
                            selectedDates.push(selectedDate); // add selected date to the array
                            $('#special_dates_calendar').fullCalendar('renderEvent', calendarOptions.events.slice(-1)[0]);
                        }
                        $('.complete-booking-button').prop('disabled', calendarOptions.events.length === 0);
                    },
                    viewRender: function (view, element) {
                        var start = view.start.format('YYYY-MM-DD');
                        var end = view.end.subtract(1, 'day').format('YYYY-MM-DD');
                        $.get('/checkDaysAvailability', {id, type, start, end}, data => {
                            calendarOptions.bookedDates = data;
                            $('.fc-day-booked').removeClass('fc-day-unavailable fc-day-booked');
                            data.forEach(date => {
                                $('#special_dates_calendar').fullCalendar('renderEvent', {
                                    start: date,
                                    rendering: 'background',
                                    color: 'red'
                                });
                                $(`td[data-date="${date}"]`).addClass('fc-day-unavailable fc-day-booked');
                            });
                            $('#special_dates_calendar').fullCalendar('removeEvents', function(event){
                                return event.color === 'green';
                            });
                            $('#special_dates_calendar').fullCalendar('renderEvents', calendarOptions.events);
                        });
                    }
                };


                // Initialize calendar and show popup
                $('#special_dates_calendar').fullCalendar('destroy');
                $('#special_dates_calendar').fullCalendar(calendarOptions);

                // Event listener for Complete Booking button click
                $('.complete-booking-button').one('click', function(event) {
                    var buttonId = event.target.id;
                    const token = $('meta[name="csrf-token"]').attr('content');
                    $.post('/store_special_days', {id, type, dates: selectedDates, _token: token})
                        .done(data => {
                            if(data.error){
                                $('.toast-body').addClass('bg-danger');
                                $('.toast-body').html(data.message);
                                $('#my-toast').toast('show');
                            }else{
                                $('.toast-body').addClass('bg-success');
                                $('.toast-body').html(data.message);
                                $('#my-toast').toast('show');
                            }
                            if(buttonId === 'continue'){
                                $('#booking-modal').modal('hide');
                            }else{
                                window.location = '{{route('rental.checkout')}}';
                            }
                        })
                        .fail(({responseText}) => console.log(responseText));
                });
            }
        });
    });

</script>

<script>
    $(document).ready(function() {
        $('#rooms-link').click(function() {
            window.location.href = $(this).attr('href');
            return false;
        });
        $('#equipments-link').click(function() {
            window.location.href = $(this).attr('href');
            return false;
        });
    });
</script>


</body>

</html>