@extends('layouts.backend')

@section('content')

    <div class="nk-content">
        <div class="container-fluid">
            <div class="nk-block nk-block-lg">
                <div class="nk-block-between mb-2">
                    <div class="nk-block-head-content">
                        <h3 class="nk-block-title page-title">Add Advertisement</h3>
                    </div>
                    <div>
                        (<span>Name: {{ Auth::user()->name }}</span>,
                        <span>Email: {{ Auth::user()->email }}</span>,
                        <span style="color: red;">Balance: ${{ Auth::user()->balance }}</span>)
                    </div>
                    <!-- .nk-block-head-content -->
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

                        <form method="POST" action="{{ route('advertisement.store') }}" id="form" enctype="multipart/form-data" >
                            @csrf
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="form-label" for="name">Name</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="form-label" for="type">Advertisement Type</label>
                                        <div class="form-control-wrap">
                                            <select class="form-select ad-type" id="type" name="type" value="{{ old('type') }}">
                                                <option value="image">Image (price per view: ${{ $ad_image_price }})</option>
                                                <option value="video">Video</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label" for="file">Advertisement File (Image or Video)</label>
                                        <div class="form-control-wrap">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="file" name="file" required>
                                                <label class="custom-file-label" for="icon">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>    
                                <div class="col-4 ad-video d-none">
                                    <div class="form-group">
                                        <label class="form-label" for="use_target">Use Specific Target
                                        </label>
                                        <div class="form-control-wrap">
                                            <select class="form-select" id="use_target" name="use_target" value="{{ old('use_target') }}">
                                                <option value="0">No</option>
                                                <option value="1">Yes</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>                                     
                                <div class="col-4 ad-video d-none">
                                    <div class="form-group ad-cost">
                                        <label class="form-label" for="ad_cost">Select Ad Cost/Length
                                        </label>
                                        <div class="form-control-wrap">
                                            <select class="form-select" id="ad_cost" name="ad_length" value="{{ old('ad_length') }}">
                                                @foreach($ad_length as $key => $length)
                                                <option value="{{ $key }}">${{ $ad_price[$key] }} / {{ $length }}s</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group ad-specific-cost d-none">
                                        <label class="form-label" for="ad_specific_cost">Select Specific Ad Cost/Length
                                        </label>
                                        <div class="form-control-wrap">
                                            <select class="form-select" id="ad_specific_cost" name="ad_length_spec" value="{{ old('ad_length_spec') }}">
                                                @foreach($ad_length as $key => $length)
                                                <option value="{{ $key }}">${{ $ad_special_price[$key] }} / {{ $length }}s</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4 ad-video d-none">
                                    <div class="form-group target-url d-none">
                                        <label class="form-label" for="target_url">Target URL</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control" id="target_url" name="target_url" value="{{ old('target_url') }}">
                                        </div>
                                    </div>
                                </div>
                                @can('publish_advertisement')
                                <div class="col-4">
                                    <div class="form-group">
                                        <label class="form-label" for="movies_type">Include or Exclude
                                            <span class="nk-menu-icon" title="-Include: If include is selected then in next option you have to select the movies in which you want to include this addvertisement.
-Exclude: If exclude is selected then in next option you have to select the movies in which you want to exclude this advertisement.
-If nothing is selected then this advertisement will show in all Movies and Episodes."><em class="icon ni ni-info"></em></span>
                                        </label>
                                        <div class="form-control-wrap">
                                            <select class="form-select" id="movies_type" name="movies_type">
                                                <option value=" " selected disabled>Include or Exclude</option>
                                                <option value="include">Include</option>
                                                <option value="exclude">Exclude</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-8">
                                    <div class="form-group">
                                        <label class="form-label" for="movies">Select Movies</label>
                                        <div class="form-control-wrap">
                                            <select class="form-select" id="movies" name="movies[]" multiple="multiple" data-placeholder="Select Movies" >
                                                @foreach ($movies as $movie)
                                                    <option value="{{$movie->id}}">{{$movie->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label class="form-label" for="season">Select Show</label>
                                        <div class="form-control-wrap">
                                            <select class="form-select" id="show" name="show" data-placeholder="Select Show" >
                                                <option value="-1">Select Show</option>
                                                @foreach ($shows as $show)
                                                    <option value="{{$show->id}}">{{$show->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4 d-none" id="season_select">
                                    <div class="form-group">
                                        <label class="form-label" for="season">Select Season</label>
                                        <div class="form-control-wrap">
                                            <select class="form-select" id="season" name="season" data-placeholder="Select Season" >
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4 d-none" id="episode_select">
                                    <div class="form-group">
                                        <label class="form-label" for="episodes">Select Episodes</label>
                                        <div class="form-control-wrap">
                                            <select class="form-select" id="episodes" name="episodes[]" multiple="multiple" data-placeholder="Select Episodes" >
                                            </select>
                                        </div>
                                    </div>
                                </div>                                
                                <div class="col-12">
                                    <div class="form-group w-25">
                                        <label class="form-label" for="status">Status</label>
                                        <div class="form-control-wrap">
                                            <select class="form-select" id="status" name="status" required>
                                                <option value="0" selected>Ready</option>
                                                <option value="1">Active</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                @endcan
                                <!-- <div class="col-6">
                                    <div class="form-group">
                                        <label class="form-label" for="ppv">Amount Per View in USD (PPV)</label>
                                        <div class="form-control-wrap">
                                            <input type="number" class="form-control" id="ppv" name="ppv" step="0.01" value="0" required>
                                        </div>
                                    </div>
                                </div> -->
                            </div>
                            <button type="submit" class="mt-2 btn btn-primary float-right">Submit</button>
                        </form>
                    </div>
                </div><!-- card -->

            </div>
        </div>
@endsection

@section('script')
    <script>
        $( document ).ready(function() {

            if($('.ad-type').val() == 'video') {
                $('.ad-video').removeClass('d-none');
            }

            if($('#use_target').val() == '1') {
                $('.ad-cost').toggleClass('d-none');
                $('.target-url').toggleClass('d-none');
                $('.ad-specific-cost').toggleClass('d-none');
                $('#target_url').attr('required', 'required');
            }

            $('.ad-type').change(function(e) {
                if(e.target.value == 'image') {
                    $('.ad-video').toggleClass('d-none');
                }
                else
                    $('.ad-video').toggleClass('d-none');
            })

            $('#use_target').change(function(e) {
                if(parseInt(e.target.value))
                {
                    $('.ad-cost').toggleClass('d-none');
                    $('.target-url').toggleClass('d-none');
                    $('.ad-specific-cost').toggleClass('d-none');
                    $('#target_url').attr('required', 'required');
                }
                else {
                    $('.ad-cost').toggleClass('d-none');
                    $('.target-url').toggleClass('d-none');
                    $('.ad-specific-cost').toggleClass('d-none');
                    $('#target_url').attr('required', null);
                }
            })

            @can('publish_advertisement')
            $('#show').change(function(e) {
                var id = e.target.value;
                if(id != -1) {
                    $.ajax({
                        type:'GET',
                        url:"{{ route('advertisement.seasons_by_show') }}",
                        data:{id:id},
                        success:function(data) {
                            var option = '<option value="-1">Select Season</option>';
                            for(var i = 0; i < data.length; i++) {
                                option += '<option value="'+data[i]['id']+'">'+data[i]['title']+'</option>';
                            }
                            $('#season').html(option);
                            NioApp.Select2('#season');
                            $('#episodes').html('');
                            NioApp.Select2('#episodes');
                        }
                    });
                    $('#season_select').removeClass('d-none');
                    $('#episode_select').removeClass('d-none');
                }
                else {
                    $('#season_select').addClass('d-none');
                    $('#episode_select').addClass('d-none');
                }
            })

            $('#season').change(function(e) {
                var id = e.target.value;
                if(id != -1) {
                    $.ajax({
                        type:'GET',
                        url:"{{ route('advertisement.episodes_by_season') }}",
                        data:{id:id},
                        success:function(data) {
                            var option = '';
                            for(var i = 0; i < data.length; i++) {
                                option += '<option value="'+data[i]['id']+'">'+data[i]['title']+'</option>';
                            }
                            $('#episodes').html(option);
                            NioApp.Select2('#episodes');
                        }
                    });
                }
                else {
                    $('#episodes').html('');
                    NioApp.Select2('#episodes');
                }
            })
            @endcan
        });
    </script>
@endsection