@extends('layouts.front')

@section('content')

    <div class="content-wrap mt-5">
        <div class="container pt-5 pb-7">
            <div class="row gy-6 gx-6">
                <div class="col-12 col-xl order-5">
                    <div class="row gx-0 gy-4" data-sr="account-review" data-sr-delay="300" data-sr-interval="100" data-sr-duration="1000" data-sr-distance="10">
                        <div class="col mt-5">
                            @if(count($user->movies) <= 0)
                                <h2 class="h5 mb-2 d-inline-block">No Movies Available</h2>
                            @endif
                                <button class="btn btn-xs btn-primary float-end" data-fancybox data-src="#flq_popup_add_movie" data-base-class="flq-fancybox-signin" data-animation-duration="1000" data-keyboard="false" data-auto-focus="false" data-touch="false" data-close-existing="true" data-small-btn="false" data-toolbar="false"> Add Movie</button>
                        </div>
                        @foreach($user->movies as $movie)
                            <div class="col-12" data-sr-item="account-review">
                                <div class="flq-account-comment flq-vertical-rhythm">
                                    <div class="flq-media mb-0">
                                        <a href="{{route('watch_movie', $movie->id)}}" class="flq-media-image">
                                                <span class="flq-image">
                                                    <img src="{{$movie->getFirstMediaUrl('thumbnail')}}" alt="">
                                                </span>
                                        </a>
                                        <div class="flq-media-meta">
                                            <h5 class="flq-media-title">
                                                <a href="{{route('watch_movie', $movie->id)}}">{{$movie->title}}</a>
                                            </h5>
                                            <div class="flq-meta">
                                                <ul>
                                                    <li>{{$movie->year}}</li>
                                                    <li>{{$movie->duration}}</li>
                                                </ul>
                                            </div>
                                        </div>
                                        @if($movie->status == 0)
                                            <span class="text-secondary">Pending Approval</span>
                                        @else
                                            <span class="text-success">Published</span>
                                        @endif

                                    </div>
                                    <p>{{$movie->description}}</p>
                                    <hr class="my-0">
                                    <p><strong>Date Submitted: {{$movie->created_at}}</strong></p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                @include('includes.profile-sidebar')
            </div>
        </div>
    </div>

    <div class="flq-fancybox-content-signin fancybox-content" id="flq_popup_add_movie">
        <div class="flq-signin">
            <div class="flq-fancybox-head">
                <div class="container-fluid">
                    <a href="{{url('/')}}" class="flq-fancybox-brand me-auto">
                        <img src="{{url('/')}}/front/assets/images/logo.svg" class="flq-logo" alt="">
                    </a>
                    <button class="flq-fancybox-close btn btn-link ms-4" data-fancybox-close>
                        <span></span>
                    </button>
                </div>
            </div>
            <div class="flq-fancybox-body pb-6">
                <form action="{{ route('movie.store') }}" method="POST" class="flq-signin-content w-75" enctype="multipart/form-data">
                    @csrf
                    <h4 class="mb-4 pb-1 text-center">Add Movie</h4>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label class="form-label" for="title">Movie Title</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" id="title" name="title" required>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col">
                                    <div class="form-group">
                                        <label class="form-label" for="year">Year</label>
                                        <div class="form-control-wrap">
                                            <input type="number" class="form-control" id="year" name="year" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label class="form-label" for="duration">Duration</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control" id="duration" name="duration" required>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="form-label" for="genres">Genres</label>
                                <div class="form-control-wrap">
                                    <select class="form-select" id="genres" name="genres[]" multiple="multiple" data-placeholder="Select Genres" required>
                                        @foreach ($genres as $genre)
                                            <option value="{{$genre->id}}">{{$genre->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="form-label" for="title">Movie Access</label>
                                <div class="form-control-wrap">
                                    <select class="form-select" id="access" name="access">
                                        <option value="paid" selected>Paid</option>
                                        <option value="free">Free</option>
                                        <option value="single">Single Payment</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="duration">Trailer Link</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" id="trailer" name="trailer" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="date_sort">Date Sort</label>
                                <div class="form-control-wrap">
                                    <input type="datetime-local" class="form-control" name="date_sort" id="date_sort"  required>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col form-group">
                            <label class="form-label" for="duration">Description</label>
                            <div class="form-control-wrap">
                                <textarea name="description" rows="10" style="width: 100%; padding: 15px"></textarea>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-6 form-group">
                            <label class="form-label" for="thumbnail">Movie Thumbnail (1290 X 1290)</label>
                            <div class="form-control-wrap">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="thumbnail" name="thumbnail" required>
                                    <label class="custom-file-label" for="icon">Choose file</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 form-group">
                            <label class="form-label" for="poster">Movie Poster (1920 X 1080)</label>
                            <div class="form-control-wrap">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="poster" name="poster" required>
                                    <label class="custom-file-label" for="icon">Choose file</label>
                                </div>
                            </div>
                        </div>
                        <div class="col form-group">
                            <label class="form-label" for="movie_file_type">Movie File Type</label>
                            <div class="form-control-wrap">
                                <select class="form-select" id="movie_file_type" name="movie_file_type">
                                    <option value="local" selected>Local File</option>
                                    <option value="link">External Link</option>
                                </select>
                            </div>
                        </div>
                        <div class="col form-group" id="movie_file">
                            <label class="form-label" for="movie">Movie File</label>
                            <div class="form-control-wrap">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="movie" name="movie">
                                    <label class="custom-file-label" for="icon">Choose file</label>
                                </div>
                            </div>
                        </div>
                        <div class="col form-group d-none" id="movie_link_id">
                            <label class="form-label" for="movie_link">Movie Link</label>
                            <div class="form-control-wrap">
                                <input type="text" class="form-control" id="movie_link" name="movie_link" >
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary float-right">Submit</button>
                </form>
            </div>
        </div>
    </div>


@endsection

@section('script')

    <script>
        $('#movie_file_type').on('change', function(){
            console.log('aaa')
            if ($(this).val() == 'local' ) {
                $('#movie_file').removeClass('d-none');
                $('#movie_link_id').addClass('d-none');
            }

            if ($(this).val() == 'link' ) {
                $('#movie_file').addClass('d-none');
                $('#movie_link_id').removeClass('d-none');
            }
        })
    </script>
@endsection