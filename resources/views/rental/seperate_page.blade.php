@extends('layouts.rental')
@section('content')

    <!--start slider section-->
    <section class="slider-section">
        <div class="first-slider">
            <div id="carouselExampleDark" class="carousel slide" data-bs-ride="carousel">
                <ol class="carousel-indicators">
                    @php
                        $active = true;
                        $numbers = 0;
                    @endphp
                    @foreach ($equipment->getMedia('gallery') as $media)
                        <li data-bs-target="#carouselExampleDark" data-bs-slide-to="{{ $numbers }}" @if ($active) class="active" @endif></li>
                        @php
                            $active = false;
                            $numbers++;
                        @endphp
                    @endforeach
                </ol>
                <div class="carousel-inner">
                    @php
                        $active = true;
                    @endphp
                    @foreach ($equipment->getMedia('gallery') as $media)
                        <div class="carousel-item @if($active) active @endif">
                            <div class="row d-flex align-items-center">
                                <div class="col d-none d-lg-flex justify-content-center">
                                    <div class="">
                                        <h1 class="h1">{{$equipment->name}}</h1>
                                        <p class="pb-3">{!! Str::limit($equipment->description, 30, '...') !!}</p>
                                        <div class="">
                                            <button class="btn btn-white btn-ecomm rent-button" data-id="{{$equipment->id}}" data-quantity="{{$equipment->quantity}}" data-price_type="{{$equipment->price_type}}" data-type="equipment"><i class="bx bxs-cart-add"></i>Rent</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <img src="{{$media->getUrl()}}" class="img-fluid carousel-image" alt="...">
                                </div>
                            </div>
                        </div>
                        @php
                            $active = false;
                        @endphp
                    @endforeach

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
@endsection