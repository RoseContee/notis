@extends('layouts.backend')

@section('content')
    <div class="nk-content">
        <div class="container-fluid">
            <div class="nk-block nk-block-lg">
                <div class="nk-block-between mb-2">
                    <div class="nk-block-head-content">
                        <h3 class="nk-block-title page-title">Edit Season</h3>
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
                        <form method="POST" action="{{ route('season.update', $season->id) }}" id="form" enctype="multipart/form-data" >
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="form-label" for="title">Season Title</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control" id="title" name="title" value="{{$season->title}}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="form-label" for="date_sort">Date Sort</label>
                                        <div class="form-control-wrap">
                                            <input type="datetime-local" class="form-control" name="date_sort" id="date_sort" value="{{date('Y-m-d\TH:i', strtotime($season->date_sort))}}"  required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col">
                                    <div class="form-group">
                                        <label class="form-label" for="year">Year</label>
                                        <div class="form-control-wrap">
                                            <input type="number" class="form-control" id="year" name="year" value="{{$season->year}}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label class="form-label" for="trailer">Trailer</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control" id="trailer" name="trailer" value="{{$season->trailer}}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="trailer_video">Trailer Video File</label>
                                    <div class="form-control-wrap">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="trailer_video" name="trailer_video" >
                                            <label class="custom-file-label" for="icon">Choose file</label>
                                            <a target="_blank" href="{{$season->getFirstMediaUrl('trailer_video')}}">Trailer video</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label class="form-label" for="show_id">Tv Show</label>
                                        <div class="form-control-wrap">
                                            <select class="form-select" id="show_id" name="show_id" data-placeholder="Select Tv Show" required>
                                                @foreach ($shows as $show)
                                                    <option value="{{$show->id}}" @if($show->id == $season->show_id) selected @endif>{{$show->title}}</option>
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
                                                        <input type="radio" class="form-check-input" value="1" name="status"  {{ ($season->status==1)? "checked" : "" }}> Active
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-check">
                                                        <input type="radio" class="form-check-input" value="0" name="status"  {{ ($season->status==0)? "checked" : "" }}>  Inactive
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="form-label" for="adult">Season for Adults?</label>
                                        <div class="col-lg-4">
                                            <div class="row form-control-wrap">
                                                <div class="col-lg-6">
                                                    <div class="form-check">
                                                        <input type="radio" class="form-check-input" value="1" name="adult"  {{ ($season->adult==1)? "checked" : "" }}> Yes
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-check">
                                                        <input type="radio" class="form-check-input" value="0" name="adult"  {{ ($season->adult==0)? "checked" : "" }}>  No
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
                                            <textarea name="description" rows="10" style="width: 100%; padding: 15px">{{$season->description}}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-6 form-group">
                                    <label class="form-label" for="thumbnail">Show Thumbnail (1290 X 1290)</label>
                                    <div class="form-control-wrap">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="thumbnail" name="thumbnail">
                                            <label class="custom-file-label" for="icon">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 form-group">
                                    <img src="{{$season->getFirstMediaUrl('thumbnail')}}" height="100" width="100" alt="" style="border-radius: 20px">
                                </div>
                                <div class="col-6 form-group">
                                    <label class="form-label" for="poster">Movie Poster (1920 X 1080)</label>
                                    <div class="form-control-wrap">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="poster" name="poster">
                                            <label class="custom-file-label" for="icon">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 form-group">
                                    <img src="{{$season->getFirstMediaUrl('poster')}}" height="100" width="100" alt="" style="border-radius: 20px">
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
            <link rel="stylesheet" href="{{url('/')}}/backend/assets/css/editors/quill.css?ver=2.9.0">
            <script src="{{url('/')}}/backend/assets/js/libs/editors/quill.js?ver=2.9.0"></script>
            <script>
                var quill = new Quill('#editor', {
                    theme: 'snow'
                });
                $("#form").on("submit",function() {
                    var myEditor = document.querySelector('#editor')
                    var html = myEditor.children[0].innerHTML
                    $("#description").val(html);
                })
            </script>
@endsection