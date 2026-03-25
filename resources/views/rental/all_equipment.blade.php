@extends('layouts.rental')
@section('content')

    <section class="py-4">
        <div class="container">
            <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
                @foreach($equipments as $equipment)
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
                                                    <div class="image-container">
                                                        <img src="{{ $media->getUrl() }}" class="d-block w-100" alt="{{ $media->name }}">
                                                    </div>
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
                @endforeach
            </div>
            <!--end row-->
        </div>
    </section>
@endsection