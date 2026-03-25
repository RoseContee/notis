@extends('layouts.rental')
@section('css')
    <style>
        .carousel-image {
            height: 600px; /* Adjust this value according to your desired height */
            object-fit: cover;
        }

    </style>
@endsection
@section('content')
<!--end top header wrapper-->
<!--start slider section-->
<section class="slider-section">
    <div class="first-slider">
        <div id="carouselExampleDark" class="carousel slide" data-bs-ride="carousel">
            <ol class="carousel-indicators">
                @php
                    $roomscount = count($rooms);
                    $equipmentscount = count($equipments);
                    $active = false;
                    $numbers = 0;
                @endphp
                @if($roomscount > 0 )
                    @for ($i = 0; $i < $roomscount; $i++)
                        <li data-bs-target="#carouselExampleDark" data-bs-slide-to="{{ $numbers }}" @if (!$active) class="active" @endif></li>
                        @php
                            $numbers++;
                            if($i == 0){
                                $active = true;
                            }
                        @endphp
                    @endfor
                @endif
                @if( $equipmentscount > 0)
                    @for ($i = 0; $i < $roomscount; $i++)
                        <li data-bs-target="#carouselExampleDark" data-bs-slide-to="{{ $numbers }}" @if (!$active) class="active" @endif></li>
                        @php
                            $numbers++;
                            if($i == 0){
                                $active = true;
                            }
                        @endphp
                    @endfor
                @endif
            </ol>
            <div class="carousel-inner">
                @php
                    $active = false;
                @endphp
                @if($roomscount > 0)
                    @foreach($rooms as $room)
                        <div class="carousel-item @if(!$active) active @endif">
                            <div class="row d-flex align-items-center">
                                <div class="col d-none d-lg-flex justify-content-center">
                                    <div class="">
                                        <h1 class="h1">{{$room->name}}</h1>
                                        <p class="pb-3">{!! Str::limit($room->description, 30, '...') !!}</p>
                                        <div class=""> <a class="btn btn-light btn-ecomm" href="{{route('view_room', $room->id)}}">View <i class='bx bx-chevron-right'></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <img src="{{$room->getFirstMediaUrl('gallery')}}" class="img-fluid carousel-image" alt="...">
                                </div>
                            </div>
                        </div>
                        @php
                            $active = true;
                        @endphp
                    @endforeach
                @endif
                @if($equipmentscount > 0)
                    @foreach($equipments as $equipment)
                        <div class="carousel-item @if(!$active) active @endif">
                            <div class="row d-flex align-items-center">
                                <div class="col d-none d-lg-flex justify-content-center">
                                    <div class="">
                                        <h1 class="h1">{{$equipment->name}}</h1>
                                        <p class="pb-3">{!! Str::limit($equipment->description, 30, '...') !!}</p>
                                        <div class=""> <a class="btn btn-light btn-ecomm" href="{{route('view_equipment', $equipment->id)}}">View <i class='bx bx-chevron-right'></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <img src="{{$equipment->getFirstMediaUrl('gallery')}}" class="img-fluid carousel-image" alt="...">
                                </div>
                            </div>
                        </div>
                        @php
                            $active = true;
                        @endphp
                    @endforeach
                @endif

            </div>
            <a class="carousel-control-prev" href="#carouselExampleDark" role="button" data-bs-slide="prev">	<span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleDark" role="button" data-bs-slide="next">	<span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </a>
        </div>
    </div>
</section>
<!--end slider section-->
<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <!--start information-->
{{--        <section class="py-3 border-top border-bottom">--}}
{{--            <div class="container">--}}
{{--                <div class="row row-cols-1 row-cols-lg-3 row-group align-items-center">--}}
{{--                    <div class="col p-3">--}}
{{--                        <div class="d-flex align-items-center">--}}
{{--                            <div class="fs-1 text-white">	<i class='bx bx-taxi'></i>--}}
{{--                            </div>--}}
{{--                            <div class="info-box-content ps-3">--}}
{{--                                <h6 class="mb-0">FREE SHIPPING &amp; RETURN</h6>--}}
{{--                                <p class="mb-0">Free shipping on all orders over $49</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col p-3">--}}
{{--                        <div class="d-flex align-items-center">--}}
{{--                            <div class="fs-1 text-white">	<i class='bx bx-dollar-circle'></i>--}}
{{--                            </div>--}}
{{--                            <div class="info-box-content ps-3">--}}
{{--                                <h6 class="mb-0">MONEY BACK GUARANTEE</h6>--}}
{{--                                <p class="mb-0">100% money back guarantee</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col p-3">--}}
{{--                        <div class="d-flex align-items-center">--}}
{{--                            <div class="fs-1 text-white">	<i class='bx bx-support'></i>--}}
{{--                            </div>--}}
{{--                            <div class="info-box-content ps-3">--}}
{{--                                <h6 class="mb-0">ONLINE SUPPORT 24/7</h6>--}}
{{--                                <p class="mb-0">Awesome Support for 24/7 Days</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <!--end row-->--}}
{{--            </div>--}}
{{--        </section>--}}
        <!--end information-->
        <!--start Featured product-->
        <section class="py-4">
            <div class="container">
                <div class="d-flex align-items-center">
                    <h5 class="text-uppercase mb-0">FEATURED</h5>
{{--                    <a href="javascript:;" class="btn btn-light ms-auto rounded-0">More <i class='bx bx-chevron-right'></i></a>--}}
                </div>
                <hr/>
                <div class="product-grid">
                    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4">
                        @foreach($rooms as $room)
                            @if($room->featured)
                                <div class="col">
                                    <div class="card rounded-0 product-card">
                                        @if ($room->hasMedia('gallery'))
                                            <div class="carousel slide" data-bs-ride="carousel" id="roomCrousel{{$room->id}}">
                                                <div class="carousel-indicators">
                                                    @foreach ($room->getMedia('gallery') as $media)
                                                        <li data-bs-target="#roomCrousel{{$room->id}}" data-bs-slide-to="{{ $loop->index }}" @if ($loop->first) class="active" @endif></li>
                                                    @endforeach
                                                </div>
                                                <div class="carousel-inner">
                                                    @foreach ($room->getMedia('gallery') as $media)
                                                        <div class="carousel-item @if ($loop->first) active @endif">
                                                            <img src="{{ $media->getUrl() }}" class="d-block w-100" alt="{{ $media->name }}">
                                                        </div>
                                                    @endforeach
                                                </div>
                                                <a class="carousel-control-prev" href="#roomCrousel{{$room->id}}" role="button" data-bs-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Previous</span>
                                                </a>
                                                <a class="carousel-control-next" href="#roomCrousel{{$room->id}}" role="button" data-bs-slide="next">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Next</span>
                                                </a>
                                            </div>
                                        @endif

                                        <div class="card-body">
                                            <div class="product-info">
                                                <a href="{{route('view_room', $room->id)}}">
                                                    <h6 class="product-name mb-2">{{$room->name}}</h6>
                                                </a>
                                                <div class="d-flex align-items-center">
                                                    @if($room->price_type == 'day')
                                                        <div class="mb-1 product-price"> per day
                                                            <span class="text-white fs-5">${{$room->price_daily}}</span>
                                                        </div>
                                                    @elseif($room->price_type == 'hour')
                                                        <div class="mb-1 product-price"> per hour
                                                            <span class="text-white fs-5">${{$room->price_hourly}}</span>
                                                        </div>
                                                    @elseif($room->price_type == 'both')
                                                        <div class="mb-1 product-price"> per day
                                                            <span class="text-white fs-5">${{$room->price_daily}}</span>
                                                        </div>
                                                        <div class="mb-1 product-price"> per hour
                                                            <span class="text-white fs-5">${{$room->price_hourly}}</span>
                                                        </div>
                                                    @endif

                                                    <div class="cursor-pointer ms-auto">	<i class="bx bxs-star text-white"></i>
                                                        <i class="bx bxs-star text-white"></i>
                                                        <i class="bx bxs-star text-white"></i>
                                                        <i class="bx bxs-star text-white"></i>
                                                        <i class="bx bxs-star text-white"></i>
                                                    </div>
                                                </div>
                                                <div class="product-action mt-2" style="visibility: visible; opacity: 1">
                                                    <div class="d-grid gap-2">
                                                        <button class="btn btn-white btn-ecomm rent-button" data-id="{{$room->id}}" data-price_type="{{$room->price_type}}" data-type="room"  data-special_request="{{$room->special_request}}"><i class="bx bxs-cart-add"></i>Rent</button>
                                                        <a href="{{route('view_room', $room->id)}}" type="button" class="btn btn-light btn-ecomm">
                                                            <i class='bx bxs-eye'></i>Detail
                                                        </a>
                                                        <a href="javascript:;" class="btn btn-link btn-ecomm" data-bs-toggle="modal" data-bs-target="#QuickViewRoom{{$room->id}}"><i class='bx bx-zoom-in'></i>Quick View</a>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal -->
                                <div class="modal fade" id="QuickViewRoom{{$room->id}}">
                                    <div class="modal-dialog modal-dialog-centered modal-xl modal-fullscreen-xl-down">
                                        <div class="modal-content bg-dark-4 rounded-0 border-0">
                                            <div class="modal-body">
                                                <button type="button" class="btn-close float-end" data-bs-dismiss="modal"></button>
                                                <div class="row g-0">
                                                    <div class="col-12 col-lg-6">
                                                        <div class="image-zoom-section">
                                                            <div class="product-gallery owl-carousel owl-theme border mb-3 p-3" data-slider-id="1">
                                                                @foreach ($room->getMedia('gallery') as $media)
                                                                    <div class="item">
                                                                        <img src="{{$media->getUrl()}}" class="img-fluid" alt="">
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                            <div class="owl-thumbs d-flex justify-content-center" data-slider-id="1">
                                                                @foreach ($room->getMedia('gallery') as $media)
                                                                    <button class="owl-thumb-item">
                                                                        <img src="{{$media->getUrl()}}" class="" alt="">
                                                                    </button>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg-6">
                                                        <div class="product-info-section p-3">
                                                            <h3 class="mt-3 mt-lg-0 mb-0">{{$room->name}}</h3>
                                                            <div class="product-rating d-flex align-items-center mt-2">
                                                                <div class="rates cursor-pointer font-13">	<i class="bx bxs-star text-warning"></i>
                                                                    <i class="bx bxs-star text-warning"></i>
                                                                    <i class="bx bxs-star text-warning"></i>
                                                                    <i class="bx bxs-star text-warning"></i>
                                                                    <i class="bx bxs-star text-warning"></i>
                                                                </div>
{{--                                                                <div class="ms-1">--}}
{{--                                                                    <p class="mb-0">(24 Ratings)</p>--}}
{{--                                                                </div>--}}
                                                            </div>
                                                            <div class="d-flex align-items-center mt-3 gap-2">
                                                                @if($room->price_type == 'day')
                                                                    <div class="mb-1 product-price"> per day
                                                                        <span class="text-white fs-5">${{$room->price_daily}}</span>
                                                                    </div>
                                                                @elseif($room->price_type == 'hour')
                                                                    <div class="mb-1 product-price"> per hour
                                                                        <span class="text-white fs-5">${{$room->price_hourly}}</span>
                                                                    </div>
                                                                @elseif($room->price_type == 'both')
                                                                    <div class="mb-1 product-price"> per day
                                                                        <span class="text-white fs-5">${{$room->price_daily}}</span>
                                                                    </div>
                                                                    <div class="mb-1 product-price"> per hour
                                                                        <span class="text-white fs-5">${{$room->price_hourly}}</span>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                            <dl class="row mt-3">
                                                                <dt class="col-sm-3">Dimension</dt> <dd class="col-sm-9">{{$room->dimension}}</dd>
                                                            </dl>
                                                            <div class="mt-3">
                                                                <h6>Description :</h6>
                                                                <p class="mb-0">{!! $room->description !!}</p>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end row-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end quick view product-->
                            @endif
                        @endforeach
                        @foreach($equipments as $equipment)
                            @if($equipment->featured)
                                <div class="col">
                                    <div class="card rounded-0 product-card">
                                        @if ($equipment->hasMedia('gallery'))
                                            <div class="carousel slide" data-bs-ride="carousel" id="equipmentCrousel{{$equipment->id}}">
                                                <div class="carousel-indicators">
                                                    @foreach ($equipment->getMedia('gallery') as $media)
                                                        <li data-bs-target="#equipmentCrousel{{$equipment->id}}" data-bs-slide-to="{{ $loop->index }}" @if ($loop->first) class="active" @endif></li>
                                                    @endforeach
                                                </div>
                                                <div class="carousel-inner">
                                                    @foreach ($equipment->getMedia('gallery') as $media)
                                                        <div class="carousel-item @if ($loop->first) active @endif">
                                                            <img src="{{ $media->getUrl() }}" class="d-block w-100" alt="{{ $media->name }}">
                                                        </div>
                                                    @endforeach
                                                </div>
                                                <a class="carousel-control-prev" href="#equipmentCrousel{{$equipment->id}}" role="button" data-bs-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Previous</span>
                                                </a>
                                                <a class="carousel-control-next" href="#equipmentCrousel{{$equipment->id}}" role="button" data-bs-slide="next">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Next</span>
                                                </a>
                                            </div>
                                        @endif

                                        <div class="card-body">
                                            <div class="product-info">
                                                <a href="javascript:;">
                                                    <p class="product-catergory font-13 mb-1">{{$equipment->category->name}}</p>
                                                </a>
                                                <a href="{{route('view_equipment', $equipment->id)}}">
                                                    <h6 class="product-name mb-2">{{$equipment->name}}</h6>
                                                </a>
                                                <div class="d-flex align-items-center">
                                                    <div class="mb-1 product-price">
                                                        @if($equipment->purchase_type == 'rent')
                                                            @if($equipment->price_type == 'day')
                                                                <div class="mb-1 product-price"> per day
                                                                    <span class="text-white fs-5">${{$equipment->price_daily}}</span>
                                                                </div>
                                                            @elseif($equipment->price_type == 'hour')
                                                                <div class="mb-1 product-price"> per hour
                                                                    <span class="text-white fs-5">${{$equipment->price_hourly}}</span>
                                                                </div>
                                                            @elseif($equipment->price_type == 'both')
                                                                <div class="mb-1 product-price"> per day
                                                                    <span class="text-white fs-5">${{$equipment->price_daily}}</span>
                                                                </div>
                                                                <div class="mb-1 product-price"> per hour
                                                                    <span class="text-white fs-5">${{$equipment->price_hourly}}</span>
                                                                </div>
                                                            @endif
                                                        @else
                                                            <h4 class="mb-0">${{$equipment->price_daily}}</h4>
                                                        @endif
                                                    </div>
                                                    <div class="cursor-pointer ms-auto">	<i class="bx bxs-star text-white"></i>
                                                        <i class="bx bxs-star text-white"></i>
                                                        <i class="bx bxs-star text-white"></i>
                                                        <i class="bx bxs-star text-white"></i>
                                                        <i class="bx bxs-star text-white"></i>
                                                    </div>
                                                </div>
                                                <div class="product-action mt-2" style="visibility: visible; opacity: 1">
                                                    <div class="d-grid gap-2">
                                                        @if($equipment->purchase_type == 'rent')
                                                            <button class="btn btn-white btn-ecomm rent-button" data-id="{{$equipment->id}}" data-quantity="{{$equipment->quantity}}" data-price_type="{{$equipment->price_type}}" data-type="equipment"><i class="bx bxs-cart-add"></i>Rent</button>
                                                        @else
                                                        <!-- Button trigger modal -->
                                                            <button type="button" class="btn btn-light btn-ecomm" data-bs-toggle="modal" data-bs-target="#exampleModal{{$equipment->id}}">
                                                                <i class='bx bxs-cart-add'></i>Buy
                                                            </button>

                                                        @endif
                                                            <a href="{{route('view_equipment', $equipment->id)}}" type="button" class="btn btn-light btn-ecomm">
                                                                <i class='bx bxs-eye'></i>Detail
                                                            </a>
                                                        <a href="javascript:;" class="btn btn-link btn-ecomm" data-bs-toggle="modal" data-bs-target="#QuickViewEquipment{{$equipment->id}}"><i class='bx bx-zoom-in'></i>Quick View</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal -->
                                <div class="modal fade" id="QuickViewEquipment{{$equipment->id}}">
                                    <div class="modal-dialog modal-dialog-centered modal-xl modal-fullscreen-xl-down">
                                        <div class="modal-content bg-dark-4 rounded-0 border-0">
                                            <div class="modal-body">
                                                <button type="button" class="btn-close float-end" data-bs-dismiss="modal"></button>
                                                <div class="row g-0">
                                                    <div class="col-12 col-lg-6">
                                                        <div class="image-zoom-section">
                                                            <div class="product-gallery owl-carousel owl-theme border mb-3 p-3" data-slider-id="1">
                                                                @foreach ($equipment->getMedia('gallery') as $media)
                                                                    <div class="item">
                                                                        <img src="{{$media->getUrl()}}" class="img-fluid" alt="">
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                            <div class="owl-thumbs d-flex justify-content-center" data-slider-id="1">
                                                                @foreach ($equipment->getMedia('gallery') as $media)
                                                                    <button class="owl-thumb-item">
                                                                        <img src="{{$media->getUrl()}}" class="" alt="">
                                                                    </button>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg-6">
                                                        <div class="product-info-section p-3">
                                                            <h3 class="mt-3 mt-lg-0 mb-0">{{$equipment->name}}</h3>
                                                            <div class="product-rating d-flex align-items-center mt-2">
                                                                <div class="rates cursor-pointer font-13">	<i class="bx bxs-star text-warning"></i>
                                                                    <i class="bx bxs-star text-warning"></i>
                                                                    <i class="bx bxs-star text-warning"></i>
                                                                    <i class="bx bxs-star text-warning"></i>
                                                                    <i class="bx bxs-star text-warning"></i>
                                                                </div>
                                                                {{--                                                                <div class="ms-1">--}}
                                                                {{--                                                                    <p class="mb-0">(24 Ratings)</p>--}}
                                                                {{--                                                                </div>--}}
                                                            </div>
                                                            <div class="d-flex align-items-center mt-3 gap-2">
                                                                @if($equipment->purchase_type == 'rent')
                                                                    @if($equipment->price_type == 'day')
                                                                        <div class="mb-1 product-price"> per day
                                                                            <span class="text-white fs-5">${{$equipment->price_daily}}</span>
                                                                        </div>
                                                                    @elseif($equipment->price_type == 'hour')
                                                                        <div class="mb-1 product-price"> per hour
                                                                            <span class="text-white fs-5">${{$equipment->price_hourly}}</span>
                                                                        </div>
                                                                    @elseif($equipment->price_type == 'both')
                                                                        <div class="mb-1 product-price"> per day
                                                                            <span class="text-white fs-5">${{$equipment->price_daily}}</span>
                                                                        </div>
                                                                        <div class="mb-1 product-price"> per hour
                                                                            <span class="text-white fs-5">${{$equipment->price_hourly}}</span>
                                                                        </div>
                                                                    @endif
                                                                @else
                                                                    <h4 class="mb-0">${{$equipment->price_daily}}</h4>
                                                                @endif
                                                            </div>
                                                            <dl class="row mt-3">
                                                                <dt class="col-sm-3">Purchase Type</dt> <dd class="col-sm-9">{{$equipment->purchase_type}}</dd>
                                                            </dl>
                                                            <div class="mt-3">
                                                                <h6>Description :</h6>
                                                                <p class="mb-0">{!! $equipment->description !!}</p>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end row-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end quick view product-->
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal{{$equipment->id}}" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Buy Equipment</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form action="{{route('equipment.buy')}}" method="POST">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <table class="table">
                                                            <tr>
                                                                <td>Name</td>
                                                                <td>{{$equipment->name}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Price</td>
                                                                <td>${{$equipment->price_daily}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Quantity</td>
                                                                <td><input type="number" class="form-control rounded-0" name="quantity" value="0" required></td>
                                                                <td><input type="hidden" class="form-control rounded-0" name="equipment_id" value="{{$equipment->id}}"></td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Add to Cart</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                            @endif
                        @endforeach
                    </div>
                    <!--end row-->
                </div>
            </div>
        </section>
        <!--end Featured product-->
        <!--start New Arrivals-->
        <section class="py-4">
            <div class="container">
                <div class="d-flex align-items-center">
                    <h5 class="text-uppercase mb-0">New Arrival</h5>
{{--                    <a href="javascript:;" class="btn btn-light ms-auto rounded-0">More <i class='bx bx-chevron-right'></i></a>--}}
                </div>
                <hr/>
                <div class="product-grid">
                    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4">
                        @foreach($rooms as $room)
                            @if($room->new_arrival)
                                <div class="col">
                                    <div class="card rounded-0 product-card">
                                        @if ($room->hasMedia('gallery'))
                                            <div class="carousel slide" data-bs-ride="carousel" id="roomCrousel{{$room->id}}">
                                                <div class="carousel-indicators">
                                                    @foreach ($room->getMedia('gallery') as $media)
                                                        <li data-bs-target="#roomCrousel{{$room->id}}" data-bs-slide-to="{{ $loop->index }}" @if ($loop->first) class="active" @endif></li>
                                                    @endforeach
                                                </div>
                                                <div class="carousel-inner">
                                                    @foreach ($room->getMedia('gallery') as $media)
                                                        <div class="carousel-item @if ($loop->first) active @endif">
                                                            <img src="{{ $media->getUrl() }}" class="d-block w-100" alt="{{ $media->name }}">
                                                        </div>
                                                    @endforeach
                                                </div>
                                                <a class="carousel-control-prev" href="#roomCrousel{{$room->id}}" role="button" data-bs-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Previous</span>
                                                </a>
                                                <a class="carousel-control-next" href="#roomCrousel{{$room->id}}" role="button" data-bs-slide="next">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Next</span>
                                                </a>
                                            </div>
                                        @endif

                                        <div class="card-body">
                                            <div class="product-info">
                                                <a href="{{route('view_room', $room->id)}}">
                                                    <h6 class="product-name mb-2">{{$room->name}}</h6>
                                                </a>
                                                <div class="d-flex align-items-center">
                                                    @if($room->price_type == 'day')
                                                        <div class="mb-1 product-price"> per day
                                                            <span class="text-white fs-5">${{$room->price_daily}}</span>
                                                        </div>
                                                    @elseif($room->price_type == 'hour')
                                                        <div class="mb-1 product-price"> per hour
                                                            <span class="text-white fs-5">${{$room->price_hourly}}</span>
                                                        </div>
                                                    @elseif($room->price_type == 'both')
                                                        <div class="mb-1 product-price"> per day
                                                            <span class="text-white fs-5">${{$room->price_daily}}</span>
                                                        </div>
                                                        <div class="mb-1 product-price"> per hour
                                                            <span class="text-white fs-5">${{$room->price_hourly}}</span>
                                                        </div>
                                                    @endif
                                                    <div class="cursor-pointer ms-auto">	<i class="bx bxs-star text-white"></i>
                                                        <i class="bx bxs-star text-white"></i>
                                                        <i class="bx bxs-star text-white"></i>
                                                        <i class="bx bxs-star text-white"></i>
                                                        <i class="bx bxs-star text-white"></i>
                                                    </div>
                                                </div>
                                                <div class="product-action mt-2" style="visibility: visible; opacity: 1">
                                                    <div class="d-grid gap-2">
                                                        <button class="btn btn-white btn-ecomm rent-button" data-id="{{$room->id}}" data-price_type="{{$room->price_type}}" data-type="room"  data-special_request="{{$room->special_request}}"><i class="bx bxs-cart-add"></i>Rent</button>
                                                        <a href="{{route('view_room', $room->id)}}" type="button" class="btn btn-light btn-ecomm">
                                                            <i class='bx bxs-eye'></i>Detail
                                                        </a>
                                                        <a href="javascript:;" class="btn btn-link btn-ecomm" data-bs-toggle="modal" data-bs-target="#QuickViewRoom{{$room->id}}"><i class='bx bx-zoom-in'></i>Quick View</a>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal -->
                                <div class="modal fade" id="QuickViewRoom{{$room->id}}">
                                    <div class="modal-dialog modal-dialog-centered modal-xl modal-fullscreen-xl-down">
                                        <div class="modal-content bg-dark-4 rounded-0 border-0">
                                            <div class="modal-body">
                                                <button type="button" class="btn-close float-end" data-bs-dismiss="modal"></button>
                                                <div class="row g-0">
                                                    <div class="col-12 col-lg-6">
                                                        <div class="image-zoom-section">
                                                            <div class="product-gallery owl-carousel owl-theme border mb-3 p-3" data-slider-id="1">
                                                                @foreach ($room->getMedia('gallery') as $media)
                                                                    <div class="item">
                                                                        <img src="{{$media->getUrl()}}" class="img-fluid" alt="">
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                            <div class="owl-thumbs d-flex justify-content-center" data-slider-id="1">
                                                                @foreach ($room->getMedia('gallery') as $media)
                                                                    <button class="owl-thumb-item">
                                                                        <img src="{{$media->getUrl()}}" class="" alt="">
                                                                    </button>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg-6">
                                                        <div class="product-info-section p-3">
                                                            <h3 class="mt-3 mt-lg-0 mb-0">{{$room->name}}</h3>
                                                            <div class="product-rating d-flex align-items-center mt-2">
                                                                <div class="rates cursor-pointer font-13">	<i class="bx bxs-star text-warning"></i>
                                                                    <i class="bx bxs-star text-warning"></i>
                                                                    <i class="bx bxs-star text-warning"></i>
                                                                    <i class="bx bxs-star text-warning"></i>
                                                                    <i class="bx bxs-star text-warning"></i>
                                                                </div>
                                                                {{--                                                                <div class="ms-1">--}}
                                                                {{--                                                                    <p class="mb-0">(24 Ratings)</p>--}}
                                                                {{--                                                                </div>--}}
                                                            </div>
                                                            <div class="d-flex align-items-center mt-3 gap-2">
                                                                @if($room->price_type == 'day')
                                                                    <div class="mb-1 product-price"> per day
                                                                        <span class="text-white fs-5">${{$room->price_daily}}</span>
                                                                    </div>
                                                                @elseif($room->price_type == 'hour')
                                                                    <div class="mb-1 product-price"> per hour
                                                                        <span class="text-white fs-5">${{$room->price_hourly}}</span>
                                                                    </div>
                                                                @elseif($room->price_type == 'both')
                                                                    <div class="mb-1 product-price"> per day
                                                                        <span class="text-white fs-5">${{$room->price_daily}}</span>
                                                                    </div>
                                                                    <div class="mb-1 product-price"> per hour
                                                                        <span class="text-white fs-5">${{$room->price_hourly}}</span>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                            <div class="row mt-3">
                                                                <dt class="col-sm-3">Dimension</dt> <dd class="col-sm-9">{{$room->dimension}}</dd>
                                                            </div>
                                                            <div class="mt-3">
                                                                <h6>Description :</h6>
                                                                <p class="mb-0">{!! $room->description !!}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end row-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end quick view product-->
                            @endif
                        @endforeach
                        @foreach($equipments as $equipment)
                            @if($equipment->new_arrival)
                                <div class="col">
                                    <div class="card rounded-0 product-card">
                                        @if ($equipment->hasMedia('gallery'))
                                            <div class="carousel slide" data-bs-ride="carousel" id="equipmentCrousel{{$equipment->id}}">
                                                <div class="carousel-indicators">
                                                    @foreach ($equipment->getMedia('gallery') as $media)
                                                        <li data-bs-target="#equipmentCrousel{{$equipment->id}}" data-bs-slide-to="{{ $loop->index }}" @if ($loop->first) class="active" @endif></li>
                                                    @endforeach
                                                </div>
                                                <div class="carousel-inner">
                                                    @foreach ($equipment->getMedia('gallery') as $media)
                                                        <div class="carousel-item @if ($loop->first) active @endif">
                                                            <img src="{{ $media->getUrl() }}" class="d-block w-100" alt="{{ $media->name }}">
                                                        </div>
                                                    @endforeach
                                                </div>
                                                <a class="carousel-control-prev" href="#equipmentCrousel{{$equipment->id}}" role="button" data-bs-slide="prev">
                                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Previous</span>
                                                </a>
                                                <a class="carousel-control-next" href="#equipmentCrousel{{$equipment->id}}" role="button" data-bs-slide="next">
                                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                    <span class="visually-hidden">Next</span>
                                                </a>
                                            </div>
                                        @endif

                                        <div class="card-body">
                                            <div class="product-info">
                                                <a href="javascript:;">
                                                    <p class="product-catergory font-13 mb-1">{{$equipment->category->name}}</p>
                                                </a>
                                                <a href="{{route('view_equipment', $equipment->id)}}">
                                                    <h6 class="product-name mb-2">{{$equipment->name}}</h6>
                                                </a>
                                                <div class="d-flex align-items-center">
                                                    <div class="mb-1 product-price">
                                                        @if($equipment->purchase_type == 'rent')
                                                            @if($equipment->price_type == 'day')
                                                                <div class="mb-1 product-price"> per day
                                                                    <span class="text-white fs-5">${{$equipment->price_daily}}</span>
                                                                </div>
                                                            @elseif($equipment->price_type == 'hour')
                                                                <div class="mb-1 product-price"> per hour
                                                                    <span class="text-white fs-5">${{$equipment->price_hourly}}</span>
                                                                </div>
                                                            @elseif($equipment->price_type == 'both')
                                                                <div class="mb-1 product-price"> per day
                                                                    <span class="text-white fs-5">${{$equipment->price_daily}}</span>
                                                                </div>
                                                                <div class="mb-1 product-price"> per hour
                                                                    <span class="text-white fs-5">${{$equipment->price_hourly}}</span>
                                                                </div>
                                                            @endif
                                                        @else
                                                            <h4 class="mb-0">${{$equipment->price_daily}}</h4>
                                                        @endif
                                                    </div>
                                                    <div class="cursor-pointer ms-auto">	<i class="bx bxs-star text-white"></i>
                                                        <i class="bx bxs-star text-white"></i>
                                                        <i class="bx bxs-star text-white"></i>
                                                        <i class="bx bxs-star text-white"></i>
                                                        <i class="bx bxs-star text-white"></i>
                                                    </div>
                                                </div>
                                                <div class="product-action mt-2" style="visibility: visible; opacity: 1">
                                                    <div class="d-grid gap-2">
                                                        @if($equipment->purchase_type == 'rent')
                                                            <button class="btn btn-white btn-ecomm rent-button" data-id="{{$equipment->id}}" data-quantity="{{$equipment->quantity}}" data-price_type="{{$equipment->price_type}}" data-type="equipment"><i class="bx bxs-cart-add"></i>Rent</button>
                                                        @else
                                                            <button type="button" class="btn btn-light btn-ecomm" data-bs-toggle="modal" data-bs-target="#exampleModal{{$equipment->id}}">
                                                                <i class='bx bxs-cart-add'></i>Buy
                                                            </button>
                                                        @endif
                                                        <a href="{{route('view_equipment', $equipment->id)}}" type="button" class="btn btn-light btn-ecomm">
                                                            <i class='bx bxs-eye'></i>Detail
                                                        </a>
                                                        <a href="javascript:;" class="btn btn-link btn-ecomm" data-bs-toggle="modal" data-bs-target="#QuickViewEquipment{{$equipment->id}}"><i class='bx bx-zoom-in'></i>Quick View</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal -->
                                <div class="modal fade" id="QuickViewEquipment{{$equipment->id}}">
                                    <div class="modal-dialog modal-dialog-centered modal-xl modal-fullscreen-xl-down">
                                        <div class="modal-content bg-dark-4 rounded-0 border-0">
                                            <div class="modal-body">
                                                <button type="button" class="btn-close float-end" data-bs-dismiss="modal"></button>
                                                <div class="row g-0">
                                                    <div class="col-12 col-lg-6">
                                                        <div class="image-zoom-section">
                                                            <div class="product-gallery owl-carousel owl-theme border mb-3 p-3" data-slider-id="1">
                                                                @foreach ($equipment->getMedia('gallery') as $media)
                                                                    <div class="item">
                                                                        <img src="{{$media->getUrl()}}" class="img-fluid" alt="">
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                            <div class="owl-thumbs d-flex justify-content-center" data-slider-id="1">
                                                                @foreach ($equipment->getMedia('gallery') as $media)
                                                                    <button class="owl-thumb-item">
                                                                        <img src="{{$media->getUrl()}}" class="" alt="">
                                                                    </button>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-lg-6">
                                                        <div class="product-info-section p-3">
                                                            <h3 class="mt-3 mt-lg-0 mb-0">{{$equipment->name}}</h3>
                                                            <div class="product-rating d-flex align-items-center mt-2">
                                                                <div class="rates cursor-pointer font-13">	<i class="bx bxs-star text-warning"></i>
                                                                    <i class="bx bxs-star text-warning"></i>
                                                                    <i class="bx bxs-star text-warning"></i>
                                                                    <i class="bx bxs-star text-warning"></i>
                                                                    <i class="bx bxs-star text-warning"></i>
                                                                </div>
                                                                {{--                                                                <div class="ms-1">--}}
                                                                {{--                                                                    <p class="mb-0">(24 Ratings)</p>--}}
                                                                {{--                                                                </div>--}}
                                                            </div>
                                                            <div class="d-flex align-items-center mt-3 gap-2">
                                                                @if($equipment->purchase_type == 'rent')
                                                                    @if($equipment->price_type == 'day')
                                                                        <div class="mb-1 product-price"> per day
                                                                            <span class="text-white fs-5">${{$equipment->price_daily}}</span>
                                                                        </div>
                                                                    @elseif($equipment->price_type == 'hour')
                                                                        <div class="mb-1 product-price"> per hour
                                                                            <span class="text-white fs-5">${{$equipment->price_hourly}}</span>
                                                                        </div>
                                                                    @elseif($equipment->price_type == 'both')
                                                                        <div class="mb-1 product-price"> per day
                                                                            <span class="text-white fs-5">${{$equipment->price_daily}}</span>
                                                                        </div>
                                                                        <div class="mb-1 product-price"> per hour
                                                                            <span class="text-white fs-5">${{$equipment->price_hourly}}</span>
                                                                        </div>
                                                                    @endif
                                                                @else
                                                                    <h4 class="mb-0">${{$equipment->price_daily}}</h4>
                                                                @endif
                                                            </div>
                                                            <div class="mt-3">
                                                                <h6>Description :</h6>
                                                                <p class="mb-0">{!! $equipment->description !!}</p>
                                                            </div>
                                                            <dl class="row mt-3">
                                                                <dt class="col-sm-3">Purchase Type</dt> <dd class="col-sm-9">{{$equipment->purchase_type}}</dd>
                                                            </dl>

                                                            <!--end row-->
                                                            <div class="d-flex gap-2 mt-3">
                                                                @if($equipment->purchase_type == 'rent')
                                                                    <button class="btn btn-white btn-ecomm rent-button" data-id="{{$equipment->id}}" data-quantity="{{$equipment->quantity}}" data-price_type="{{$equipment->price_type}}" data-type="equipment"><i class="bx bxs-cart-add"></i>Rent</button>
                                                                @else
                                                                    <a href="javascript:;" class="btn btn-light btn-ecomm">	<i class='bx bxs-cart-add'></i>Buy</a>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end row-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end quick view product-->
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal{{$equipment->id}}" tabindex="-1" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Buy Equipment</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <form action="{{route('equipment.buy')}}" method="POST">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <table class="table">
                                                            <tr>
                                                                <td>Name</td>
                                                                <td>{{$equipment->name}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Price</td>
                                                                <td>${{$equipment->price_daily}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Quantity</td>
                                                                <td><input type="number" class="form-control rounded-0" name="quantity" value="0" required></td>
                                                                <td><input type="hidden" class="form-control rounded-0" name="equipment_id" value="{{$equipment->id}}"></td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Add to Cart</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                            @endif
                        @endforeach
                    </div>
                    <!--end row-->
                </div>
            </div>
        </section>
        <!--end New Arrivals-->
        <!--start support info-->
{{--        <section class="py-4 bg-dark-1">--}}
{{--            <div class="container">--}}
{{--                <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4 row-group">--}}
{{--                    <div class="col">--}}
{{--                        <div class="text-center">--}}
{{--                            <div class="font-50 text-white">	<i class='bx bx-cart'></i>--}}
{{--                            </div>--}}
{{--                            <h2 class="fs-5 text-uppercase mb-0">Free delivery</h2>--}}
{{--                            <p class="text-capitalize">Free delivery over $199</p>--}}
{{--                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec vestibulum magna, et dapib.</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col">--}}
{{--                        <div class="text-center">--}}
{{--                            <div class="font-50 text-white">	<i class='bx bx-credit-card'></i>--}}
{{--                            </div>--}}
{{--                            <h2 class="fs-5 text-uppercase mb-0">Secure payment</h2>--}}
{{--                            <p class="text-capitalize">We possess SSL / Secure сertificate</p>--}}
{{--                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec vestibulum magna, et dapib.</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col">--}}
{{--                        <div class="text-center">--}}
{{--                            <div class="font-50 text-white">	<i class='bx bx-dollar-circle'></i>--}}
{{--                            </div>--}}
{{--                            <h2 class="fs-5 text-uppercase mb-0">Free returns</h2>--}}
{{--                            <p class="text-capitalize">We return money within 30 days</p>--}}
{{--                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec vestibulum magna, et dapib.</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col">--}}
{{--                        <div class="text-center">--}}
{{--                            <div class="font-50 text-white">	<i class='bx bx-support'></i>--}}
{{--                            </div>--}}
{{--                            <h2 class="fs-5 text-uppercase mb-0">Customer Support</h2>--}}
{{--                            <p class="text-capitalize">Friendly 24/7 customer support</p>--}}
{{--                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec vestibulum magna, et dapib.</p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <!--end row-->--}}
{{--            </div>--}}
{{--        </section>--}}
        <!--end support info-->
        <!--start bottom products section-->
        <section class="py-4 border-top">
            <div class="container">
                <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
                    <div class="col">
                        <div class="bestseller-list mb-3">
                            <h6 class="mb-3 text-uppercase">Best Selling</h6>
                            @foreach($rooms as $room)
                                @if($room->best_selling)
                                    <div class="d-flex align-items-center">
                                        <div class="bottom-product-img">
                                            <a href="{{route('view_room', $room->id)}}">
                                                <img src="{{$room->getFirstMediaUrl('gallery')}}" width="100" alt="">
                                            </a>
                                        </div>
                                        <div style="margin-left: 10px">
                                            <h6 class="mb-0 fw-light mb-1">{{$room->name}}</h6>
                                            <div class="rating font-12">	<i class="bx bxs-star text-white"></i>
                                                <i class="bx bxs-star text-white"></i>
                                                <i class="bx bxs-star text-white"></i>
                                                <i class="bx bxs-star text-white"></i>
                                                <i class="bx bxs-star text-white"></i>
                                            </div>
                                            <p class="mb-0 text-white">
                                                @if($room->price_type == 'day')
                                                        <strong>${{$room->price_daily}} per day</strong>
                                                @elseif($room->price_type == 'hour')
                                                    <strong>${{$room->price_hourly}} per hour</strong>
                                                @elseif($room->price_type == 'both')
                                                    <strong>${{$room->price_hourly}} per hour</strong>
                                                    <br>
                                                    <strong>${{$room->price_daily}} per day</strong>
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                    <hr/>
                                @endif
                            @endforeach
                            @foreach($equipments as $equipment)
                                @if($equipment->best_selling)
                                    <div class="d-flex align-items-center">
                                        <div class="bottom-product-img">
                                            <a href="{{route('view_equipment', $equipment->id)}}">
                                                <img src="{{$equipment->getFirstMediaUrl('gallery')}}" width="100" alt="">
                                            </a>
                                        </div>
                                        <div style="margin-left: 10px">
                                            <h6 class="mb-0 fw-light mb-1">{{$equipment->name}}</h6>
                                            <div class="rating font-12">	<i class="bx bxs-star text-white"></i>
                                                <i class="bx bxs-star text-white"></i>
                                                <i class="bx bxs-star text-white"></i>
                                                <i class="bx bxs-star text-white"></i>
                                                <i class="bx bxs-star text-white"></i>
                                            </div>
                                            <p class="mb-0 text-white">
                                                @if($equipment->purchase_type == 'rent')
                                                    @if($equipment->price_type == 'day')
                                                        <strong>${{$equipment->price_daily}} per day</strong>
                                                    @elseif($equipment->price_type == 'hour')
                                                        <strong>${{$equipment->price_hourly}} per hour</strong>
                                                    @elseif($equipment->price_type == 'both')
                                                        <strong>${{$equipment->price_hourly}} per hour</strong>
                                                        <br>
                                                        <strong>${{$equipment->price_daily}} per day</strong>
                                                    @endif
                                                @else
                                                    <strong>${{$equipment->price_daily}}</strong>
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                    <hr/>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="col">
                        <div class="bestseller-list mb-3">
                            <h6 class="mb-3 text-uppercase">Featured</h6>
                            @foreach($rooms as $room)
                                @if($room->featured)
                                    <div class="d-flex align-items-center">
                                        <div class="bottom-product-img">
                                            <a href="{{route('view_room', $room->id)}}">
                                                <img src="{{$room->getFirstMediaUrl('gallery')}}" width="100" alt="">
                                            </a>
                                        </div>
                                        <div style="margin-left: 10px">
                                            <h6 class="mb-0 fw-light mb-1">{{$room->name}}</h6>
                                            <div class="rating font-12">	<i class="bx bxs-star text-white"></i>
                                                <i class="bx bxs-star text-white"></i>
                                                <i class="bx bxs-star text-white"></i>
                                                <i class="bx bxs-star text-white"></i>
                                                <i class="bx bxs-star text-white"></i>
                                            </div>
                                            <p class="mb-0 text-white">
                                                @if($room->price_type == 'day')
                                                    <strong>${{$room->price_daily}} per day</strong>
                                                @elseif($room->price_type == 'hour')
                                                    <strong>${{$room->price_hourly}} per hour</strong>
                                                @elseif($room->price_type == 'both')
                                                    <strong>${{$room->price_hourly}} per hour</strong>
                                                    <br>
                                                    <strong>${{$room->price_daily}} per day</strong>
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                    <hr/>
                                @endif
                            @endforeach
                            @foreach($equipments as $equipment)
                                @if($equipment->featured)
                                    <div class="d-flex align-items-center">
                                        <div class="bottom-product-img">
                                            <a href="{{route('view_equipment', $equipment->id)}}">
                                                <img src="{{$equipment->getFirstMediaUrl('gallery')}}" width="100" alt="">
                                            </a>
                                        </div>
                                        <div style="margin-left: 10px">
                                            <h6 class="mb-0 fw-light mb-1">{{$equipment->name}}</h6>
                                            <div class="rating font-12">	<i class="bx bxs-star text-white"></i>
                                                <i class="bx bxs-star text-white"></i>
                                                <i class="bx bxs-star text-white"></i>
                                                <i class="bx bxs-star text-white"></i>
                                                <i class="bx bxs-star text-white"></i>
                                            </div>
                                            <p class="mb-0 text-white">
                                                @if($equipment->purchase_type == 'rent')
                                                    @if($equipment->price_type == 'day')
                                                        <strong>${{$equipment->price_daily}} per day</strong>
                                                    @elseif($equipment->price_type == 'hour')
                                                        <strong>${{$equipment->price_hourly}} per hour</strong>
                                                    @elseif($equipment->price_type == 'both')
                                                        <strong>${{$equipment->price_hourly}} per hour</strong>
                                                        <br>
                                                        <strong>${{$equipment->price_daily}} per day</strong>
                                                    @endif
                                                @else
                                                    <strong>${{$equipment->price_daily}}</strong>
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                    <hr/>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="col">
                        <div class="bestseller-list mb-3">
                            <h6 class="mb-3 text-uppercase">New arrivals</h6>
                            @foreach($rooms as $room)
                                @if($room->new_arrival)
                                    <div class="d-flex align-items-center">
                                        <div class="bottom-product-img">
                                            <a href="{{route('view_room', $room->id)}}">
                                                <img src="{{$room->getFirstMediaUrl('gallery')}}" width="100" alt="">
                                            </a>
                                        </div>
                                        <div style="margin-left: 10px">
                                            <h6 class="mb-0 fw-light mb-1">{{$room->name}}</h6>
                                            <div class="rating font-12">	<i class="bx bxs-star text-white"></i>
                                                <i class="bx bxs-star text-white"></i>
                                                <i class="bx bxs-star text-white"></i>
                                                <i class="bx bxs-star text-white"></i>
                                                <i class="bx bxs-star text-white"></i>
                                            </div>
                                            <p class="mb-0 text-white">
                                                @if($room->price_type == 'day')
                                                    <strong>${{$room->price_daily}} per day</strong>
                                                @elseif($room->price_type == 'hour')
                                                    <strong>${{$room->price_hourly}} per hour</strong>
                                                @elseif($room->price_type == 'both')
                                                    <strong>${{$room->price_hourly}} per hour</strong>
                                                    <br>
                                                    <strong>${{$room->price_daily}} per day</strong>
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                    <hr/>
                                @endif
                            @endforeach
                            @foreach($equipments as $equipment)
                                @if($equipment->new_arrival)
                                    <div class="d-flex align-items-center">
                                        <div class="bottom-product-img">
                                            <a href="{{route('view_equipment', $equipment->id)}}">
                                                <img src="{{$equipment->getFirstMediaUrl('gallery')}}" width="100" alt="">
                                            </a>
                                        </div>
                                        <div style="margin-left: 10px">
                                            <h6 class="mb-0 fw-light mb-1">{{$equipment->name}}</h6>
                                            <div class="rating font-12">	<i class="bx bxs-star text-white"></i>
                                                <i class="bx bxs-star text-white"></i>
                                                <i class="bx bxs-star text-white"></i>
                                                <i class="bx bxs-star text-white"></i>
                                                <i class="bx bxs-star text-white"></i>
                                            </div>
                                            <p class="mb-0 text-white">
                                                @if($equipment->purchase_type == 'rent')
                                                    @if($equipment->price_type == 'day')
                                                        <strong>${{$equipment->price_daily}} per day</strong>
                                                    @elseif($equipment->price_type == 'hour')
                                                        <strong>${{$equipment->price_hourly}} per hour</strong>
                                                    @elseif($equipment->price_type == 'both')
                                                        <strong>${{$equipment->price_hourly}} per hour</strong>
                                                        <br>
                                                        <strong>${{$equipment->price_daily}} per day</strong>
                                                    @endif
                                                @else
                                                    <strong>${{$equipment->price_daily}}</strong>
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                    <hr/>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="col">
                        <div class="bestseller-list mb-3">
                            <h6 class="mb-3 text-uppercase">Top rated</h6>
                            @foreach($rooms as $room)
                                @if($room->top_rated)
                                    <div class="d-flex align-items-center">
                                        <div class="bottom-product-img">
                                            <a href="{{route('view_room', $room->id)}}">
                                                <img src="{{$room->getFirstMediaUrl('gallery')}}" width="100" alt="">
                                            </a>
                                        </div>
                                        <div style="margin-left: 10px">
                                            <h6 class="mb-0 fw-light mb-1">{{$room->name}}</h6>
                                            <div class="rating font-12">	<i class="bx bxs-star text-white"></i>
                                                <i class="bx bxs-star text-white"></i>
                                                <i class="bx bxs-star text-white"></i>
                                                <i class="bx bxs-star text-white"></i>
                                                <i class="bx bxs-star text-white"></i>
                                            </div>
                                            <p class="mb-0 text-white">
                                                @if($room->price_type == 'day')
                                                    <strong>${{$room->price_daily}} per day</strong>
                                                @elseif($room->price_type == 'hour')
                                                    <strong>${{$room->price_hourly}} per hour</strong>
                                                @elseif($room->price_type == 'both')
                                                    <strong>${{$room->price_hourly}} per hour</strong>
                                                    <br>
                                                    <strong>${{$room->price_daily}} per day</strong>
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                    <hr/>
                                @endif
                            @endforeach
                            @foreach($equipments as $equipment)
                                @if($equipment->top_rated)
                                    <div class="d-flex align-items-center">
                                        <div class="bottom-product-img">
                                            <a href="{{route('view_equipment', $equipment->id)}}">
                                                <img src="{{$equipment->getFirstMediaUrl('gallery')}}" width="100" alt="">
                                            </a>
                                        </div>
                                        <div style="margin-left: 10px">
                                            <h6 class="mb-0 fw-light mb-1">{{$equipment->name}}</h6>
                                            <div class="rating font-12">	<i class="bx bxs-star text-white"></i>
                                                <i class="bx bxs-star text-white"></i>
                                                <i class="bx bxs-star text-white"></i>
                                                <i class="bx bxs-star text-white"></i>
                                                <i class="bx bxs-star text-white"></i>
                                            </div>
                                            <p class="mb-0 text-white">
                                                @if($equipment->purchase_type == 'rent')
                                                    @if($equipment->price_type == 'day')
                                                        <strong>${{$equipment->price_daily}} per day</strong>
                                                    @elseif($equipment->price_type == 'hour')
                                                        <strong>${{$equipment->price_hourly}} per hour</strong>
                                                    @elseif($equipment->price_type == 'both')
                                                        <strong>${{$equipment->price_hourly}} per hour</strong>
                                                        <br>
                                                        <strong>${{$equipment->price_daily}} per day</strong>
                                                    @endif
                                                @else
                                                    <strong>${{$equipment->price_daily}}</strong>
                                                @endif
                                            </p>
                                        </div>
                                    </div>
                                    <hr/>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                <!--end row-->
            </div>
        </section>
        <!--end bottom products section-->
    </div>
</div>
<!--end page wrapper -->
<!--start footer section-->
@endsection