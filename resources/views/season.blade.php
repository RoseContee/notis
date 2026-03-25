@extends('layouts.front')
@section('content')
    <div class="py-7 min-vh-100 flq-background d-flex align-items-center">
        <div class="flq-background-image">
                <span class="flq-image jarallax" data-speed=0.7>
                    <img src="{{$season->getFirstMediaUrl('poster')}}" class="jarallax-img" alt="">
                </span>
        </div>
        <div class="flq-background-overlay" style="background-color: hsla(var(--flq-color-black), 0.8);"></div>
        <div class="container pt-navbar" data-sr="movie" data-sr-interval="70" data-sr-duration="1200" data-sr-distance="10">
            <h2 style="text-align: center !important;">{{$season->title}}</h2>
            <div class="swiper flq-swiper-effect-touch" data-sr-item=new-releases data-buttons=true data-pagination-custom=true data-gap=30 data-speed=800 data-touch-ratio=0.8 data-slides=1, data-breakpoints=636:2,1072:3,1280:4>
                <div class="swiper-container container">
                    <div class="swiper-wrapper">
                        @foreach($season->episodes()->where('status', 1)->get() as $episode)
                            <div class="swiper-slide">
                                <div class="card flq-card-blog">
                                    <div class="card-img-wrap">
                                        <a href="{{route('watch_episode', $episode->id)}}">
                                                    <span class="flq-image flq-rounded-xl flq-responsive flq-responsive-sm-3x4">
                                                        <img src="{{$episode->getFirstMediaUrl('thumbnail')}}" alt="">
                                                    </span>
                                            {{--                                            <span class="card-badge badge badge-dark badge-glass flq-color-white">8.4</span>--}}
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title"><a href="{{route('watch_episode', $episode->id)}}">{{$episode->title}}</a></h5>
                                        <div class="flq-meta flq-meta-sm">
                                            <ul>
                                                <li>
                                                    <a href="" class="card-year">{{$episode->duration}}</a>
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
    <div class="content-wrap">
        <div class="py-7">
            <div class="container-small flq-vertical-rhythm">
                <div class="card flq-card-image flq-card-trailer">
                    <a href="{{$season->trailer}}" class="card-image" data-fancybox>
                            <span class="flq-image flq-responsive">
                                <img src="{{$season->getFirstMediaUrl('thumbnail')}}" alt="">
                            </span>
                        <svg width="42" height="42" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M8 19L19 12L8 5V19Z" fill="currentColor" />
                        </svg>
                    </a>
                    <div class="card-body">
                        <a href="{{$season->trailer}}" class="btn btn-icon-sm" data-fancybox>
                            <span class="btn-name">Trailer</span>
                            <span class="btn-icon">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M8 19L19 12L8 5V19Z" fill="currentColor" />
                                    </svg>
                                </span>
                        </a>
                        {{--                        <span class="badge badge-black badge-glass flq-color-title">3:09</span>--}}
                    </div>
                </div>
                <table class="table">
                    <tbody>
                    <tr>
                        <td class="flq-color-meta">Production year</td>
                        <td>{{$season->year}}</td>
                    </tr>
                    {{--                    <tr>--}}
                    {{--                        <td class="flq-color-meta">Country</td>--}}
                    {{--                        <td>USA</td>--}}
                    {{--                    </tr>--}}

                    <tr>
                        <td class="flq-color-meta">Episodes</td>
                        <td>{{$season->episodes->count()}} Episodes</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection