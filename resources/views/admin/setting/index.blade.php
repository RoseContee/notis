@extends('layouts.backend')

@section('content')
    <div class="nk-content">
        <div class="container-fluid">
            <div class="nk-block nk-block-lg">
                <div class="nk-block-between mb-2">
                    <div class="nk-block-head-content">
                        <h3 class="nk-block-title page-title">Settings</h3>
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
                        <form method="POST" action="{{ route('settings.update', $settings->id) }}" id="form" enctype="multipart/form-data" >
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="form-label" for="stripe">Stripe</label>
                                        <div class="col-lg-4">
                                            <div class="row form-control-wrap">
                                                <div class="col-lg-6">
                                                    <div class="form-check">
                                                        <input type="radio" class="form-check-input" value="1" name="stripe"  {{ ($settings->stripe==1)? "checked" : "" }}> Active
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-check">
                                                        <input type="radio" class="form-check-input" value="0" name="stripe"  {{ ($settings->stripe==0)? "checked" : "" }}>  Inactive
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label" for="stripe_key">Stripe Key</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control" id="stripe_key" name="stripe_key" value="{{$settings->stripe_key}}" >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label" for="stripe_secret">Stripe Secret</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control" id="stripe_secret" name="stripe_secret" value="{{$settings->stripe_secret}}" >
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="form-label" for="paypal">Paypal</label>
                                        <div class="col-lg-4">
                                            <div class="row form-control-wrap">
                                                <div class="col-lg-6">
                                                    <div class="form-check">
                                                        <input type="radio" class="form-check-input" value="1" name="paypal"  {{ ($settings->paypal==1)? "checked" : "" }}> Active
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-check">
                                                        <input type="radio" class="form-check-input" value="0" name="paypal"  {{ ($settings->paypal==0)? "checked" : "" }}>  Inactive
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label class="form-label" for="paypal_mode">Paypal Mode</label>
                                        <div class="col-lg-4">
                                            <div class="row form-control-wrap">
                                                <div class="col-lg-6">
                                                    <div class="form-check">
                                                        <input type="radio" class="form-check-input" value="sandbox" name="paypal_mode"  {{ ($settings->paypal_mode=='sandbox')? "checked" : "" }}> Sandbox
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-check">
                                                        <input type="radio" class="form-check-input" value="live" name="paypal_mode"  {{ ($settings->paypal_mode=='live')? "checked" : "" }}>  Live
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label" for="paypal_key">Paypal Key</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control" id="paypal_key" name="paypal_key" value="{{$settings->paypal_key}}" >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label" for="paypal_secret">Paypal Secret</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control" id="paypal_secret" name="paypal_secret" value="{{$settings->paypal_secret}}" >
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label" for="insurance_percentage">Insurance Percentage</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control" id="insurance_percentage" name="insurance_percentage" value="{{$settings->insurance_percentage}}" >
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label" for="affiliate_percentage">Affiliate Percentage</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control" id="affiliate_percentage" name="affiliate_percentage" value="{{$settings->affiliate_percentage}}" >
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label" for="contribute_percentage">Contribute Percentage</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control" id="contribute_percentage" name="contribute_percentage" value="{{$settings->contribute_percentage}}" >
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label" for="ad_total_length">Ad Total Length</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control" id="ad_total_length" name="ad_total_length" value="{{$settings->ad_total_length}}" >
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label" for="ad_length">Ad Length</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control" id="ad_length" name="ad_length" value="{{$settings->ad_length}}" >
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label" for="ad_price">Ad Price</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control" id="ad_price" name="ad_price" value="{{$settings->ad_price}}" >
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label" for="ad_special_price">Ad Special Price</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control" id="ad_special_price" name="ad_special_price" value="{{$settings->ad_special_price}}" >
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label" for="ad_image_price">Ad Image Price</label>
                                        <div class="form-control-wrap">
                                            <input type="text" class="form-control" id="ad_image_price" name="ad_image_price" value="{{$settings->ad_image_price}}" >
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary float-right mt-2">Update</button>

                        </form>
                    </div>
                </div><!-- card -->

            </div>
        </div>
    </div>
@endsection