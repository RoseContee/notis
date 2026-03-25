@extends('layouts.front')

@section('content')

    <div class="flq-background py-7">
        <div class="flq-background-ticker">
            <div class="flq-image-ticker mb-3" data-gap=20 data-pixels-per-second=20>
                <div class="flq-image-ticker-inner">
                    @foreach($movies as $movie)
                    <div class="flq-image-ticker-item">
                            <span class="flq-image">
                                <img src="{{$movie->getFirstMediaUrl('thumbnail')}}" alt="">
                            </span>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
        <div class="flq-background-overlay" style="background-color: hsla(var(--flq-color-black), 0.8);"></div>
        <div class="container text-center" data-sr="banner-text" data-sr-interval="100" data-sr-distance="10" data-sr-duration="1000">
            <h1 class="display-5 mb-1" data-sr-item="banner-text">{{ $media_category->name }}</h1>
            <nav aria-label="breadcrumb" data-sr-item="banner-text">
                <ol class="breadcrumb flq-color-opacity">
                    <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $media_category->name }}</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="content-wrap">
        <div class="py-7">
            <div class="container flq-isotope">
                <nav>
                    <ul class="nav nav-tabs flq-isotope-options justify-content-center text-center mb-5" data-sr="movie-options" data-sr-interval="80" data-sr-duration="1000" data-sr-distance="10">
                        <li class="nav-item" data-sr-item="movie-options">
                            <a href="#" data-filter="all" class="nav-link active"><span class="nav-link-name">All</span></a>
                        </li>
                        @foreach($genres as $genre)
                            <li class="nav-item" data-sr-item="movie-options">
                                <a href="#" data-filter=".{{$genre->name}}" class="nav-link"><span class="nav-link-name">{{$genre->name}}</span></a>
                            </li>
                        @endforeach
                    </ul>
                </nav>
                <div class="row gy-4 justify-content-center flq-isotope-grid" data-isotope-layout="fitRows" data-sr="movies-item" data-sr-interval="80" data-sr-duration="1000" data-sr-distance="10">

                    @foreach($movies as $movie)
                        @php
                            $movie_genres = $movie->genres->pluck('name')->toArray();
                        @endphp
                        <div class="col-12 col-lg-6 col-xl-4 flq-isotope-item {{ implode(' ', array_map(function ($genre) { return $genre; }, $movie_genres)) }}">
                            <div data-sr-item="movies-item">
                                <a href="{{route('movie', $movie->id)}}" class="card flq-card-movie flq-color-opacity">
                        <span class="card-img-wrap">
                            <span class="flq-image flq-responsive flq-responsive-lg-1x1">
                                <img src="{{$movie->getFirstMediaUrl('thumbnail')}}" alt="">
                            </span>
                        </span>
                                    <span class="card-body">
                            <span class="card-title h5">{{$movie->title}}</span>
                            <span class="card-description">
                                <span>{{$movie->description}}</span>
                            </span>
                        </span>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
{{--                <nav class="text-center mt-5">--}}
{{--                    <ul class="pagination" data-sr="pagination" data-sr-interval="80" data-sr-duration="1000" data-sr-distance="10">--}}
{{--                        <li class="page-item" data-sr-item="pagination">--}}
{{--                            <a class="page-link page-link-prev" href="#"> Prev <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
{{--                                    <path d="M15 18L9 12L15 6" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />--}}
{{--                                </svg>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li class="page-item active" data-sr-item="pagination">--}}
{{--                            <a class="page-link" href="#">1</a>--}}
{{--                        </li>--}}
{{--                        <li class="page-item" data-sr-item="pagination">--}}
{{--                            <a class="page-link" href="#">2</a>--}}
{{--                        </li>--}}
{{--                        <li class="page-item" data-sr-item="pagination">--}}
{{--                            <a class="page-link" href="#">3</a>--}}
{{--                        </li>--}}
{{--                        <li class="page-item" data-sr-item="pagination">--}}
{{--                            <a class="page-link page-link-next" href="#"> Next <svg width="18" height="18" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
{{--                                    <path d="M9 6L15 12L9 18" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />--}}
{{--                                </svg>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </nav>--}}
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script>
        $(document).ready(function() {
            var $grid = $('.flq-isotope-grid').isotope({
                itemSelector: '.flq-isotope-item',
                layoutMode: 'fitRows'
            });

            $('.flq-isotope-options').on('click', 'a', function(event) {
                event.preventDefault();
                var filterValue = $(this).attr('data-filter');
                if (filterValue === 'all') {
                    filterValue = '*';
                }
                $grid.isotope({ filter: filterValue });

                $('.flq-isotope-options a').removeClass('active');
                $(this).addClass('active');
            });
        });
    </script>
@endsection