@extends('layouts.backend')
@section('content')
    <div class="nk-content " style="width: 100%;">
        <div class="">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="components-preview">

                        <div class="nk-block">
                            <div class="nk-block-head">
                                <div class="nk-block-head-content">
                                    <h4 class="nk-block-title">Your Key Number
                                            {{-- <a href="{{route('subscription.create')}}" class="btn btn-outline-success float-right"><em class="icon ni ni-plus"></em><span>Add Subscription</span></a> --}}
                                    </h4>
                                    <div class="nk-block-des">
                                        <!-- <p>Using the most basic table markup, here’s how <code class="code-class">.table</code> based tables look by default.</p> -->
                                    </div>
                                </div>
                            </div>

                            <div class="card card-preview">

                                <div class="card-inner">
                                        @if (has_product_access(auth()->user()))
                                        <form>
                                            @csrf
                                            <div class="row">
                                                <div class="form-group col-6">
                                                    <label class="form-label" for="key">Key 1</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control" id="key" name="key1" required>
                                                    </div>
                                                </div>
                                                <div class="form-group col-6">
                                                    <label class="form-label" for="key2">Key 2</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control" id="key2" name="key2" required>
                                                    </div>
                                                </div>
                                            </div>

                                         
                                            <button type="submit" class="btn btn-outline-success float-right">Update</button>
                
                                        </form>
                                        @else
                                            <h3 class="text-warning">You Need A Subscription</h3>
                                        @endif
                                </div>
                            </div><!-- .card-preview -->
                        </div> <!-- nk-block -->

                    </div><!-- .components-preview -->
                </div>
            </div>
        </div>
    </div>

@endsection