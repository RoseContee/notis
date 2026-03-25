@extends('layouts.rental')
@section('content')

    <section class="py-4">
        <div class="container">
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
                        <div class="mt-3">
                            <button class="btn btn-white btn-ecomm rent-button" data-id="{{$room->id}}" data-price_type="{{$room->price_type}}" data-type="room"  data-special_request="{{$room->special_request}}"><i class="bx bxs-cart-add"></i>Rent</button>
                        </div>
                    </div>
                </div>
            </div>
            <!--end row-->
        </div>
    </section>
@endsection