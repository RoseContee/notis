@extends('layouts.backend')

@section('content')
    <div class="nk-content">
        <div class="container-fluid">
            <div class="nk-block nk-block-lg">
                <div class="nk-block-between mb-2">
                    <div class="nk-block-head-content">
                        <h3 class="nk-block-title page-title">Add {{ $media_category->name }}</h3>
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

                        <form method="POST" action="{{ route('movie.store') }}" id="form" enctype="multipart/form-data" >
                            @csrf
                            <input type="hidden" name="media_category_id" value="{{ $media_category->id }}">
                            <div class="row form-group">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="form-label" for="title">Movie Title</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="title">Movie Referer Contribute Video</label>
                                        <div class="form-control-wrap">
                                            <select class="form-select" id="contribute_id" name="contribute_id">
                                                <option value="-1" @if(old('contribute_id') == -1) selected @endif>No use</option>
                                                @foreach($contributes as $contribute)
                                                <option @if(old('contribute_id') == $contribute->id) selected @endif value="{{$contribute->id}}">{{$contribute->email}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col">
                                            <div class="form-group">
                                                <label class="form-label" for="year">Year</label>
                                                <div class="form-control-wrap">
                                                    <input type="number" class="form-control" id="year" name="year" value="{{ old('year') }}" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label class="form-label" for="duration">Duration</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" id="duration" name="duration" value="{{ old('duration') }}" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="genres">Genres</label>
                                        <div class="form-control-wrap">
                                            @php
                                                $arr = [];
                                                if(old('genres') != null)
                                                    $arr = old('genres');
                                            @endphp
                                            <select class="form-select" id="genres" name="genres[]" multiple data-placeholder="Select Genres" required>
                                                
                                                @foreach ($genres as $genre)
                                                    
                                                    <option value="{{$genre->id}}"  @if((count($arr) > 0 && $arr[0] == $genre->id) || array_search($genre->id, $arr) != null) selected @endif>{{$genre->name}}</option>
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
                                                <option value="paid" @if(old('access') == 'paid') selected @endif>Paid</option>
                                                <option value="free" @if(old('access') == 'free') selected @endif>free</option>
                                                <option value="single" @if(old('access') == 'single') selected @endif>Single Payment</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="duration">Trailer Link</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control" id="trailer" name="trailer" value="{{ old('trailer') }}" required>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label" for="trailer_video">Trailer Video File</label>
                                        <div class="form-control-wrap">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="trailer_video" name="trailer_video" required>
                                                <label class="custom-file-label" for="icon">Choose file</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label" for="date_sort">Date Sort</label>
                                        <div class="form-control-wrap">
                                            <input type="datetime-local" class="form-control" name="date_sort" id="date_sort" value="{{ old('date_sort') }}"  required>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="row form-group">

{{--                                <div class="col-6 form-group">--}}
{{--                                    <label class="form-label" for="number_of_video_ads">Number of Video Ads to show at start of Movie</label>--}}
{{--                                    <div class="form-control-wrap">--}}
{{--                                        <input type="number" class="form-control" id="number_of_video_ads" name="number_of_video_ads" value="1" required>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                                <div class="col-6 form-group">
                                    <label class="form-label" for="adult">Movie for Adults?</label>
                                    <div class="col-lg-4">
                                        <div class="row form-control-wrap">
                                            <div class="col-lg-6">
                                                <div class="form-check">
                                                    <input type="radio" class="form-check-input" value="1" name="adult" required @if(old('adult') == '1') checked @endif> Yes
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-check">
                                                    <input type="radio" class="form-check-input" value="0" name="adult" required @if(old('adult') == '0') checked @endif>  No
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col form-group">
                                    <label class="form-label" for="duration">Description</label>
                                    <div class="form-control-wrap">
                                        <textarea name="description" rows="10" style="width: 100%; padding: 15px" value="{{ old('description') }}"></textarea>
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
                                            <option value="local" @if(old('movie_file_type') == 'local') selected @endif>Local File</option>
                                            <option value="link" @if(old('movie_file_type') == 'link') selected @endif>Local Link</option>
                                            <option value="external_link" @if(old('movie_file_type') == 'external_link') selected @endif>External Link</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col form-group @if(old('movie_file_type') && old('movie_file_type') != 'local') d-none @endif" id="movie_file">
                                    <label class="form-label" for="movie">Movie File</label>
                                    <div class="form-control-wrap">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="movie" name="movie">
                                            <label class="custom-file-label" for="icon">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col form-group @if(!old('movie_file_type') || old('movie_file_type') == 'local') d-none @endif" id="movie_link_id">
                                    <label class="form-label" for="movie_link">Movie Link</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" id="movie_link" name="movie_link" value="{{ old('movie_link') }}">
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
                if($('#movie_file_type').val() == 'local') {
                    $('#movie').attr('required', 'required');
                    $('#movie_link').attr('required', null);
                } else {
                    $('#movie').attr('required', null);
                    $('#movie_link').attr('required', 'required');
                }
                $('#movie_file_type').on('change', function(){
                    if ($(this).val() == 'local') {
                        $('#movie_file').removeClass('d-none');
                        $('#movie_link_id').addClass('d-none');
                        $('#movie').attr('required', 'required');
                        $('#movie_link').attr('required', null);
                    } else {
                        $('#movie').val(null);
                        $('#movie_file').addClass('d-none');
                        $('#movie_link_id').removeClass('d-none');
                        $('#movie').attr('required', null);
                        $('#movie_link').attr('required', 'required');
                    }
                })
            </script>
@endsection