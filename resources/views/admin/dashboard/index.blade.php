@extends('layouts.backend')
@section('css')
    <style>
        .modal {
        padding: 0 !important; // override inline padding-right added from js
        }
        .modal .modal-dialog {
        width: 100%;
        max-width: none;
        margin: 0;
        }
        .modal .modal-content {
        height: 100%;
        border: 0;
        border-radius: 0;
        }
        .modal .modal-body {
        overflow-y: auto;
        }
    </style>
@endsection
@section('content')
    @php
        $user = \Illuminate\Support\Facades\Auth::user();
    @endphp
    @if($user->hasRole('super_admin') || $user->hasRole('admin'))
    <div class="nk-block-head nk-block-head-sm">
        <div class="nk-block-between">
            <div class="nk-block-head-content">
                <h4 class="nk-block-title page-title">Admin Dashboard</h4>
            </div><!-- .nk-block-head-content -->
        </div><!-- .nk-block-between -->
    </div><!-- .nk-block-head -->
    @else
    <div class="nk-block-head nk-block-head-sm">
        <div class="nk-block-between">
            <div class="nk-block-head-content">
                <h4 class="nk-block-title page-title">Welcome {{$user->name}}</h4>
            </div><!-- .nk-block-head-content -->
        </div><!-- .nk-block-between -->
    </div><!-- .nk-block-head -->
    @endif
    @if($user->referral)
    <div class="nk-block">
        <div class="row g-gs">
            <div class="col-xxl-3 col-sm-6">
                <div class="card">
                    <div class="nk-ecwg nk-ecwg6">
                        <div class="card-inner">
                            <div class="card-title-group">
                                <div class="card-title">
                                    <h6 class="title">Affiliations</h6>
                                </div>
                            </div>
                            <div class="data">
                                <div class="data-group">
                                    <div class="amount"> Total: {{count($affiliations)}}</div>
                                    <div class="nk-ecwg6-ck" style="height:90px !important">
                                        <div class="preview-icon-wrap">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 90 90">
                                                <rect x="3.5" y="14" width="36" height="62" rx="2" ry="2" fill="#fff" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></rect>
                                                <line x1="3.5" y1="22" x2="39.5" y2="22" fill="none" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></line>
                                                <line x1="3.5" y1="64" x2="39.5" y2="64" fill="none" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></line>
                                                <line x1="20.5" y1="18" x2="25.5" y2="18" fill="none" stroke="#c4cefe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></line>
                                                <line x1="17.17" y1="18" x2="17.17" y2="18" fill="none" stroke="#c4cefe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></line>
                                                <circle cx="21.5" cy="70" r="2" fill="none" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></circle>
                                                <rect x="7.5" y="25" width="28" height="35" fill="#eff1ff"></rect>
                                                <rect x="10.5" y="40" width="4" height="6" rx="2" ry="2" fill="#c4cefe"></rect>
                                                <rect x="16.5" y="40" width="4" height="6" rx="2" ry="2" fill="#c4cefe"></rect>
                                                <rect x="22.5" y="40" width="4" height="6" rx="2" ry="2" fill="#c4cefe"></rect>
                                                <rect x="28.5" y="40" width="4" height="6" rx="2" ry="2" fill="#c4cefe"></rect>
                                                <rect x="50.5" y="14" width="36" height="62" rx="2" ry="2" fill="#fff" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></rect>
                                                <line x1="50.5" y1="22" x2="86.5" y2="22" fill="none" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></line>
                                                <line x1="50.5" y1="64" x2="86.5" y2="64" fill="none" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></line>
                                                <line x1="67.5" y1="18" x2="72.5" y2="18" fill="none" stroke="#c4cefe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></line>
                                                <line x1="64.45" y1="17.86" x2="64.45" y2="17.86" fill="none" stroke="#c4cefe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></line>
                                                <circle cx="68.5" cy="70" r="2" fill="none" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></circle>
                                                <rect x="54.5" y="25" width="28" height="35" fill="#eff1ff"></rect>
                                                <rect x="57.5" y="39" width="4" height="6" rx="2" ry="2" fill="#c4cefe"></rect>
                                                <rect x="63.5" y="39" width="4" height="6" rx="2" ry="2" fill="#c4cefe"></rect>
                                                <rect x="69.5" y="39" width="4" height="6" rx="2" ry="2" fill="#c4cefe"></rect>
                                                <rect x="75.5" y="39" width="4" height="6" rx="2" ry="2" fill="#c4cefe"></rect>
                                                <ellipse cx="45.51" cy="44" rx="15.18" ry="15" fill="#fff" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></ellipse>
                                                <ellipse cx="45.51" cy="44" rx="11.13" ry="11" fill="#e3e7fe"></ellipse>
                                                <path d="M46,50.92s5.5-2.77,5.5-6.92V39.16L46,37.08l-5.5,2.08V44C40.5,48.15,46,50.92,46,50.92Z" fill="#6576ff"></path>
                                                <polyline points="48.04 42 44.56 46 42.98 44.18" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></polyline>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="info"><span class="change up text-danger"><em class="icon ni ni-arrow-long-up"></em>4.63%</span><span> vs. last week</span></div> -->
                            </div>
                        </div><!-- .card-inner -->
                    </div><!-- .nk-ecwg -->
                </div><!-- .card -->
            </div><!-- .col -->
            <div class="col-xxl-3 col-sm-6">
                <div class="card">
                    <div class="nk-ecwg nk-ecwg6">
                        <div class="card-inner">
                            <div class="card-title-group">
                                <div class="card-title">
                                    <h6 class="title">Affiliate Wallet</h6>
                                </div>
                            </div>
                            <div class="data">
                                <div class="data-group">
                                    <div class="amount"> Total: ${{$user->a_cash}}</div>
                                    <div class="nk-ecwg6-ck" style="height:90px !important">
                                        <div class="preview-icon-wrap">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 90 90">
                                                <rect x="9" y="21" width="55" height="39" rx="6" ry="6" fill="#fff" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></rect>
                                                <line x1="17" y1="44" x2="25" y2="44" fill="none" stroke="#c4cefe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></line>
                                                <line x1="30" y1="44" x2="38" y2="44" fill="none" stroke="#c4cefe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></line>
                                                <line x1="42" y1="44" x2="50" y2="44" fill="none" stroke="#c4cefe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></line>
                                                <line x1="17" y1="50" x2="36" y2="50" fill="none" stroke="#c4cefe" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></line>
                                                <rect x="16" y="31" width="15" height="8" rx="1" ry="1" fill="#c4cefe"></rect>
                                                <path d="M76.79,72.87,32.22,86.73a6,6,0,0,1-7.47-4L17,57.71A6,6,0,0,1,21,50.2L65.52,36.34a6,6,0,0,1,7.48,4l7.73,25.06A6,6,0,0,1,76.79,72.87Z" fill="#fff" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
                                                <polygon points="75.27 47.3 19.28 64.71 17.14 57.76 73.12 40.35 75.27 47.3" fill="#6576ff"></polygon>
                                                <path d="M30,77.65l-1.9-6.79a1,1,0,0,1,.69-1.23l4.59-1.3a1,1,0,0,1,1.23.7l1.9,6.78A1,1,0,0,1,35.84,77l-4.59,1.3A1,1,0,0,1,30,77.65Z" fill="#c4cefe"></path>
                                                <path d="M41.23,74.48l-1.9-6.78A1,1,0,0,1,40,66.47l4.58-1.3a1,1,0,0,1,1.23.69l1.9,6.78A1,1,0,0,1,47,73.88l-4.58,1.29A1,1,0,0,1,41.23,74.48Z" fill="#c4cefe"></path>
                                                <path d="M52.43,71.32l-1.9-6.79a1,1,0,0,1,.69-1.23L55.81,62A1,1,0,0,1,57,62.7l1.9,6.78a1,1,0,0,1-.69,1.23L53.66,72A1,1,0,0,1,52.43,71.32Z" fill="#c4cefe"></path>
                                                <ellipse cx="55.46" cy="19.1" rx="16.04" ry="16.1" fill="#fff" stroke="#6576ff" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></ellipse>
                                                <ellipse cx="55.46" cy="19.1" rx="12.11" ry="12.16" fill="#e3e7fe"></ellipse><text transform="translate(50.7 23.72) scale(0.99 1)" font-size="16.12" fill="#6576ff" font-family="Nunito-Black, Nunito Black">$</text>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="info"><span class="change up text-danger"><em class="icon ni ni-arrow-long-up"></em>4.63%</span><span> vs. last week</span></div> -->
                            </div>
                        </div><!-- .card-inner -->
                    </div><!-- .nk-ecwg -->
                </div><!-- .card -->
            </div><!-- .col -->

    </div><!-- .nk-block -->
        <br>
        <div class="nk-block">
            <div class="card">
                <div class="card-aside-wrap">
                    <div class="card-inner card-inner-lg">
                        <div class="nk-block-head nk-block-head-lg">
                            <div class="nk-block-between">
                                <div class="nk-block-head-content">
                                    <h4 class="nk-block-title">My Referrals</h4>
                                    <h4 class="nk-block-title">Referral Link: <u> {{url('/').'/register?ref_id='.\Illuminate\Support\Facades\Auth::id()}} </u></h4>
                                </div>
                                <div class="nk-block-head-content align-self-start d-lg-none">
                                    <a href="#" class="toggle btn btn-icon btn-trigger mt-n1" data-target="userAside"><em class="icon ni ni-menu-alt-r"></em></a>
                                </div>
                            </div>
                        </div><!-- .nk-block-head -->
                        {{-- {{ $refarals }} --}}
                        {{-- referal data table --}}
                        <div class="card card-preview">
                            <div class="card-inner">
                                <table class="datatable-init table">
                                    <thead>
                                    <tr>
                                        {{-- <th>Name</th> --}}
                                        <th>email</th>
                                        <th>Joining Date</th>
                                        <th>Subscription</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($referals as $referal)
                                        <tr>
                                            {{-- <td>{{ $referal->name }}</td> --}}
                                            <td>{{ $referal->email }}</td>
                                            <td>{{ date_format( $referal->created_at,"d M Y") }}</td>
                                            <td>
                                                @php
                                                    $userSubscriptions = $referal->p_subscriptions;
                                                @endphp
                                                @if($userSubscriptions)
                                                    @foreach ($userSubscriptions as $subscription)
                                                        <span class="badge badge-success">{{$subscription->name}}</span>
                                                    @endforeach
                                                @else
                                                    <span class="badge badge-error">Inactive</span>
                                                @endif
                                            </td>
                                            
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div><!-- .card-preview -->
                    </div>
                </div><!-- .card-aside-wrap -->
            </div><!-- .card -->
        </div><!-- .nk-block -->
    @endif
@endsection
@section('script')
    <script type="text/javascript">
        $(window).on('load', function() {
            $('#myModal').modal('show');
        });
        $("#myModal").modal({"backdrop": "static", keyboard: false});
    </script>
    <link type="text/css" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/south-street/jquery-ui.css" rel="stylesheet">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script type="text/javascript" src="{{url('/')}}/jquery.signature.js"></script>
    <script type="text/javascript" src="{{url('/')}}/jquery.ui.touch-punch.min.js"></script>

    <link rel="stylesheet" type="text/css" href="{{url('/')}}/jquery.signature.css">

    <script type="text/javascript">
        var sig = $('#sig').signature({syncField: '#signature64', syncFormat: 'PNG'});
        $('#clear').click(function(e) {
            e.preventDefault();
            sig.signature('clear');
            $("#signature64").val('');
        });
    </script>
@endsection