@extends('layouts.front')
@section('content')
    <form action="{{route('networks')}}" method="GET" class="mt-7">
        <div class="row gy-3 gx-0 px-4">
            <div class="col-6">
                <div class="row gy-1 gx-4 align-items-center">
                    <div class="col-12 col-sm">
                        <input class="form-control" type="text" id="name" name="name" value="" required placeholder="Search Network Name">
                    </div>
                </div>
            </div>
        </div>
    </form>
    @foreach($network_list as $data)
    <div class="flq-swiper-wrapper my-7" data-sr="new-releases" data-sr-interval="100" data-sr-duration="1000" data-sr-distance="10">
        <div class="container mb-5 d-inline-flex" data-sr-item="new-releases">
            <img src="{{$data['network']->getFirstMediaUrl('logo')}}" alt="" style="width: 40px;height: 40px;border-radius: 100%;">
            <h2 class="ms-2">{{$data['network']->name}}</h2>
        </div>
        <div class="swiper flq-swiper-effect-touch" data-sr-item=new-releases data-buttons=true data-pagination-custom=true data-gap=30 data-speed=800 data-touch-ratio=0.8 data-slides=1, data-breakpoints=636:2,1072:3,1280:4>
            <div class="swiper-container container">
                <div class="swiper-wrapper">
                    @foreach($data['movies'] as $movie)
                        <div class="swiper-slide">
                            <div class="card flq-card-blog">
                                <div class="card-img-wrap">
                                    <a href="{{route('movie', $movie->id)}}">
                                                <span class="flq-image flq-rounded-xl flq-responsive flq-responsive-sm-3x4">
                                                    <img src="{{$movie->getFirstMediaUrl('thumbnail')}}" alt="">
                                                </span>
                                    </a>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title"><a href="{{route('movie', $movie->id)}}">{{$movie->title}}</a></h5>
                                    <div class="flq-meta flq-meta-sm">
                                        <ul>
                                            <li>
                                                <a href="" class="card-year">{{$movie->year}}</a>
                                            </li>
                                            @foreach($movie->genres as $genre)
                                                <li>
                                                    <a href="#" class="card-category">{{$genre->name}}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="container mt-5">
            <div class="row align-items-center justify-content-between gx-5">
                <div class="col-auto" data-sr-item="new-releases">
                    <div class="flq-swiper-pagination-custom"></div>
                </div>
                <div class="col d-none d-sm-block" data-sr-item="new-releases">
                    <hr />
                </div>
                <div class="col-auto" data-sr-item="new-releases">
                    <div class="
            flq-swiper-button-prev
            btn btn-sm btn-dark btn-active btn-square btn-icon-sm
            me-1
          " data-sr-item="related">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M15 18L9 12L15 6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </div>
                    <div class="
            flq-swiper-button-next
            btn btn-sm btn-dark btn-active btn-square btn-icon-sm
          " data-sr-item="related">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9 6L15 12L9 18" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
@endsection