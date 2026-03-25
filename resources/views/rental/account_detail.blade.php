@extends('layouts.rental')
@section('content')
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <!--start breadcrumb-->
            <section class="py-3 border-bottom d-none d-md-flex">
                <div class="container">
                    <div class="page-breadcrumb d-flex align-items-center">
                        <h3 class="breadcrumb-title pe-3">Account Details</h3>
                        <div class="ms-auto">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 p-0">
                                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i> Home</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="javascript:;">Account</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Account Details</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </section>
            <!--end breadcrumb-->
            <!--start shop cart-->
            <section class="py-4">
                <div class="container">
                    <h3 class="d-none">Account</h3>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="card shadow-none mb-3 mb-lg-0">
                                        <div class="card-body">
                                            <div class="list-group list-group-flush">
                                                <a href="{{route('rental.dashboard')}}" class="list-group-item d-flex justify-content-between align-items-center bg-transparent">Dashboard <i class='bx bx-tachometer fs-5'></i></a>
                                                <a href="{{route('rental.bookings')}}" class="list-group-item d-flex justify-content-between align-items-center bg-transparent">Bookings <i class='bx bx-cart-alt fs-5'></i></a>
                                                <a href="{{route('rental.purchases')}}" class="list-group-item d-flex justify-content-between align-items-center bg-transparent">Purchases <i class='bx bx-download fs-5'></i></a>
                                                <a href="{{route('rental.payment_method')}}" class="list-group-item d-flex justify-content-between align-items-center bg-transparent">Payment Methods <i class='bx bx-credit-card fs-5'></i></a>
                                                <a href="{{route('rental.account_detail')}}" class="list-group-item d-flex justify-content-between align-items-center active">Account Details <i class='bx bx-user-circle fs-5'></i></a>
                                                <a href="javascript:void(0)" onclick="$('#logout-form').submit();" class="list-group-item d-flex justify-content-between align-items-center bg-transparent">Logout <i class='bx bx-log-out fs-5'></i></a>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    @csrf
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="card shadow-none mb-0">
                                        <div class="card-body">
                                            <form class="row g-3" method="POST" action="{{route('update_account_detail')}}">
                                                <div class="col-md-6">
                                                    <label class="form-label">Name</label>
                                                    <input type="text" class="form-control" name="name" value="{{$user->name}}">
                                                </div>
                                                <div class="col-12">
                                                    <label class="form-label">Email address</label>
                                                    <input type="text" class="form-control" value="{{$user->email}}" readonly>
                                                </div>
                                                <div class="col-12">
                                                    <label class="form-label">Current Password</label>
                                                    <input type="text" class="form-control" name="current_password">
                                                </div>
                                                <div class="col-12">
                                                    <label class="form-label">New Password</label>
                                                    <input type="text" class="form-control" name="password">
                                                </div>
                                                <div class="col-12">
                                                    <button type="submit" class="btn btn-light btn-ecomm">Save Changes</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end row-->
                        </div>
                    </div>
                </div>
            </section>
            <!--end shop cart-->
        </div>
    </div>
    <!--end page wrapper -->
@endsection