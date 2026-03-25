@extends('layouts.backend')

@section('content')
    <div class="nk-content">
        <div class="container-fluid">
            <div class="nk-block nk-block-lg">
                <div class="nk-block-between mb-2">
                    <div class="nk-block-head-content">
                        <h3 class="nk-block-title page-title">Edit Contribute Network</h3>
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

                        <form method="POST" action="{{ route('network.update', $network->id) }}" id="form" enctype="multipart/form-data" >
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label class="form-label" for="title">Network</label>
                                <div class="form-control-wrap">
                                    {{ $network->name }}
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="logo">Logo</label>
                                <div>
                                    <img src="{{$network->getFirstMediaUrl('logo')}}" width="200px" alt="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="status">Status</label>
                                <div class="form-control-wrap">
                                    <select class="form-select" id="status" name="status" required>
                                        <option value="1" @if($network->status == 1) selected @endif>Active</option>
                                        <option value="2" @if($network->status == 0) selected @endif>Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary float-right">Update</button>

                        </form>
                    </div>
                </div><!-- card -->

            </div>
        </div>

@endsection