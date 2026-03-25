@extends('layouts.rental')
@section('content')
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <!--start breadcrumb-->
            <section class="py-3 border-bottom d-none d-md-flex">
                <div class="container">
                    <div class="page-breadcrumb d-flex align-items-center">
                        <h3 class="breadcrumb-title pe-3">Hire Notis Studios</h3>
                        <div class="ms-auto">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 p-0">
                                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i> Home</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="javascript:;">Pages</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Hire</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </section>
            <!--end breadcrumb-->
            <!--start page content-->
            <section class="py-4">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="p-3 bg-dark-1">
                                <form method="POST" action="{{route('rental.hire.post')}}">
                                    @csrf
                                    <div class="form-body">
                                        <div class="my-3 border-bottom"></div>
                                        <div class="mb-3">
                                            <label class="form-label">Enter Your Name</label>
                                            <input type="text" class="form-control" name="name" value="{{\Illuminate\Support\Facades\Auth::user()->name ?? ''}}" required />
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Enter Email</label>
                                            <input type="email" class="form-control" name="email" value="{{\Illuminate\Support\Facades\Auth::user()->email ?? ''}}" required/>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Phone Number</label>
                                            <input type="text" class="form-control" name="phone" />
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Message</label>
                                            <textarea class="form-control" rows="4" cols="4" name="message"></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <button type="submit" class="btn btn-light btn-ecomm">Send Message</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="p-3 bg-dark-1">
                                <div class="address mb-3">
                                    <p class="mb-0 text-uppercase text-white">Address</p>
                                    <p class="mb-0 font-12">2414 N Westtminster Rd. Spencer, Oklahoma, 73084</p>
                                </div>
                                <div class="phone mb-3">
                                    <p class="mb-0 text-uppercase text-white">Phone</p>
                                    <p class="mb-0 font-13">(405) 437-4820</p>
                                </div>
                                <div class="email mb-3">
                                    <p class="mb-0 text-uppercase text-white">Email</p>
                                    <p class="mb-0 font-13">info@notisstudios.com</p>
                                </div>
                                <div class="working-days mb-3">
                                    <p class="mb-0 text-uppercase text-white">WORKING DAYS</p>
                                    <p class="mb-0 font-13">Mon -  Sat / 8am - 6pm</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end row-->
                </div>
            </section>
            <!--end start page content-->
        </div>
    </div>
    <!--end page wrapper -->
@endsection