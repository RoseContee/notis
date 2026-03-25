@extends('layouts.backend')
@section('content')

    @php
        $user = \Illuminate\Support\Facades\Auth::user();
    @endphp

    <!-- content @s -->

    <div class="nk-content">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="nk-block-head nk-block-head-sm">
                        <div class="nk-block-between">
                            <div class="nk-block-head-content">
                                <h3 class="nk-block-title page-title">Create Tax Document </h3>
                            </div><!-- .nk-block-head-content -->

                        </div><!-- .nk-block-between -->
                    </div><!-- .nk-block-head -->
                    <div class="nk-block">
                        <div class="row g-gs">
                            <div class="col-xxl-12">
                                <div class="col-12 div_alert">
                                </div>
                                <div class="card card-full">
                                    <div class="nk-ecwg nk-ecwg8 h-100">
                                        <div class="card-inner ml-1 mr-1 my-1">
                                            <form target="_blank" id="TypeValidation" class="form-horizontal" action="{{route('tax_document_post')}}" method="POST" enctype="multipart/form-data" >
                                                @csrf
                                                <div class="row">
                                                    <div class="form-group">
                                                        <label class="form-label" for="default-06">Select Year</label>
                                                        <div class="form-control-wrap ">
                                                            <div class="form-control-select">
                                                                <select class="form-control" required data-style="btn btn-rose btn-round" title="Select User" name="year" id="default-06">

                                                                    @php
                                                                        $current_year = date('Y');
                                                                        $earliest_year = 2021;
                                                                    @endphp
                                                                    <option value=""  >Select Year</option>
                                                                    @foreach (range(date('Y'), $earliest_year) as $x)
                                                                            <option value="{{$x}}" @if($current_year == $x) selected @endif>
                                                                                    {{$x}}
                                                                            </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label class="form-label " >Complete Address </label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" name="address" class="form-control" required>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-5">
                                                        <label class="form-label " >Recipient's TIN/SSN</label>
                                                        <div class="form-control-wrap">
                                                            <input type="text" name="recipient_tin" class="form-control" required>
                                                        </div>
                                                    </div>

                                                    <div class="form-group col-md-12 ">
                                                        <button type="submit" class="btn btn-lg btn-primary">Create</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div><!-- .card-inner -->
                                    </div>
                                </div><!-- .card -->
                            </div><!-- .col -->
                        </div><!-- .row -->


                    </div><!-- .nk-block -->
                </div>
            </div>
        </div>
    </div>


    <!-- content @e -->


@endsection
