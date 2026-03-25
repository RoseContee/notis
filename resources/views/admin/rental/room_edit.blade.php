@extends('layouts.backend')

@section('content')
    <div class="nk-content">
        <div class="container-fluid">
            <div class="nk-block nk-block-lg">
                <div class="nk-block-between mb-2">
                    <div class="nk-block-head-content">
                        <h3 class="nk-block-title page-title">Edit Room</h3>
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

                        <form method="POST" action="{{ route('room.update', $room->id) }}" id="form" enctype="multipart/form-data" >
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="form-group col-4">
                                    <label class="form-label" for="number">Room Number</label>
                                    <div class="form-control-wrap">
                                        <input type="number" class="form-control" id="number" name="number" value="{{$room->number}}" required>
                                    </div>
                                </div>
                                <div class="form-group col-4">
                                    <label class="form-label" for="name">Room Name</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" id="name" name="name" value="{{$room->name}}" required>
                                    </div>
                                </div>
                                <div class="form-group col-4">
                                    <label class="form-label" for="dimension">Room Dimension</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" id="dimension" name="dimension" value="{{$room->dimension}}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col">
                                    <label class="form-label" for="price_type">Price Type</label>
                                    <div class="form-control-wrap">
                                        <select class="form-select" id="price_type" name="price_type" data-placeholder="Price Type" required>
                                            <option value="both" @if($room->price_type == 'both') selected @endif>Both</option>
                                            <option value="day" @if($room->price_type == 'day') selected @endif>Per Day</option>
                                            <option value="hour" @if($room->price_type == 'hour') selected @endif>Per Hour</option>
                                            <option value="monthly" @if($room->price_type == 'monthly') selected @endif>Monthly</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col">
                                    <label class="form-label" for="price_hourly">Hourly Price</label>
                                    <div class="form-control-wrap">
                                        <input type="number" class="form-control" id="price_hourly" name="price_hourly" value="{{$room->price_hourly}}" required>
                                    </div>
                                </div>
                                <div class="form-group col">
                                    <label class="form-label" for="price_daily">Daily Price</label>
                                    <div class="form-control-wrap">
                                        <input type="number" class="form-control" id="price_hourly" name="price_daily" value="{{$room->price_daily}}" required>
                                    </div>
                                </div>
                                <div class="form-group col">
                                    <label class="form-label" for="price_3">3 Months Price</label>
                                    <div class="form-control-wrap">
                                        <input type="number" class="form-control" id="price_3" name="price_3" value="{{$room->price_3}}" required>
                                    </div>
                                </div>
                                <div class="form-group col">
                                    <label class="form-label" for="price_6">6 Months Price</label>
                                    <div class="form-control-wrap">
                                        <input type="number" class="form-control" id="price_6" name="price_6" value="{{$room->price_6}}" required>
                                    </div>
                                </div>
                                <div class="form-group col">
                                    <label class="form-label" for="price_9">9 Months Price</label>
                                    <div class="form-control-wrap">
                                        <input type="number" class="form-control" id="price_9" name="price_9" value="{{$room->price_9}}" required>
                                    </div>
                                </div>
                                <div class="form-group col">
                                    <label class="form-label" for="price_12">12 Months Price</label>
                                    <div class="form-control-wrap">
                                        <input type="number" class="form-control" id="price_12" name="price_12" value="{{$room->price_12}}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-3">
                                    <label class="form-label" for="gallery">Gallery</label>
                                    <div class="form-control-wrap">
                                        <input type="file" class="form-control" id="gallery" name="gallery[]" multiple >
                                    </div>
                                </div>
                                <div class="form-group col">
                                    <label class="form-label" for="top_bar">Top Bar</label>
                                    <div class="form-control-wrap">
                                        <select class="form-select" id="top_bar" name="top_bar" data-placeholder="Top Bar" required>
                                            <option value="0" @if($room->top_bar == '0') selected @endif>Inactive</option>
                                            <option value="1" @if($room->top_bar == '1') selected @endif>Active</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col">
                                    <label class="form-label" for="featured">Featured</label>
                                    <div class="form-control-wrap">
                                        <select class="form-select" id="featured" name="featured" data-placeholder="Featured" required>
                                            <option value="0" @if($room->featured == '0') selected @endif>Inactive</option>
                                            <option value="1" @if($room->featured == '1') selected @endif>Active</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col">
                                    <label class="form-label" for="new_arrival">New Arrival</label>
                                    <div class="form-control-wrap">
                                        <select class="form-select" id="new_arrival" name="new_arrival" data-placeholder="New Arrival" required>
                                            <option value="0" @if($room->new_arrival == '0') selected @endif>Inactive</option>
                                            <option value="1" @if($room->new_arrival == '1') selected @endif>Active</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col">
                                    <label class="form-label" for="best_selling">Best Selling</label>
                                    <div class="form-control-wrap">
                                        <select class="form-select" id="best_selling" name="best_selling" data-placeholder="Best Selling" required>
                                            <option value="0" @if($room->best_selling == '0') selected @endif>Inactive</option>
                                            <option value="1" @if($room->best_selling == '1') selected @endif>Active</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col">
                                    <label class="form-label" for="top_rated">Top Rated</label>
                                    <div class="form-control-wrap">
                                        <select class="form-select" id="top_rated" name="top_rated" data-placeholder="Top Rated" required>
                                            <option value="0" @if($room->top_rated == '0') selected @endif>Inactive</option>
                                            <option value="1" @if($room->top_rated == '1') selected @endif>Active</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col">
                                    <label class="form-label" for="special_request">Special Request</label>
                                    <div class="form-control-wrap">
                                        <select class="form-select" id="special_request" name="special_request" data-placeholder="Special Request" required>
                                            <option value="1" @if($room->special_request == '1') selected @endif>Yes</option>
                                            <option value="0" @if($room->special_request == '0') selected @endif>No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col">
                                    <label class="form-label" for="status">Status</label>
                                    <div class="form-control-wrap">
                                        <select class="form-select" id="status" name="status" data-placeholder="Status" required>
                                            <option value="1" @if($room->status == '1') selected @endif>Active</option>
                                            <option value="0" @if($room->status == '0') selected @endif>Inactive</option>
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
                                            {!! $room->description !!}
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
