@extends('layouts.rental')
@section('content')

    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <!--start breadcrumb-->
            <section class="py-3 border-bottom d-none d-md-flex">
                <div class="container">
                    <div class="page-breadcrumb d-flex align-items-center">
                        <h3 class="breadcrumb-title pe-3">Sign Up</h3>
                        <div class="ms-auto">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 p-0">
                                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i> Home</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="javascript:;">Authentication</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Sign Up</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </section>
            <!--end breadcrumb-->
            <!--start shop cart-->
            <section class="py-0 py-lg-5">
                <div class="container">
                    <div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0" style="height: 60vh !important;">
                        <div class="row row-cols-1 row-cols-lg-1 row-cols-xl-2">
                            <div class="col mx-auto">
                                <div class="card mb-0">
                                    <div class="card-body">
                                        <div class="border p-4 rounded">
                                            <div class="text-center">
                                                <h3 class="">Sign Up</h3>
                                                <p>Already have an account? <a href="{{route('rental.signin')}}">Sign in here</a>
                                                </p>
                                            </div>

                                            <div class="form-body">
                                                <form class="row g-3" method="POST" action="{{route('register')}}">
                                                    @csrf
                                                    <div class="col-sm-6">
                                                        <label for="inputFirstName" class="form-label">First Name</label>
                                                        <input type="text" class="form-control" id="inputFirstName" placeholder="Jhon" name="name" required>
                                                        @error('name')
                                                        <strong style="color: lightcoral">{{ $message }}</strong>
                                                        @enderror
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label for="inputLastName" class="form-label">Last Name</label>
                                                        <input type="text" class="form-control" id="inputLastName" placeholder="Deo">
                                                    </div>
                                                    <div class="col-12">
                                                        <label for="inputEmailAddress" class="form-label">Email Address</label>
                                                        <input type="email" class="form-control" id="inputEmailAddress" placeholder="example@user.com" name="email" required>
                                                        @error('email')
                                                        <strong style="color: lightcoral">{{ $message }}</strong>
                                                        @enderror
                                                    </div>
                                                    <div class="col-12">
                                                        <label for="inputChoosePassword" class="form-label">Password</label>
                                                        <div class="input-group" id="show_hide_password">
                                                            <input type="password" class="form-control border-end-0" id="inputChoosePassword" placeholder="Enter Password" name="password" required>
                                                            <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
                                                        </div>
                                                        @error('password')
                                                        <strong style="color: lightcoral">{{ $message }}</strong>
                                                        @enderror
                                                    </div>
                                                    <div class="col-12">
                                                        <label for="inputChoosePassword" class="form-label">Confirm Password</label>
                                                        <div class="input-group" id="show_hide_password">
                                                            <input type="password" class="form-control border-end-0" id="inputChoosePassword" placeholder="Confirm Password" name="password_confirmation" required>
                                                            <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" required>
                                                            <label class="form-check-label" for="flexSwitchCheckChecked">I read and agree to Terms & Conditions</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="d-grid">
                                                            <button type="submit" class="btn btn-light"><i class='bx bx-user'></i>Sign up</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end row-->
                    </div>
                </div>
            </section>
            <!--end shop cart-->
        </div>
    </div>
    <!--end page wrapper -->
@endsection