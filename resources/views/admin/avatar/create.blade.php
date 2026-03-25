@extends('layouts.backend')

@section('content')
    <div class="nk-content">
        <div class="container-fluid">
            <div class="nk-block nk-block-lg">
                <div class="nk-block-between mb-2">
                    <div class="nk-block-head-content">
                        <h3 class="nk-block-title page-title">Add Avatar</h3>
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

                        <form method="POST" action="{{ route('avatar.store') }}" id="form" enctype="multipart/form-data" >
                            @csrf
                            <div class="form-group">
                                <label class="form-label" for="avatar">Select Avatar</label>
                                <div class="form-control-wrap">
                                    <input type="file" class="form-control" id="avatar" name="avatar" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="is_default">Is Default?</label>
                                <div class="form-control-wrap">
                                    <select class="form-select" id="is_default" name="is_default" data-placeholder="Is Default?" required>
                                        <option value="1">Yes</option>
                                        <option value="0" selected>No</option>
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