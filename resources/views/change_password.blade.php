@extends('layouts.front')

@section('content')

    <div class="content-wrap mt-5">
        <div class="container pt-5 pb-7">
            <div class="row gy-6 gx-6">
                <div class="col-12 col-xl order-5">
                    <div class="flq-account-content" data-sr data-sr-delay="300" data-sr-duration="1200" data-sr-distance="10">
                        <form action="{{route('change_password_post')}}" method="POST">
                            @csrf
                            <div class="row gy-3 gx-0">
                                <div class="col-12 flq-account-form-highlight mt-4 pt-1">
                                    <div class="row gy-1 gx-4 align-items-center">
                                        <div class="col-12 col-md-4 col-xl-3 flq-color-title">
                                            <label for="current_password">Current Password</label>
                                        </div>
                                        <div class="col-12 col-sm">
                                            <input class="form-control" type="password" name="current_password" id="current_password" placeholder="Current Password">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 flq-account-form-highlight mb-1 pb-1">
                                    <div class="row gy-1 gx-4 align-items-center">
                                        <div class="col-12 col-md-4 col-xl-3 flq-color-title">
                                            <label for="password">New Password</label>
                                        </div>
                                        <div class="col-12 col-sm">
                                            <input class="form-control" type="password" name="password" id="password" placeholder="New Password">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 mt-5">
                                    <div class="row g-3 justify-content-end">
                                        <div class="col-12 col-sm-auto">
                                            <button type="submit" class="btn btn-block">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                @include('includes.profile-sidebar')
            </div>
        </div>
    </div>

@endsection