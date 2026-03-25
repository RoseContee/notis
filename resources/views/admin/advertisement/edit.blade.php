@extends('layouts.backend')
@section('content')

    <div class="nk-content">
        <div class="container-fluid">
            <div class="nk-block nk-block-lg">
                <div class="nk-block-between mb-2">
                    <div class="nk-block-head-content">
                        <h3 class="nk-block-title page-title">Edit Advertisement</h3>
                    </div>
                    @if($advertisement->user_id == Auth::user()->id)
                    <div>
                        (<span>Name: {{ Auth::user()->name }}</span>,
                        <span>Email: {{ Auth::user()->email }}</span>,
                        <span style="color: red;">Balance: ${{ Auth::user()->balance }}</span>)
                    </div>
                    @endif
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

                        <form method="POST" action="{{ route('advertisement.update', $advertisement->id) }}" id="form" enctype="multipart/form-data" >
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-6">


                                    <div class="form-group">
                                        <label class="form-label" for="name">Name</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control" id="name" name="name" value="{{$advertisement->name}}" required @if(!($advertisement->status == 0 || Auth::user()->can('publish_advertisement'))) disabled @endif>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="form-label" for="type">Advertisement Type</label>
                                        <div class="form-control-wrap">
                                            <select class="form-select ad-type" id="type" name="type" disabled>
                                                <option value="image" @if($advertisement->type == 'image') selected @endif>Image (price per view: ${{ $ad_image_price }})</option>
                                                <option value="video" @if($advertisement->type == 'video') selected @endif>Video</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label" for="file">Advertisement File (Image or Video)</label>
                                        <div class="form-control-wrap">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="file" name="file" @if($advertisement->status != 0) disabled @endif>
                                                <label class="custom-file-label" for="icon">Choose file</label>
                                            </div>
                                        </div>
                                        <a href="{{$advertisement->getFirstMediaUrl('file')}}" target="_blank">Ads File</a>
                                    </div>
                                </div>
                                <div class="col-4 ad-video  @if($advertisement->type == 'image') d-none @endif">
                                    <div class="form-group">
                                        <label class="form-label" for="use_target">Use Specific Target
                                        </label>
                                        <div class="form-control-wrap">
                                            <select class="form-select" id="use_target" name="use_target" @if(!($advertisement->status == 0 || Auth::user()->can('publish_advertisement'))) disabled @endif>
                                                <option value=" " disabled>Use Specific Target</option>
                                                <option value="0" @if($advertisement->use_target == 0) selected @endif>No</option>
                                                <option value="1" @if($advertisement->use_target == 1) selected @endif>Yes</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>                                     
                                <div class="col-4 ad-video @if($advertisement->type == 'image') d-none @endif">
                                    <div class="form-group ad-cost @if($advertisement->use_target == 1) d-none @endif">
                                        <label class="form-label" for="ad_cost">Select Ad Cost/Length
                                        </label>
                                        <div class="form-control-wrap">
                                            <select class="form-select" id="ad_cost" name="ad_length" @if(!($advertisement->status == 0 || Auth::user()->can('publish_advertisement'))) disabled @endif>
                                                <option value=" " disabled>Ad Cost/Length Per View</option>
                                                @foreach($ad_length as $key => $length)
                                                <option value="{{ $key }}" @if($advertisement->ad_length === $key) selected @endif>${{ $ad_price[$key] }} / {{ $length }}s</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group ad-specific-cost @if($advertisement->use_target == 0) d-none @endif">
                                        <label class="form-label" for="ad_specific_cost">Select Specific Ad Cost/Length
                                        </label>
                                        <div class="form-control-wrap">
                                            <select class="form-select" id="ad_specific_cost" name="ad_length_spec" @if(!($advertisement->status == 0 || Auth::user()->can('publish_advertisement'))) disabled @endif>
                                                <option value=" " disabled @if($advertisement->ad_length === null) selected @endif>Ad Specific Cost/Length Per View</option>
                                                @foreach($ad_length as $key => $length)
                                                <option value="{{ $key }}" @if($advertisement->ad_length === $key) selected @endif>${{ $ad_special_price[$key] }} / {{ $length }}s</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4 ad-video @if($advertisement->type == 'image') d-none @endif">
                                    <div class="form-group target-url @if($advertisement->use_target == 0) d-none @endif">
                                        <label class="form-label" for="target_url">Target URL</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control" id="target_url" name="target_url" value="{{$advertisement->target_url}}" @if(!($advertisement->status == 0 || Auth::user()->can('publish_advertisement'))) disabled @endif>
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
                                                <option value="include" @if($advertisement->movies_type == 'include') selected @endif>Include</option>
                                                <option value="exclude" @if($advertisement->movies_type == 'exclude') selected @endif>Exclude</option>
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
                                                    <option value="{{$movie->id}}" @if(in_array($movie->id, $advertisement->movies()->pluck('movies.id')->toArray())) selected @endif>{{$movie->title}}</option>
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
                                                    <option value="{{$show->id}}" @if($show->id == $selected_show) selected @endif>{{$show->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4 @if($selected_show == -1) d-none @endif" id="season_select">
                                    <div class="form-group">
                                        <label class="form-label" for="season">Select Season</label>
                                        <div class="form-control-wrap">
                                            <select class="form-select" id="season" name="season" data-placeholder="Select Season" >
                                                <option value="-1">Select Season</option>
                                                @foreach ($seasons as $season)
                                                    <option value="{{$season->id}}" @if($season->id == $selected_season) selected @endif>{{$season->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>    
                                <div class="col-4 @if($selected_show == -1) d-none @endif" id="episode_select">
                                    <div class="form-group">
                                        <label class="form-label" for="episodes">Select Episodes</label>
                                        <div class="form-control-wrap">
                                            <select class="form-select" id="episodes" name="episodes[]" multiple="multiple" data-placeholder="Select Episodes" >
                                                @foreach ($episodes as $episode)
                                                    <option value="{{$episode->id}}" @if(in_array($episode->id, $advertisement->episodes()->pluck('episodes.id')->toArray())) selected @endif>{{$episode->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                @endcan
                                @can('publish_advertisement')
                                <div class="col-12">
                                    <div class="form-group w-25">
                                        <label class="form-label" for="status">Status</label>
                                        <div class="form-control-wrap">
                                            <select class="form-select" id="status" name="status" required>
                                                <option value="1" @if($advertisement->status == 1) selected @endif>Active</option>
                                                @if($advertisement->status == 1 || $advertisement->status == 2)
                                                <option value="2" @if($advertisement->status == 2) selected @endif>Inactive</option>
                                                @endif
                                                <option value="0" @if($advertisement->status == 0) selected @endif>Ready</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                @else
                                <div class="col-12">
                                    <div class="form-group w-25">
                                        <label class="form-label" for="status">Status</label>
                                        <div class="form-control-wrap">
                                            <select class="form-select" id="status" name="status" required @if($advertisement->status == 0) disabled @endif>
                                                @if($advertisement->status == 1 || $advertisement->status == 2)
                                                <option value="1" @if($advertisement->status == 1) selected @endif>Active</option>
                                                <option value="2" @if($advertisement->status == 2) selected @endif>Inactive</option>
                                                <option value="0" @if($advertisement->status == 0) selected @endif>Ready</option>
                                                @else
                                                <option value="0" @if($advertisement->status == 0) selected @endif>Ready</option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                @endcan
                                <!-- <div class="col-6">


                                    <div class="form-group">
                                        <label class="form-label" for="ppv">Amount Per View in USD (PPV)</label>
                                        <div class="form-control-wrap">
                                            <input type="number" class="form-control" id="ppv" name="ppv" step="0.01" value="{{$advertisement->ppv}}" required>
                                        </div>
                                    </div>
                                </div> -->
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
        $( document ).ready(function() {

            $('.ad-type').change(function(e) {
                if(e.target.value == 'image') {
                    $('.ad-video').toggleClass('d-none');
                }
                else
                    $('.ad-video').toggleClass('d-none');
            })

            $('#use_target').change(function(e) {
                if(e.target.value) {
                    $('.ad-cost').toggleClass('d-none');
                    $('.target-url').toggleClass('d-none');
                    $('.ad-specific-cost').toggleClass('d-none');
                }
                else {
                    $('.ad-cost').toggleClass('d-none');
                    $('.target-url').toggleClass('d-none');
                    $('.ad-specific-cost').toggleClass('d-none');
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