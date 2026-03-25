@extends('layouts.backend')

@section('content')
<div class="nk-block">
    <div class="card">
        <div class="card-aside-wrap">
            <div class="card-inner card-inner-lg">
                <div class="nk-block-head nk-block-head-lg">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h4 class="nk-block-title">Transactions</h4>
                        </div>
                        <div class="nk-block-head-content align-self-start d-lg-none">
                            <a href="#" class="toggle btn btn-icon btn-trigger mt-n1" data-target="userAside"><em class="icon ni ni-menu-alt-r"></em></a>
                        </div>
                    </div>
                </div><!-- .nk-block-head -->
                <div class="card card-preview mt-2">
                    <div class="card-inner">
                        {{-- {{ $accounts }} --}}
                        <table class="datatable-init table">
                            <thead>
                                <tr>
                                    <th>Package</th>
                                    <th>Amount</th>
                                    <th>Subscription Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transactions as $transaction)
                                    <tr>
                                        <td>{{ $transaction->subscription->name }}</td>
                                        <td>${{ $transaction->amount }}</td>
                                        <td>{{ date('d-M-Y', strtotime($transaction->created_at)) }}</td>
                                    </tr>
                                @endforeach
    
                            </tbody>
                        </table>
                    </div>
                </div><!-- .card-preview -->
                
            </div>
            <div class="card-aside card-aside-left user-aside toggle-slide toggle-slide-left toggle-break-lg" data-content="userAside" data-toggle-screen="lg" data-toggle-overlay="true">
                <div class="card-inner-group" data-simplebar>
                    <div class="card-inner">
                        <div class="user-card">
                            <div class="user-avatar bg-primary">
                                <span>{{  strtoupper(substr($user->name, 0, 2)) }}</span>
                            </div>
                            <div class="user-info">
                                <span class="lead-text">{{ $user->name }}</span>
                                <span class="sub-text">{{ $user->email }}</span>
                            </div>
                            {{-- <div class="user-action">
                                <div class="dropdown">
                                    <a class="btn btn-icon btn-trigger mr-n2" data-toggle="dropdown" href="#"><em class="icon ni ni-more-v"></em></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <ul class="link-list-opt no-bdr">
                                            <li><a href="#"><em class="icon ni ni-camera-fill"></em><span>Change Photo</span></a></li>
                                            <li><a href="#"><em class="icon ni ni-edit-fill"></em><span>Update Profile</span></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div> --}}
                        </div><!-- .user-card -->
                    </div><!-- .card-inner -->
                    <div class="card-inner">
                        <div class="user-account-info py-0">
                            <h6 class="overline-title-alt">Sign Up Date</h6>
                            <div class="user-balance">{{ date_format($user->created_at,"d M Y H:i:s") }}</div>
                        </div>
                    </div><!-- .card-inner -->
                    <div class="card-inner p-0">
                        <ul class="link-list-menu">
                            <li><a class="" href="{{ route('user.detail', $user->id) }}"><em class="icon ni ni-user-fill-c"></em><span>Personal Information</span></a></li>
                            {{-- <li><a class="" href="{{ route('user.account.admin', $user->id) }}"><em class="icon ni ni-coins"></em><span>Account</span></a></li> --}}
                            <li><a class="" href="{{ route('user.affiliation.admin', $user->id) }}"><em class="icon ni ni-user-fill-c"></em><span>Affiliation</span></a></li>
                            {{-- <li><a class="" href="{{ route('user.kyc.admin',$user->id) }}"><em class="icon ni ni-user-fill-c"></em><span>KYC</span></a></li> --}}
                            <li><a class="active" href="{{ route('user.transactions.admin',$user->id) }}"><em class="icon ni ni-reports"></em><span>Transactions</span></a></li>
                            {{-- <li><a href="html/user-profile-notification.html"><em class="icon ni ni-bell-fill"></em><span>Notifications</span></a></li>
                            <li><a href="html/user-profile-activity.html"><em class="icon ni ni-activity-round-fill"></em><span>Account Activity</span></a></li> --}}
                        </ul>
                    </div><!-- .card-inner -->
                </div><!-- .card-inner-group -->
            </div><!-- card-aside -->
        </div><!-- .card-aside-wrap -->
    </div><!-- .card -->
</div><!-- .nk-block -->
@endsection