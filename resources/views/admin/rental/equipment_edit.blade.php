@extends('layouts.backend')

@section('content')
    <div class="nk-content">
        <div class="container-fluid">
            <div class="nk-block nk-block-lg">
                <div class="nk-block-between mb-2">
                    <div class="nk-block-head-content">
                        <h3 class="nk-block-title page-title">Edit Equipment</h3>
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

                        <form method="POST" action="{{ route('equipment.update', $equipment->id) }}" id="form" enctype="multipart/form-data" >
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="form-group col-4">
                                    <label class="form-label" for="name"> Name</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" id="name" name="name" value="{{$equipment->name}}" required>
                                    </div>
                                </div>
                                <div class="form-group col-4 d-none">
                                    <label class="form-label" for="purchase_type">Purchase Type</label>
                                    <div class="form-control-wrap">
                                        <select class="form-select" id="purchase_type" name="purchase_type" data-placeholder="Purchase Type" >
                                            <option value="rent" @if($equipment->purchase_type == 'rent') selected @endif>Rent</option>
                                            <option value="buy" @if($equipment->purchase_type == 'buy') selected @endif>Buy</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-4">
                                    <label class="form-label" for="price_type">Price Type</label>
                                    <div class="form-control-wrap">
                                        <select class="form-select" id="price_type" name="price_type" data-placeholder="Price Type" >
                                            <option value="both" @if($equipment->price_type == 'both') selected @endif>Both</option>
                                            <option value="day" @if($equipment->price_type == 'day') selected @endif>Per Day</option>
                                            <option value="hour" @if($equipment->price_type == 'hour') selected @endif>Per Hour</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-4">
                                    <label class="form-label" for="category_id">Category</label>
                                    <div class="form-control-wrap">
                                        <select  class="form-control" id="category_id" name="category_id" required>
                                            <option selected>Select Category</option>
                                            @foreach ($categories as $item)
                                                <option value="{{$item->id}}" {{ $equipment->category_id == $item->id ? 'selected':'' }}>{{$item->name}}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                        <span class="alert text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group col-4">
                                    <label class="form-label" for="price_hourly">Hourly Price</label>
                                    <div class="form-control-wrap">
                                        <input type="number" class="form-control" id="price_hourly" name="price_hourly" value="{{$equipment->price_hourly}}" required>
                                    </div>
                                </div>
                                <div class="form-group col-4">
                                    <label class="form-label" for="price_daily">Daily Price</label>
                                    <div class="form-control-wrap">
                                        <input type="number" class="form-control" id="price_daily" name="price_daily" value="{{$equipment->price_daily}}" required>
                                    </div>
                                </div>
                                <div class="form-group col-4">
                                    <label class="form-label" for="gallery">Gallery 600 X 600</label>
                                    <div class="form-control-wrap">
                                        <input type="file" class="form-control" id="gallery" name="gallery[]" multiple >
                                    </div>
                                </div>
                                <div class="form-group col-2">
                                    <label class="form-label" for="require_room">Requires room?</label>
                                    <div class="form-control-wrap">
                                        <select class="form-select" id="require_room" name="require_room" data-placeholder="Requires room?" required>
                                            <option value="1" @if($equipment->require_room == '1') selected @endif>Yes</option>
                                            <option value="0" @if($equipment->require_room == '0') selected @endif>No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col">
                                    <label class="form-label" for="top_bar">Top Bar</label>
                                    <div class="form-control-wrap">
                                        <select class="form-select" id="top_bar" name="top_bar" data-placeholder="Top Bar" required>
                                            <option value="0" @if($equipment->top_bar == '0') selected @endif>Inactive</option>
                                            <option value="1" @if($equipment->top_bar == '1') selected @endif>Active</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col">
                                    <label class="form-label" for="featured">Featured</label>
                                    <div class="form-control-wrap">
                                        <select class="form-select" id="featured" name="featured" data-placeholder="Featured" required>
                                            <option value="0" @if($equipment->featured == '0') selected @endif>Inactive</option>
                                            <option value="1" @if($equipment->featured == '1') selected @endif>Active</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col">
                                    <label class="form-label" for="new_arrival">New Arrival</label>
                                    <div class="form-control-wrap">
                                        <select class="form-select" id="new_arrival" name="new_arrival" data-placeholder="New Arrival" required>
                                            <option value="0" @if($equipment->new_arrival == '0') selected @endif>Inactive</option>
                                            <option value="1" @if($equipment->new_arrival == '1') selected @endif>Active</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col">
                                    <label class="form-label" for="best_selling">Best Selling</label>
                                    <div class="form-control-wrap">
                                        <select class="form-select" id="best_selling" name="best_selling" data-placeholder="Best Selling" required>
                                            <option value="0" @if($equipment->best_selling == '0') selected @endif>Inactive</option>
                                            <option value="1" @if($equipment->best_selling == '1') selected @endif>Active</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col">
                                    <label class="form-label" for="top_rated">Top Rated</label>
                                    <div class="form-control-wrap">
                                        <select class="form-select" id="top_rated" name="top_rated" data-placeholder="Top Rated" required>
                                            <option value="0" @if($equipment->top_rated == '0') selected @endif>Inactive</option>
                                            <option value="1" @if($equipment->top_rated == '1') selected @endif>Active</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col">
                                    <label class="form-label" for="status">Status</label>
                                    <div class="form-control-wrap">
                                        <select class="form-select" id="status" name="status" data-placeholder="Status" required>
                                            <option value="1" @if($equipment->status == '1') selected @endif>Active</option>
                                            <option value="0" @if($equipment->status == '0') selected @endif>Inactive</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="nk-block nk-block-lg">
                                <div class="nk-block-head">
                                    <div class="nk-block-head-content">
                                        <label class="form-label" for="price">Description</label>
                                    </div>
                                </div>
                                <div class="card card-bordered">
                                    <div class="card-inner">
                                        <!-- Create the editor container -->
                                        <div id="editor">
                                            {!! $equipment->description !!}
                                        </div>
                                    </div>
                                </div>
                                <textarea name="description" style="display:none" id="description"></textarea>
                            </div><!-- .nk-block -->
                            <button type="submit" class="btn btn-primary float-right">Update</button>

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
