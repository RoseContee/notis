@extends('layouts.front')

@section('content')

    <div class="content-wrap mt-5">
        <div class="container pt-5 pb-7">
            <div class="row gy-6 gx-6">
                <div class="col-12 col-xl order-5">
                    <div class="flq-account-content" data-sr data-sr-delay="300" data-sr-duration="1200" data-sr-distance="10">
                        <form action="{{route('account_edit_post')}}" method="POST">
                            @csrf
                            <div class="row gy-3 gx-0">
                                <div class="col-12">
                                    <div class="row gy-1 gx-4 align-items-center">
                                        <div class="col-12 col-md-4 col-xl-3 flq-color-title">
                                            <label for="name">Name</label>
                                        </div>
                                        <div class="col-12 col-sm">
                                            <input class="form-control" type="text" id="name" name="name" value="{{isset($profile->name) ? $profile->name : ''}}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="row gy-1 gx-4 align-items-center">
                                        <div class="col-12 col-md-4 col-xl-3 flq-color-title">
                                            <label for="email">Email Address</label>
                                        </div>
                                        <div class="col-12 col-sm">
                                            <input class="form-control" type="email" id="email" value="{{$email}}" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="row gy-1 gx-4 align-items-center">
                                        <div class="col-12 col-md-4 col-xl-3 flq-color-title">
                                            <label for="country">Country</label>
                                        </div>
                                        <div class="col-12 col-sm">
                                            <input class="form-control" type="text" id="country" name="country" value="{{$profile->country}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="row gy-1 gx-4 align-items-center">
                                        <div class="col-12 col-md-4 col-xl-3 flq-color-title">
                                            <label for="city">City</label>
                                        </div>
                                        <div class="col-12 col-sm">
                                            <input class="form-control" type="text" id="city" name="city" value="{{$profile->city}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="row gy-1 gx-4 align-items-center">
                                        <div class="col-12 col-md-4 col-xl-3 flq-color-title">
                                            <label for="zipcode">ZipCode</label>
                                        </div>
                                        <div class="col-12 col-sm">
                                            <input class="form-control" type="number" id="zipcode" name="zipcode" value="{{$profile->zipcode}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="row gy-1 gx-4 align-items-center">
                                        <div class="col-12 col-md-4 col-xl-3 flq-color-title">
                                            <label for="gender">Gender</label>
                                        </div>
                                        <div class="col-12 col-sm">
                                            <select name="gender" class="form-control">
                                                <option value="Male" @if($profile->gender == 'Male') selected @endif>Male</option>
                                                <option value="Female" @if($profile->gender == 'Female') selected @endif>Female</option>
                                                <option value="Other" @if($profile->gender == 'Other') selected @endif>Other</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="row gy-1 gx-4 align-items-center">
                                        <div class="col-12 col-md-4 col-xl-3 flq-color-title">
                                            <label for="age">Age</label>
                                        </div>
                                        <div class="col-12 col-sm">
                                            <select name="age" class="form-control">
                                                <option value="0-10" @if($profile->age == '0-10') selected @endif>0-10 years</option>
                                                <option value="11-14" @if($profile->age == '11-14') selected @endif>11-14 years</option>
                                                <option value="15-21" @if($profile->age == '15-21') selected @endif>15-21 years</option>
                                                <option value="22-35" @if($profile->age == '22-35') selected @endif>22-35 years</option>
                                                <option value="36+" @if($profile->age == '36+') selected @endif>36+ years</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="row gy-1 gx-4 align-items-center">
                                        <div class="col-12 col-md-4 col-xl-3 flq-color-title">
                                            <label for="age">Profile Picture</label>
                                        </div>
                                        <div class="col-12 col-sm">
                                            @php
                                                $selectedProfile = \App\Models\Profile::find(request()->session()->get('selected_profile'));
                                            @endphp
                                            <img style="border-radius: 50%; margin-bottom: 10px" width="150px" height="150px" src="{{url('/')}}/avatars/{{$selectedProfile->avatar->avatar_path}}" alt="">
                                            <br>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                Change
                                            </button>
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

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" >
            <div class="modal-content">
                <div class="modal-body" style="background-color: #111113">
                    @php
                        $avatars = \App\Models\Avatar::get();
                    @endphp
                    <div class="row">
                        @foreach($avatars as $avatar)
                            @if($avatar->id != $selectedProfile->avatar_id)
                                <div class="col-4">
                                        <img style="border-radius: 50%; margin-bottom: 10px" width="150px" height="150px" src="{{url('/')}}/avatars/{{$avatar->avatar_path}}" alt="">
                                        <a href="{{route('change_avatar',$avatar->id)}}" class="btn btn-sm btn-primary">Change</a>
                                </div>
                            @endif

                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection