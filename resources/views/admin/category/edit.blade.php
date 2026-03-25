@extends('layouts.backend')

@section('content')
    <div class="nk-content">
        <div class="container-fluid">
            <div class="nk-block nk-block-lg">
                <div class="nk-block-between mb-2">
                    <div class="nk-block-head-content">
                        <h3 class="nk-block-title page-title">Edit category</h3>
                    </div><!-- .nk-block-head-content -->
                    <div class="nk-block-head-content">
                        <div class="toggle-wrap nk-block-tools-toggle">
                            <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-more-v"></em></a>
                            <div class="toggle-expand-content" data-content="pageMenu">
                                {{-- Categories/Add Category --}}
                            </div>
                        </div>
                    </div><!-- .nk-block-head-content -->
                </div><!-- .nk-block-between -->
                <div class="card">
                    <div class="card-inner">

                        <form method="POST" action="{{ route('category.update', $category->id) }}" id="form" enctype="multipart/form-data" >
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label class="form-label" for="name">Category Name</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" id="name" name="name" value="{{$category->name}}" required>
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="form-label" for="parent_cat">Category Type</label>
                                <div class="form-control-wrap">
                                    <select class="form-select" id="parent_cat" name="parent_cat">
                                        @foreach($top_categories as $top_category)
                                            <option value="{{$top_category->id}}"  @if($top_category->id == $category->parentCategory->id) selected @endif>{{$top_category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="picture">Picture</label>
                                <div class="form-control-wrap">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="picture" name="picture" required>
                                        <label class="custom-file-label" for="picture">Choose file</label>
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
