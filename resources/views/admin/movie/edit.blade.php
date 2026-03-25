@extends('layouts.backend')

@section('content')
    <div class="nk-content">
        <div class="container-fluid">
            <div class="nk-block nk-block-lg">
                <div class="nk-block-between mb-2">
                    <div class="nk-block-head-content">
                        <h3 class="nk-block-title page-title">Edit {{ $movie->media_category->name }}</h3>
                    </div><!-- .nk-block-head-content -->
                    <div class="nk-block-head-content">
                        <div class="toggle-wrap nk-block-tools-toggle">
                            <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                            <div class="toggle-expand-content" data-content="pageMenu">
                            </div>
                        </div>
                    </div><!-- .nk-block-head-content -->
                </div><!-- .nk-block-between -->
                <div class="card">
                    <div class="card-inner">
                        <form method="POST" action="{{ route('movie.update', $movie->id) }}" id="form" enctype="multipart/form-data" >
                            @csrf
                            @method('PUT')
                            <div class="row form-group">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="form-label" for="title">Movie Title</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control" id="title" name="title" value="{{$movie->title}}" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="title">Movie Referer Contribute Video</label>
                                        <div class="form-control-wrap">
                                            <select class="form-select" id="contribute_id" name="contribute_id">
                                                <option value="-1" @if($movie->contribute_id == -1) selected @endif>No use</option>
                                                @foreach($contributes as $contribute)
                                                <option value="{{$contribute->id}}" @if($movie->contribute_id == $contribute->id) selected @endif>{{$contribute->email}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col">
                                            <div class="form-group">
                                                <label class="form-label" for="year">Year</label>
                                                <div class="form-control-wrap">
                                                    <input type="number" class="form-control" id="year" name="year" value="{{$movie->year}}" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label class="form-label" for="duration">Duration</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" id="duration" name="duration" value="{{$movie->duration}}" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="form-label" for="genres">Genres</label>
                                        <div class="form-control-wrap">
                                            <select class="form-select" id="genres" name="genres[]" multiple data-placeholder="Select Genres" required>
                                                @foreach ($genres as $genre)
                                                    <option value="{{$genre->id}}" @if(in_array($genre->id, $movie->genres()->pluck('genres.id')->toArray())) selected @endif>{{$genre->name}}</option>
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
                                                <option value="paid" @if($movie->access == 'paid') selected @endif>Paid</option>
                                                <option value="free" @if($movie->access == 'free') selected @endif>Free</option>
                                                <option value="single" @if($movie->access == 'single') selected @endif>Single Payment</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="duration">Trailer Link</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control" id="trailer" name="trailer" value="{{$movie->trailer}}" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="trailer_video">Trailer Video File</label>
                                        <div class="form-control-wrap">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="trailer_video" name="trailer_video" >
                                                <label class="custom-file-label" for="icon">Choose file</label>
                                                <a target="_blank" href="{{$movie->getFirstMediaUrl('trailer_video')}}">Trailer video</a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label" for="date_sort">Date Sort</label>
                                        <div class="form-control-wrap">
                                            <input type="datetime-local" class="form-control" name="date_sort" id="date_sort" value="{{date('Y-m-d\TH:i', strtotime($movie->date_sort))}}"  required>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="row form-group">
                                <div class="col-6 form-group">
                                    <div class="form-group">
                                        <label class="form-label" for="top_scroll">Status</label>
                                        <div class="col-lg-4">
                                            <div class="row form-control-wrap">
                                                <div class="col-lg-6">
                                                    <div class="form-check">
                                                        <input type="radio" class="form-check-input" value="1" name="status"  {{ ($movie->status==1)? "checked" : "" }}> Active
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-check">
                                                        <input type="radio" class="form-check-input" value="0" name="status"  {{ ($movie->status==0)? "checked" : "" }}>  Inactive
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 form-group d-none">
                                    <label class="form-label" for="number_of_video_ads">Number of Video Ads to show at start of Movie</label>
                                    <div class="form-control-wrap">
                                        <input type="number" class="form-control" id="number_of_video_ads" name="number_of_video_ads" value="{{$movie->number_of_video_ads}}" >
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="form-label" for="adult">Movie for Adults?</label>
                                        <div class="col-lg-4">
                                            <div class="row form-control-wrap">
                                                <div class="col-lg-6">
                                                    <div class="form-check">
                                                        <input type="radio" class="form-check-input" value="1" name="adult"  {{ ($movie->adult==1)? "checked" : "" }}> Yes
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-check">
                                                        <input type="radio" class="form-check-input" value="0" name="adult"  {{ ($movie->adult==0)? "checked" : "" }}>  No
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label" for="duration">Description</label>
                                        <div class="form-control-wrap">
                                            <textarea name="description" rows="10" style="width: 100%; padding: 15px">{{$movie->description}}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-6 form-group">
                                    <label class="form-label" for="thumbnail">Movie Thumbnail (1290 X 1290)</label>
                                    <div class="form-control-wrap">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="thumbnail" name="thumbnail" >
                                            <label class="custom-file-label" for="icon">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 form-group">
                                    <img src="{{$movie->getFirstMediaUrl('thumbnail')}}" height="100" width="100" alt="" style="border-radius: 20px">
                                </div>
                                <div class="col-6 form-group">
                                    <label class="form-label" for="poster">Movie Poster (1920 X 1080)</label>
                                    <div class="form-control-wrap">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="poster" name="poster" >
                                            <label class="custom-file-label" for="icon">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 form-group">
                                    <img src="{{$movie->getFirstMediaUrl('poster')}}" height="100" width="100" alt="" style="border-radius: 20px">
                                </div>
                                <div class="col form-group">
                                    <label class="form-label" for="movie_file_type">Movie File Type</label>
                                    <div class="form-control-wrap">
                                        <select class="form-select" id="movie_file_type" name="movie_file_type">
                                            <option value="local" @if($movie->movie_file_type == 'local') selected @endif>Local File</option>
                                            <option value="link" @if($movie->movie_file_type == 'link') selected @endif>Local Link</option>
                                            <option value="external_link" @if($movie->movie_file_type == 'external_link') selected @endif>External Link</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col form-group @if($movie->movie_file_type != 'local') d-none @endif" id="movie_file">
                                    <label class="form-label" for="movie">Movie File</label>
                                    <div class="form-control-wrap">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="movie" name="movie">
                                            <label class="custom-file-label" for="icon">Choose file</label>
                                            @if($movie->getFirstMediaUrl('movie'))
                                            <a target="_blank" href="{{$movie->getFirstMediaUrl('movie')}}">Movie video</a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col form-group @if($movie->movie_file_type == 'local') d-none @endif" id="movie_link_id">
                                    <label class="form-label" for="movie_link">Movie Link</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" id="movie_link" name="movie_link" value="{{$movie->movie_link}}">
                                    </div>
                                </div>
                            </div>

                            <hr>
                            <h2>Home page Settings</h2>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="form-label" for="top_scroll">Top Scroll</label>
                                        <div class="col-lg-4">
                                            <div class="row form-control-wrap">
                                                <div class="col-lg-6">
                                                    <div class="form-check">
                                                        <input type="radio" class="form-check-input" value="1" name="top_scroll"  {{ ($movie->top_scroll==1)? "checked" : "" }}> Active
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-check">
                                                        <input type="radio" class="form-check-input" value="0" name="top_scroll"  {{ ($movie->top_scroll==0)? "checked" : "" }}>  Inactive
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 form-group">
                                    <label class="form-label" for="top_scroll_poster">Top Scroll Poster (3840 X 2160)</label>
                                    <div class="form-control-wrap">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="top_scroll_poster" name="top_scroll_poster">
                                            <label class="custom-file-label" for="icon">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="form-label" for="new_release">New Releases</label>
                                        <div class="col-lg-4">
                                            <div class="row form-control-wrap">
                                                <div class="col-lg-6">
                                                    <div class="form-check">
                                                        <input type="radio" class="form-check-input" value="1" name="new_release"  {{ ($movie->new_release==1)? "checked" : "" }}> Active
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-check">
                                                        <input type="radio" class="form-check-input" value="0" name="new_release"  {{ ($movie->new_release==0)? "checked" : "" }}>  Inactive
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="form-label" for="upcoming">Upcoming Movies</label>
                                        <div class="col-lg-4">
                                            <div class="row form-control-wrap">
                                                <div class="col-lg-6">
                                                    <div class="form-check">
                                                        <input type="radio" class="form-check-input" value="1" name="upcoming"  {{ ($movie->upcoming==1)? "checked" : "" }}> Active
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-check">
                                                        <input type="radio" class="form-check-input" value="0" name="upcoming"  {{ ($movie->upcoming==0)? "checked" : "" }}>  Inactive
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary float-right">Submit</button>

                        </form>
                    </div>
                </div><!-- card -->

            </div>
        </div>

@endsection
@section('script')
            <script>
                var movieExist = false;
                @if($movie->getFirstMediaUrl('movie'))
                movieExist = true;
                @endif
                if($('#movie_file_type').val() == 'local') {
                    $('#movie_link').attr('required', null);
                    if(!movieExist)
                        $('#movie').attr('required', 'required');
                } else {
                    $('#movie_link').attr('required', 'required');
                    $('#movie').attr('required', null);
                }
                $('#movie_file_type').on('change', function(){
                    if ($(this).val() == 'local' ) {
                        $('#movie_file').removeClass('d-none');
                        $('#movie_link_id').addClass('d-none');
                        $('#movie_link').attr('required', null);
                        if(!movieExist)
                            $('#movie').attr('required', 'required');
                    } else {
                        $('#movie').val(null);
                        $('#movie_file').addClass('d-none');
                        $('#movie_link_id').removeClass('d-none');
                        $('#movie_link').attr('required', 'required');
                        $('#movie').attr('required', null);
                    }
                })
            </script>
@endsection