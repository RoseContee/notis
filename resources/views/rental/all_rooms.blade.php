@extends('layouts.rental')
@section('content')

    <section class="py-4">
        <div class="container">
            <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
                @foreach($rooms as $room)
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
                @endforeach
            </div>
            <!--end row-->
        </div>
    </section>
@endsection