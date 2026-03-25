@extends('layouts.front')

@section('content')

    <div class="content-wrap mt-5">
        <div class="container pt-5 pb-7">
            <div class="row gy-6 gx-6">
                <div class="col-12 col-xl order-5">
                    <div class="flq-account-content">
{{--                            <span class="flq-account-avatar mb-4">--}}
{{--                                <span class="flq-image flq-responsive flq-responsive-1x1 flq-rounded">--}}
{{--                                    <img src="assets/images/user-160x160.jpg" alt="">--}}
{{--                                </span>--}}
{{--                            </span>--}}
                        <table class="table">
                            <tbody>
                            <tr>
                                <td class="flq-color-meta">Name</td>
                                <td>{{$profile->name}}</td>
                            </tr>
                            <tr>
                                <td class="flq-color-meta">Email</td>
                                <td>{{$user->email}}</td>
                            </tr>
                            @can('view_advertisements')
                            <tr>
                                <td class="flq-color-meta">Ads Balance</td>
                                <td>{{$profile->user->balance}}</td>
                            </tr>
                            @endcan
                            <tr>
                                <td class="flq-color-meta">Country</td>
                                <td>{{$profile->country ?? '-'}}</td>
                            </tr>
                            <tr>
                                <td class="flq-color-meta">City</td>
                                <td>{{$profile->city ?? '-'}}</td>
                            </tr>
                            <tr>
                                <td class="flq-color-meta">Gender</td>
                                <td>{{$profile->gender ?? '-'}}</td>
                            </tr>
                            <tr>
                                <td class="flq-color-meta">Date of Joining</td>
                                <td>
                                    <div class="row">
                                        <div class="col-auto">{{$profile->created_at}}</div>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
                @include('includes.profile-sidebar')
            </div>
        </div>
    </div>

@endsection