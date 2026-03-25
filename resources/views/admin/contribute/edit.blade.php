@extends('layouts.backend')

@section('content')
    <div class="nk-content">
        <div class="container-fluid">
            <div class="nk-block nk-block-lg">
                <div class="nk-block-between mb-2">
                    <div class="nk-block-head-content">
                        <h3 class="nk-block-title page-title">Edit Contribute Video</h3>
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

                        <form method="POST" action="{{ route('contribute.update', $contribute->id) }}" id="form" enctype="multipart/form-data" >
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label class="form-label" for="title">Title</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" id="title" name="title" value="{{$contribute->title}}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="link">Link</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" id="link" name="link" value="{{$contribute->link}}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="duration">Description</label>
                                <div class="form-control-wrap">
                                    <textarea name="description" rows="10" style="width: 100%; padding: 15px">{{$contribute->description}}</textarea>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary float-right">Update</button>

                        </form>
                    </div>
                </div><!-- card -->

            </div>
        </div>

@endsection