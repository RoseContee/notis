@extends('layouts.backend')

@section('content')
    <div class="nk-content">
        <div class="container-fluid">
            <div class="nk-block nk-block-lg">
                <div class="nk-block-between mb-2">
                    <div class="nk-block-head-content">
                        <h3 class="nk-block-title page-title">Contribute Network ({{ isset($network) ? $network->status == 1 ?  'Active' : 'Inactive' : 'Inactive' }})</h3>
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

                        <form method="POST" action="{{ route('network.store') }}" id="form" enctype="multipart/form-data" >
                            @csrf
                            <div class="form-group">
                                <label class="form-label" for="name">Network</label>
                                <div class="form-control-wrap">
                                    <input type="text" class="form-control" id="name" name="name" required value="{{ isset($network) ? $network->name : '' }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="logo">Logo</label>
                                <div class="form-control-wrap">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="logo" name="logo" required>
                                        <label class="custom-file-label" for="icon">Choose file</label>
                                    </div>
                                </div>
                                @if(isset($network))
                                <img src="{{$network->getFirstMediaUrl('logo')}}" width="200px" alt="" class="mt-2">
                                @endif
                            </div>
                            <button type="submit" class="btn btn-primary float-right">Submit</button>

                        </form>
                    </div>
                </div><!-- card -->

            </div>
        </div>

@endsection