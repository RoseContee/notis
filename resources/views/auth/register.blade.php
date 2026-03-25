@extends('layouts.app')

@section('css')
    <style>
        .kbw-signature { width: 100%; height: 200px;}
        #sig canvas{
            width: 100% !important;
            height: auto;
        }
        .nk-content, .nk-footer{
            background-color: #381b1c !important;
        }
        label{
            color: white !important;
        }
    </style>
@endsection
@section('content')
    @php
        $cookie_name = "ref_id";
        $cookie_value = $_GET['ref_id'] ?? '';
        if(!isset($_COOKIE[$cookie_name])) {
            setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
            $ref_id = $cookie_value;
        }elseif(isset($_COOKIE[$cookie_name])) {
            $ref_id = $_COOKIE[$cookie_name];
        }
    @endphp
    <!-- content @s -->
    <div class="nk-block nk-block-middle nk-auth-body wide-xs">
        <div class="brand-logo pb-4 text-center">
            <a href="/" class="logo-link">
                <img src="{{ asset('logo.png') }}" width="120px" alt="">

            </a>
        </div>
        <div class="card" style="background-color: #181112 !important;">
            <div class="card-inner card-inner-lg">
                <div class="nk-block-head">
                    <div class="nk-block-head-content">
                        <h4 class="nk-block-title" style="color: white">Register</h4>
                    </div>
                </div>
                <form  method="POST" action="{{ route('register') }}">
                    @csrf
                    <input type="hidden" name="ref_by" value="{{$ref_id ?? ''}}">
{{--                    <div class="form-group">--}}
{{--                        <label class="form-label" for="name">Name</label>--}}
{{--                        <div class="form-control-wrap">--}}
{{--                            <input id="name" type="text" placeholder="Enter full name" class="form-control form-control-lg @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>--}}
{{--                            @error('name')--}}
{{--                            <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                            @enderror--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    <div class="form-group">
                        <label class="form-label" for="email">Email</label>
                        <div class="form-control-wrap">
                            <input id="email" type="email" placeholder="Enter email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="password">Passcode</label>
                        <div class="form-control-wrap">
                            <a href="#" class="form-icon form-icon-right passcode-switch lg" data-target="password">
                                <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                            </a>
                            <input id="password" type="password" placeholder="Enter Password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="password">Confirm Password</label>
                        <div class="form-control-wrap">

                            <input id="password-confirm" type="password" placeholder="Confirm Password" class="form-control form-control-lg" name="password_confirmation" required autocomplete="new-password">

                        </div>
                    </div>
                    @if(!\Illuminate\Support\Facades\Auth::check())
                        @php
                            $movies = \App\Models\Movie::where('status', 1)->orderBy('date_sort', 'desc')->get();
                            $shows = \App\Models\Show::where('status', 1)->orderBy('date_sort', 'desc')->get();
                        @endphp
                        <div class="form-group">
                            <label class="form-label">What show/movie brought you to Notis Studios?</label>
                            <div class="form-control-wrap">
                                <select class="form-select" data-search="on" name="interest_id" required>
                                    @foreach($movies as $movie)
                                        <option value="{{$movie->id}}">{{$movie->title}}</option>
                                    @endforeach
                                    @foreach($shows as $movie)
                                        <option value="{{$movie->id}}">{{$movie->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    @endif
                    <div class="form-group">
                        <div class="custom-control custom-control-xs custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="checkbox" required>
                            <label class="custom-control-label" for="checkbox">I agree to the <a href="{{route('terms')}}" target="_blank"> Terms and Conditions </a></label>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-lg btn-primary btn-block" style="background-color: #f63131; border: none">Register</button>
                    </div>
                </form>
                <div class="form-note-s2 text-center pt-4"> Already have an account? <a href="{{url('/')}}?signin=1"><strong>Sign in instead</strong></a>
                </div>
                {{--                <div class="text-center pt-4 pb-3">--}}
                {{--                    <h6 class="overline-title overline-title-sap"><span>OR</span></h6>--}}
                {{--                </div>--}}
                {{--                <ul class="nav justify-center gx-8">--}}
                {{--                    <li class="nav-item"><a class="nav-link" href="#">Facebook</a></li>--}}
                {{--                    <li class="nav-item"><a class="nav-link" href="#">Google</a></li>--}}
                {{--                </ul>--}}
            </div>
        </div>
    </div>
    <!-- wrap @e -->
@endsection
@section('scripts')
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