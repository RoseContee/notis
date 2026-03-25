@extends('layouts.backend')
@section('content')
<div class="components-preview wide-md mx-auto">
    <div class="nk-block-head nk-block-head-lg wide-sm">
        <div class="nk-block-head-content">
            <h3 class="nk-block-title fw-normal">Affiliation Setting</h3>
        </div>
    </div><!-- .nk-block -->
    <div class="nk-block nk-block-lg">
        <div class="row g-gs">
            <div class="col-lg-12">
                <div class="card h-100">
                    <div class="card-inner">
                        <div class="card-head">
                            <h5 class="card-title">Affiliation Setting Info</h5>
                        </div>
                        <form method="post" action="{{ route('affliation.setting.add.update') }}" >
                            @csrf
                            <div class="form-group">
                                <label class="form-label" for="full-name">Dolors ($) </label>
                                <div class="form-control-wrap">
                                    <input type="number" class="form-control"  value="{{ $affliation ? $affliation->percentage :'' }}" id="name" name="percentage">
                                    @error('percentage')
                                        <span class="alert text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Recurring</label>
                                    <div class="form-control-wrap">
                                        <select class="form-select js-select2" name="recurring">
                                            <option selected>Select Recurring</option>
                                            @if ($affliation)
                                            <option value="0" {{ $affliation->recurring == 0 ? 'selected' : '' }}>Active</option>
                                            <option value="1" {{ $affliation->recurring == 1 ? 'selected' : '' }}>InActive</option>
                                            @else
                                            <option value="0">Active</option>
                                            <option value="1">InActive</option>
                                            @endif

                                        </select>
                                        @error('recurring')
                                        <span class="alert text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-control-wrap my-2">
                                    <button type="submit" class="btn btn-lg btn-outline-success float-right">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="nk-block">
        <div class="row g-gs">
            <div class="col-xxl-12">
                <div class="col-12 div_alert">
                </div>
                <div class="card card-full">
                    <div class="nk-ecwg nk-ecwg8 h-100">
                        <div class="card-inner ml-1 mr-1 my-1">
                            <form id="TypeValidation" class="form-horizontal" action="{{route('tax.setting.add.update')}}" method="POST" enctype="multipart/form-data" >
                                @csrf
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label class="form-label" >Payer's TIN</label>
                                        <div class="form-control-wrap">
                                            <input  class="form-control" type="text" value="{{$tax->payer_tin ?? ''}}" name="payer_tin" required="true">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="form-label" >Account Number</label>
                                        <div class="form-control-wrap">
                                            <input  class="form-control" type="text" value="{{$tax->account_number ?? ''}}" name="account_number" required="true">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="form-label" >Payer's Name</label>
                                        <div class="form-control-wrap">
                                            <input  class="form-control" type="text" value="{{$tax->payer_name ?? ''}}" name="payer_name" required="true">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="form-label" >State/Payer's state no.</label>
                                        <div class="form-control-wrap">
                                            <input  class="form-control" type="text" value="{{$tax->payer_state ?? ''}}" name="payer_state" required="true">
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12 ">
                                        <button type="submit" class="btn btn-lg btn-primary">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div><!-- .card-inner -->
                    </div>
                </div><!-- .card -->
            </div><!-- .col -->
        </div><!-- .row -->


        <div class="nk-block">
            <div class="row g-gs">
                <div class="col-xxl-12">
                    <div class="col-12 div_alert">
                    </div>
                    <div class="card card-full">
                        <div class="nk-ecwg nk-ecwg8 h-100">
                            <div class="card-inner ml-1 mr-1 my-1">
                                <form id="form_agreement" class="form-horizontal" action="{{route('agreement.setting.add.update')}}" method="POST" enctype="multipart/form-data" >
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <label class="form-label" >Agreement Text</label>
                                            <div class="form-control-wrap">
                                                <div class="card card-bordered">
                                                    <div class="card-inner">
                                                        <!-- Create the editor container -->
                                                        <div id="editor">
                                                            <p>{!! $affliation->agreement !!}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <textarea name="agreement" style="display:none" id="description"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-12 ">
                                            <button type="submit" class="btn btn-lg btn-primary">Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div><!-- .card-inner -->
                        </div>
                    </div><!-- .card -->
                </div><!-- .col -->
            </div><!-- .row -->


    </div><!-- .nk-block -->

</div><!-- .components-preview -->

@endsection
    @section('script')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <link rel="stylesheet" href="{{url('/')}}/backend/assets/css/editors/quill.css?ver=2.9.0">
        <script src="{{url('/')}}/backend/assets/js/libs/editors/quill.js?ver=2.9.0"></script>
        <script>
            var quill = new Quill('#editor', {
                theme: 'snow'
            });
            $("#form_agreement").on("submit",function() {
                var myEditor = document.querySelector('#editor')
                var html = myEditor.children[0].innerHTML
                $("#description").val(html);
            })
        </script>



@endsection
