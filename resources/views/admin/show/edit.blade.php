@extends('layouts.backend')

@section('content')
    <div class="nk-content">
        <div class="container-fluid">
            <div class="nk-block nk-block-lg">
                <div class="nk-block-between mb-2">
                    <div class="nk-block-head-content">
                        <h3 class="nk-block-title page-title">Edit {{ $show->media_category->name }}</h3>
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
                        <form method="POST" action="{{ route('show.update', $show->id) }}" id="form" enctype="multipart/form-data" >
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="form-label" for="title">Show Title</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control" id="title" name="title" value="{{$show->title}}" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="genres">Genres</label>
                                        <div class="form-control-wrap">
                                            <select class="form-select" id="genres" name="genres[]" multiple data-placeholder="Select Genres" required>
                                                @foreach ($genres as $genre)
                                                    <option value="{{$genre->id}}" @if(in_array($genre->id, $show->genres()->pluck('genres.id')->toArray())) selected @endif>{{$genre->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="form-label" for="date_sort">Date Sort</label>
                                        <div class="form-control-wrap">
                                            <input type="datetime-local" class="form-control" name="date_sort" id="date_sort" value="{{date('Y-m-d\TH:i', strtotime($show->date_sort))}}"  required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="form-label" for="status">Status</label>
                                        <div class="col-lg-4">
                                            <div class="row form-control-wrap">
                                                <div class="col-lg-6">
                                                    <div class="form-check">
                                                        <input type="radio" class="form-check-input" value="1" name="status"  {{ ($show->status==1)? "checked" : "" }}> Active
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-check">
                                                        <input type="radio" class="form-check-input" value="0" name="status"  {{ ($show->status==0)? "checked" : "" }}>  Inactive
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="form-label" for="best_serial">Best Serial</label>
                                        <div class="col-lg-4">
                                            <div class="row form-control-wrap">
                                                <div class="col-lg-6">
                                                    <div class="form-check">
                                                        <input type="radio" class="form-check-input" value="1" name="best_serial"  {{ ($show->best_serial==1)? "checked" : "" }}> Active
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-check">
                                                        <input type="radio" class="form-check-input" value="0" name="best_serial"  {{ ($show->best_serial==0)? "checked" : "" }}>  Inactive
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="form-label" for="adult">Tv Show for Adults?</label>
                                        <div class="col-lg-4">
                                            <div class="row form-control-wrap">
                                                <div class="col-lg-6">
                                                    <div class="form-check">
                                                        <input type="radio" class="form-check-input" value="1" name="adult"  {{ ($show->adult==1)? "checked" : "" }}> Yes
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-check">
                                                        <input type="radio" class="form-check-input" value="0" name="adult"  {{ ($show->adult==0)? "checked" : "" }}>  No
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
                                            <textarea name="description" rows="10" style="width: 100%; padding: 15px">{{$show->description}}</textarea>
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
                                    <img src="{{$show->getFirstMediaUrl('thumbnail')}}" height="100" width="100" alt="" style="border-radius: 20px">
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
                                    <img src="{{$show->getFirstMediaUrl('poster')}}" height="100" width="100" alt="" style="border-radius: 20px">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="form-label" for="top_scroll">Top Scroll</label>
                                        <div class="col-lg-4">
                                            <div class="row form-control-wrap">
                                                <div class="col-lg-6">
                                                    <div class="form-check">
                                                        <input type="radio" class="form-check-input" value="1" name="top_scroll"  {{ ($show->top_scroll==1)? "checked" : "" }}> Active
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-check">
                                                        <input type="radio" class="form-check-input" value="0" name="top_scroll"  {{ ($show->top_scroll==0)? "checked" : "" }}>  Inactive
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