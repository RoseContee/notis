@extends('layouts.backend')

@section('content')
    <div class="nk-content">
        <div class="container-fluid">
            <div class="nk-block nk-block-lg">
                <div class="nk-block-between mb-2">
                    <div class="nk-block-head-content">
                        <h3 class="nk-block-title page-title">Add subscription</h3>
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

                        <form method="POST" action="{{ route('subscription.store') }}" id="form" enctype="multipart/form-data" >
                            @csrf
                            <div class="row">
                                <div class="form-group col-4">
                                    <label class="form-label" for="name">Subscription Name</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" id="name" name="name" required>
                                    </div>
                                </div>

                                <div class="form-group col-4">
                                    <label class="form-label" for="subscription_duration">Recurring Payment</label>
                                    <div class="form-control-wrap">
                                        <select class="form-select" id="recurring" name="recurring">
                                            <option value="1">Yes</option>
                                            <option value="0" selected>No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-4">
                                    <label class="form-label" for="price">Price / Admin Fee $</label>
                                    <div class="form-control-wrap">
                                        <input type="number" step="0.01" class="form-control" id="price" name="onet_time_price" required>
                                    </div>
                                </div>

                            </div>
                            <div class="row d-none" id="recurring_detail">
                                <div class="form-group col-4">
                                    <label class="form-label" for="subscription_duration">Subscription Duration (In Days)</label>
                                    <div class="form-control-wrap">
                                        <input type="number" class="form-control" id="subscription_duration" name="days" >
                                    </div>
                                </div>
                                <div class="form-group col-4">
                                    <label class="form-label" for="price">Stripe ID</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" id="price" name="stripe_id" >
                                    </div>
                                </div>

                                <div class="form-group col-4">
                                    <label class="form-label" for="price">Recurring Price $</label>
                                    <div class="form-control-wrap">
                                        <input type="number" step="0.01" class="form-control" name="recurring_price">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-6">
                                    <label class="form-label" for="paypal_id">Paypal ID</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" id="paypal_id" name="paypal_id" >
                                    </div>
                                </div>
                                <div class="form-group col-6">
                                    <label class="form-label" for="image">Image</label>
                                    <div class="form-control-wrap">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="image" name="image">
                                            <label class="custom-file-label" for="icon">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-4">
                                    <label class="form-label" for="number_of_profiles">Number of Profiles</label>
                                    <div class="form-control-wrap">
                                        <input type="number" class="form-control" value="1" id="number_of_profiles" name="number_of_profiles" required>
                                    </div>
                                </div>
                                <div class="form-group col-4">
                                    <label class="form-label" for="number_of_streaming">Number of Simultaneous Streaming</label>
                                    <div class="form-control-wrap">
                                        <input type="number" class="form-control" value="1" id="number_of_streaming" name="number_of_streaming" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="status">Subscription status</label>
                                <div class="col-lg-4">
                                    <div class="row form-control-wrap">
                                        <div class="col-lg-6">
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" value="1" name="status" id="status_active" checked>
                                                <label for="status_active">Active</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" value="0" name="status" id="status_inactive">
                                                <label for="status_inactive">Inactive</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="adds">Advertisements</label>
                                <div class="col-lg-4">
                                    <div class="row form-control-wrap">
                                        <div class="col-lg-6">
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" value="1" name="adds" >
                                                <label for="status_active">Active</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" value="0" name="adds" checked>
                                                <label for="status_inactive">Inactive</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
{{--                            <div class="form-group">--}}
{{--                                <label class="form-label" for="affiliated">Affiliated or not?</label>--}}
{{--                                <div class="col-lg-4">--}}
{{--                                    <div class="row form-control-wrap">--}}
{{--                                        <div class="col-lg-6">--}}
{{--                                            <div class="form-check">--}}
{{--                                                <input type="radio" class="form-check-input" value="1" name="affiliate" id="affiliate_yes" checked>--}}
{{--                                                <label for="affiliate_yes">Yes</label>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="col-lg-6">--}}
{{--                                            <div class="form-check">--}}
{{--                                                <input type="radio" class="form-check-input" value="0" name="affiliate" id="affiliate_no" >--}}
{{--                                                <label for="affiliate_no">No</label>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

{{--                                </div>--}}
{{--                                <div class="form-group col-4">--}}
{{--                                    <label class="form-label" for="key"> Affiliate Amount $</label>--}}
{{--                                    <div class="form-control-wrap">--}}
{{--                                        <input type="number" class="form-control" id="affiliate_amount" name="affiliate_amount" required>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}


                            
                            <div class="nk-block nk-block-lg">
                                <div class="nk-block-head">
                                    <div class="nk-block-head-content">
                                        <h4 class="title nk-block-title">Subscription Description</h4>
                                    </div>
                                </div>
                                <div class="card card-bordered">
                                    <div class="card-inner">
                                        <!-- Create the editor container -->
                                        <div id="editor">
                                            <p></p>
                                        </div>
                                    </div>
                                </div>
                                <textarea name="description" style="display:none" id="description"></textarea>
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


            <script>
                $('#recurring').on('change', function(){
                    if ($(this).val() == 1 ) {
                        $('#recurring_detail').removeClass('d-none');
                    }

                    if ($(this).val() == 0 ) {
                        $('#recurring_detail').addClass('d-none');
                    }
                })
            </script>
@endsection
