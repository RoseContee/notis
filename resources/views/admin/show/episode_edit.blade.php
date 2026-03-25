@extends('layouts.backend')

@section('content')
    <div class="nk-content">
        <div class="container-fluid">
            <div class="nk-block nk-block-lg">
                <div class="nk-block-between mb-2">
                    <div class="nk-block-head-content">
                        <h3 class="nk-block-title page-title">Edit Episode</h3>
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
                        <form method="POST" action="{{ route('episode.update', $episode->id) }}" id="form" enctype="multipart/form-data" >
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="form-label" for="title">Episode Title</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control" id="title" name="title" value="{{$episode->title}}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="form-label" for="title">Episode Referer Contribute Video</label>
                                        <div class="form-control-wrap">
                                            <select class="form-select" id="contribute_id" name="contribute_id">
                                                <option value="-1" @if($episode->contribute_id == -1) selected @endif>No use</option>
                                                @foreach($contributes as $contribute)
                                                <option value="{{$contribute->id}}" @if($episode->contribute_id == $contribute->id) selected @endif>{{$contribute->id}}/{{$contribute->title}}/{{$contribute->user->email}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="form-label" for="date_sort">Date Sort</label>
                                        <div class="form-control-wrap">
                                            <input type="datetime-local" class="form-control" name="date_sort" id="date_sort" value="{{date('Y-m-d\TH:i', strtotime($episode->date_sort))}}"  required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col">
                                    <div class="form-group">
                                        <label class="form-label" for="duration">Duration</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control" id="duration" name="duration" value="{{$episode->duration}}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label class="form-label" for="trailer">Trailer</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control" id="trailer" name="trailer" value="{{$episode->trailer}}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label class="form-label" for="season_id">Season</label>
                                        <div class="form-control-wrap">
                                            <select class="form-select" id="season_id" name="season_id" data-placeholder="Select Season" required>
                                                @foreach ($seasons as $season)
                                                    <option value="{{$season->id}}" @if($season->id == $episode->season_id) selected @endif>{{$season->title}} | {{$season->show->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="form-label" for="top_scroll">Status</label>
                                        <div class="col-lg-4">
                                            <div class="row form-control-wrap">
                                                <div class="col-lg-6">
                                                    <div class="form-check">
                                                        <input type="radio" class="form-check-input" value="1" name="status"  {{ ($episode->status==1)? "checked" : "" }}> Active
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-check">
                                                        <input type="radio" class="form-check-input" value="0" name="status"  {{ ($episode->status==0)? "checked" : "" }}>  Inactive
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="form-label" for="adult">Episode for Adults?</label>
                                        <div class="col-lg-4">
                                            <div class="row form-control-wrap">
                                                <div class="col-lg-6">
                                                    <div class="form-check">
                                                        <input type="radio" class="form-check-input" value="1" name="adult"  {{ ($episode->adult==1)? "checked" : "" }}> Yes
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-check">
                                                        <input type="radio" class="form-check-input" value="0" name="adult"  {{ ($episode->adult==0)? "checked" : "" }}>  No
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
                                            <textarea name="description" rows="10" style="width: 100%; padding: 15px">{{$episode->description}}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-6 form-group">
                                    <label class="form-label" for="thumbnail">Episode Thumbnail (1290 X 1290)</label>
                                    <div class="form-control-wrap">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="thumbnail" name="thumbnail">
                                            <label class="custom-file-label" for="icon">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 form-group">
                                    <img src="{{$episode->getFirstMediaUrl('thumbnail')}}" height="100" width="100" alt="" style="border-radius: 20px">
                                </div>
                                <div class="col-6 form-group">
                                    <label class="form-label" for="poster">Episode Poster (1920 X 1080)</label>
                                    <div class="form-control-wrap">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="poster" name="poster">
                                            <label class="custom-file-label" for="icon">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 form-group">
                                    <img src="{{$episode->getFirstMediaUrl('poster')}}" height="100" width="100" alt="" style="border-radius: 20px">
                                </div>
                                <div class="col form-group">
                                    <label class="form-label" for="episode_file_type">Episode File Type</label>
                                    <div class="form-control-wrap">
                                        <select class="form-select" id="episode_file_type" name="episode_file_type">
                                            <option value="local" @if($episode->episode_file_type == 'local') selected @endif>Local File</option>
                                            <option value="link" @if($episode->episode_file_type == 'link') selected @endif>Local Link</option>
                                            <option value="external_link" @if($episode->episode_file_type == 'external_link') selected @endif>External Link</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col form-group @if($episode->episode_file_type != 'local') d-none @endif" id="episode_file">
                                    <label class="form-label" for="episode">Episode File</label>
                                    <div class="form-control-wrap">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="episode" name="episode">
                                            <label class="custom-file-label" for="icon">Choose file</label>
                                            @if($episode->getFirstMediaUrl('episode'))
                                            <a target="_blank" href="{{$episode->getFirstMediaUrl('episode')}}">Episode video</a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col form-group @if($episode->episode_file_type == 'local') d-none @endif" id="episode_link_id">
                                    <label class="form-label" for="episode_link">Episode Link</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" id="episode_link" name="episode_link" value="{{$episode->episode_link}}">
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
                var episodeExist = false;
                @if($episode->getFirstMediaUrl('episode'))
                episodeExist = true;
                @endif

                if($('#episode_file_type').val() == 'local') {
                    $('#episode_link').attr('required', null);
                    if(!episodeExist)
                        $('#episode').attr('required', 'required');
                } else {
                    $('#episode_link').attr('required', 'required');
                    $('#episode').attr('required', null);
                }
                $('#episode_file_type').on('change', function(){
                    if ($(this).val() == 'local' ) {
                        $('#episode_file').removeClass('d-none');
                        $('#episode_link_id').addClass('d-none');
                        $('#episode_link').attr('required', null);
                        if(!episodeExist)
                            $('#episode').attr('required', 'required');
                    } else {
                        $('#episode').val(null);
                        $('#episode_file').addClass('d-none');
                        $('#episode_link_id').removeClass('d-none');
                        $('#episode_link').attr('required', 'required');
                        $('#episode').attr('required', null);
                    }
                })
            </script>
@endsection