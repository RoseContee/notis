@extends('layouts.app')

@section('content')
    <!-- content @s -->
    <div class="nk-block nk-block-middle nk-auth-body  wide-xs">
        <div class="brand-logo pb-4 text-center">
            <a href="/" class="logo-link">
                {{-- <img src="{{ asset('front/img/logo.png') }}" alt=""> --}}
                {{-- <img class="logo-light logo-img logo-img-lg" src="{{ asset('front/img/logo.png') }}" srcset="./front/img/logo.png 2x" alt="logo"> --}}
                {{-- <img class="logo-dark logo-img logo-img-lg img-fluid" src="{{url('/')}}/logo.png" width="auto" style="height: 100rem"  alt="logo"> --}}
                <img src="{{ asset('logo.png') }}" width="120px" alt="">

            </a>
        </div>
        <div class="card">
            <div class="card-inner card-inner-lg">
                <div class="nk-block-head">
                    <div class="nk-block-head-content">
                        <h4 class="nk-block-title">Sign-In</h4>
                    </div>
                </div>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                        <div class="form-label-group">
                            <label class="form-label" for="default-01">Email</label>
                        </div>
                        <div class="form-control-wrap">
                            <input id="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Enter your email address or username" required autocomplete="email" autofocus>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-label-group">
                            <label class="form-label" for="password">Passcode</label>
                            <a class="link link-primary link-sm" href="{{ route('password.request') }}">Forgot Password?</a>
                        </div>
                        <div class="form-control-wrap">
                            <a href="#" class="form-icon form-icon-right passcode-switch lg" data-target="password">
                                <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                            </a>
                            <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" placeholder="Enter your passcode" required autocomplete="current-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-lg btn-primary btn-block">Sign in</button>
                    </div>
                </form>
{{--                <div class="form-note-s2 text-center pt-4"> New on our platform? <a href="/register">Create an account</a>--}}
                </div>
                {{--                <div class="text-center pt-4 pb-3">--}}
                {{--                    <h6 class="overline-title overline-title-sap"><span>OR</span></h6>--}}
                {{--                </div>--}}
                {{--                <ul class="nav justify-center gx-4">--}}
                {{--                    <li class="nav-item"><a class="nav-link" href="#">Facebook</a></li>--}}
                {{--                    <li class="nav-item"><a class="nav-link" href="#">Google</a></li>--}}
                {{--                </ul>--}}
            </div>
        </div>
    </div>
    <!-- wrap @e -->
@endsection