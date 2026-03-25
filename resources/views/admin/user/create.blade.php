@extends('layouts.backend')

@section('content')
    <div class="nk-content">
        <div class="container-fluid">
            <div class="nk-block nk-block-lg">
                <div class="nk-block-between mb-2">
                    <div class="nk-block-head-content">
                        <h3 class="nk-block-title page-title">Add User</h3>
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

                        <form method="POST" action="{{ route('user.store') }}" id="form" enctype="multipart/form-data" >
                            @csrf
                            <div class="form-group">
                                <label class="form-label" for="name">User Name</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" id="name" name="name" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="name">User Email</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" id="email" name="email" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="name">Password</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" id="password" name="password" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Roles</label>
                                <div class="form-control-wrap">
                                    <select name="roles[]" class="form-select" multiple="multiple" data-placeholder="Select Roles">
                                        @foreach ($roles as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Subscriptions</label>
                                <div class="form-control-wrap">
                                    <select name="subscriptions[]" class="form-select" multiple="multiple" data-placeholder="Select Subscriptions">
                                        @foreach ($subscriptions as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
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
