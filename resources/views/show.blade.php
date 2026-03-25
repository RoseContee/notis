@extends('layouts.front')
@section('content')
<div class="py-7 min-vh-100 flq-background d-flex align-items-center">
    <div class="flq-background-image">
                <span class="flq-image jarallax" data-speed=0.7>
                    <img src="{{$show->getFirstMediaUrl('poster')}}" class="jarallax-img" alt="">
                </span>
    </div>
    <div class="flq-background-overlay" style="background-color: hsla(var(--flq-color-black), 0.8);"></div>
    <div class="container pt-navbar" data-sr="movie" data-sr-interval="70" data-sr-duration="1200" data-sr-distance="10">
        <h2 style="text-align: center !important;">{{$show->title}}</h2>

        <div class="swiper flq-swiper-effect-touch" data-sr-item=new-releases data-buttons=true data-pagination-custom=true data-gap=30 data-speed=800 data-touch-ratio=0.8 data-slides=1, data-breakpoints=636:2,1072:3,1280:4>
            <div class="swiper-container container">
                <div class="swiper-wrapper">
                    @foreach($show->seasons()->where('status', 1)->get() as $season)
                        <div class="swiper-slide">
                            <div class="card flq-card-blog">
                                <div class="card-img-wrap">
                                    <a href="{{route('season', $season->id)}}">
                                                    <span class="flq-image flq-rounded-xl flq-responsive flq-responsive-sm-3x4">
                                                        <img src="{{$season->getFirstMediaUrl('thumbnail')}}" alt="">
                                                    </span>
                                        {{--                                            <span class="card-badge badge badge-dark badge-glass flq-color-white">8.4</span>--}}
                                    </a>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title"><a href="{{route('season', $season->id)}}">{{$season->title}}</a></h5>
                                    <div class="flq-meta flq-meta-sm">
                                        <ul>
                                            <li>
                                                <a href="" class="card-year">{{$season->year}}</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>


@endsection