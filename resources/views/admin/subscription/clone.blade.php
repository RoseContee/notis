@extends('layouts.backend')

@section('content')
    <div class="nk-content">
        <div class="container-fluid">
            <div class="nk-block nk-block-lg">
                <div class="nk-block-between mb-2">
                    <div class="nk-block-head-content">
                        <h3 class="nk-block-title page-title">Edit Subscription</h3>
                    </div><!-- .nk-block-head-content -->
                    <div class="nk-block-head-content">
                        <div class="toggle-wrap nk-block-tools-toggle">
                            <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em
                                    class="icon ni ni-more-v"></em></a>
                            <div class="toggle-expand-content" data-content="pageMenu">
                                {{-- Categories/Add Category --}}
                            </div>
                        </div>
                    </div><!-- .nk-block-head-content -->
                </div><!-- .nk-block-between -->
                <div class="card">
                    <div class="card-inner">

                        <form method="POST" action="{{ route('subscription.store') }}" id="form"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="cloned_from" required="true" aria-required="true" aria-invalid="false" class="form-control"  value="{{$subscription->id}}" >
                            <div class="row">
                                <div class="form-group col-6">
                                    <label class="form-label" for="name">Subscription Name</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" id="name" name="name" value="{{ $subscription->name }}"  required>
                                    </div>
                                </div>
                                <div class="form-group col-6">
                                    <label class="form-label" for="subscription_duration">Subscription Duration (In Days)</label>
                                    <div class="form-control-wrap">
                                        <input type="number" class="form-control" id="subscrition_duration" name="days"  required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-6">
                                    <label class="form-label" for="price">Price</label>
                                    <div class="form-control-wrap">
                                        <input type="number" class="form-control" id="price" name="price"   required>
                                    </div>
                                </div>
                                <div class="form-group col-6">
                                    <label class="form-label" for="price">Stripe ID</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" id="price" name="stripe_id" required>
                                    </div>
                                </div>
                                <div class="form-group col-6">
                                    <label class="form-label" for="key"> Number Of Accounts</label>
                                    <div class="form-control-wrap">
                                        <input type="number" class="form-control" id="key" name="accounts" value="{{ $subscription->accounts }}" required>
                                    </div>
                                </div>
                                <div class="form-group col-6">
                                    <label class="form-label" for="key"> Subscription Key</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" id="key" name="key" value="{{ $subscription->key }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-6">
                                    <label class="form-label" for="image">Image</label>
                                    <div class="form-control-wrap">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="image" name="image">
                                            <label class="custom-file-label" for="icon">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 form-group">
                                    <label class="form-label" for="title">Subscription Image</label>
                                       <span class="ml-5"><img src="{{$subscription->getFirstMediaUrl('image')}}" height="100" width="100" alt="" style="border-radius: 20px"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="status">Subscription status</label>

                                <div class="col-lg-4">
                                    <div class="row form-control-wrap">
                                        <div class="col-lg-6">
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" value="1" name="status"  {{ ($subscription->status==1)? "checked" : "" }}> Active
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" value="0" name="status"  {{ ($subscription->status==0)? "checked" : "" }}>  Inactive
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                            <div class="form-group">
                                <label class="form-label" for="affiliated">Affiliated or not?</label>
                                <div class="col-lg-4">
                                    <div class="row form-control-wrap">
                                        <div class="col-lg-6">
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" value="1" name="affiliate" id="affiliate_yes" {{ ($subscription->affiliate==1)? "checked" : "" }}>
                                                <label for="affiliate_yes">Yes</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-check">
                                                <input type="radio" class="form-check-input" value="0" name="affiliate" id="affiliate_no" {{ ($subscription->affiliate==0)? "checked" : "" }}>
                                                <label for="affiliate_no">No</label>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="form-group col-4">
                                <label class="form-label" for="key"> Affiliate Amount $</label>
                                <div class="form-control-wrap">
                                    <input type="number" class="form-control" id="affiliate_amount" name="affiliate_amount" value="{{ $subscription->affiliate_amount }}" required>
                                </div>
                            </div>
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
                                            {!! $subscription->description !!}
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
        <link rel="stylesheet" href="{{ url('/') }}/backend/assets/css/editors/quill.css?ver=2.9.0">
        <script src="{{ url('/') }}/backend/assets/js/libs/editors/quill.js?ver=2.9.0"></script>
        <script>
            var quill = new Quill('#editor', {
                theme: 'snow'
            });
            $("#form").on("submit", function() {
                var myEditor = document.querySelector('#editor')
                var html = myEditor.children[0].innerHTML
                $("#description").val(html);
            })
        </script>
    @endsection
