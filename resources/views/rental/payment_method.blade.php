@extends('layouts.rental')
@section('content')
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <!--start breadcrumb-->
            <section class="py-3 border-bottom d-none d-md-flex">
                <div class="container">
                    <div class="page-breadcrumb d-flex align-items-center">
                        <h3 class="breadcrumb-title pe-3">My Orders</h3>
                        <div class="ms-auto">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 p-0">
                                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i> Home</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="javascript:;">Account</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">My Orders</li>
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
                                                <a href="{{route('rental.payment_method')}}" class="list-group-item d-flex justify-content-between align-items-center active">Payment Methods <i class='bx bx-credit-card fs-5'></i></a>
                                                <a href="{{route('rental.account_detail')}}" class="list-group-item d-flex justify-content-between align-items-center bg-transparent">Account Details <i class='bx bx-user-circle fs-5'></i></a>
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
                                            @if ($user->hasPaymentMethod())
                                                @php
                                                    $paymentMethod = $user->paymentMethods()[0];
                                                    $last4 = $paymentMethod->card->last4;
                                                    $brand = $paymentMethod->card->brand;
                                                @endphp
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h5><u>Default Payment method</u></h5>
                                                        Card Type:<h5> {{$brand}}</h5>
                                                        Last 4 digits:<h5> {{$last4}}</h5>
                                                        <a href="{{route('delete_payment_method')}}" class="btn btn-danger">Delete</a>
                                                    </div>
                                                </div>
                                            @else
                                                <h5><u>Add Payment Method</u></h5>
                                                <form action="{{route('add_payment_method')}}" method="POST" id="subscribe-form">
                                                    @csrf
                                                    <div class="form-row">
                                                        <label for="card-element">Card Holder Name</label>
                                                        <input id="card-holder-name" class="form-control" type="text">
                                                    </div>
                                                    @csrf
                                                    <div class="form-row">
                                                        <label for="card-element">Credit or debit card</label>
                                                        <div id="card-element" class="form-control">
                                                        </div>
                                                        <!-- Used to display form errors. -->
                                                        <div id="card-errors" role="alert"></div>
                                                    </div>
                                                    <div class="stripe-errors"></div>
                                                    @if (count($errors) > 0)
                                                        <div class="alert alert-danger">
                                                            @foreach ($errors->all() as $error)
                                                                {{ $error }}<br>
                                                            @endforeach
                                                        </div>
                                                    @endif
                                                    <div class="form-group text-center mt-3">
                                                        <button type="button" id="card-button" data-secret="{{ $intent->client_secret }}" class="btn btn-lg btn-success btn-block">Add</button>
                                                    </div>
                                                </form>
                                                <script src="https://js.stripe.com/v3/"></script>
                                                <script>
                                                    var stripe = Stripe('{{ env('STRIPE_KEY') }}');
                                                    var elements = stripe.elements();
                                                    var style = {
                                                        base: {
                                                            color: '#32325d',
                                                            fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                                                            fontSmoothing: 'antialiased',
                                                            fontSize: '16px',
                                                            '::placeholder': {
                                                                color: '#aab7c4'
                                                            }
                                                        },
                                                        invalid: {
                                                            color: '#fa755a',
                                                            iconColor: '#fa755a'
                                                        }
                                                    };
                                                    var card = elements.create('card', {hidePostalCode: true,
                                                        style: style});
                                                    card.mount('#card-element');
                                                    card.addEventListener('change', function(event) {
                                                        var displayError = document.getElementById('card-errors');
                                                        if (event.error) {
                                                            displayError.textContent = event.error.message;
                                                        } else {
                                                            displayError.textContent = '';
                                                        }
                                                    });
                                                    const cardHolderName = document.getElementById('card-holder-name');
                                                    const cardButton = document.getElementById('card-button');
                                                    const clientSecret = cardButton.dataset.secret;
                                                    cardButton.addEventListener('click', async (e) => {
                                                        console.log("attempting");
                                                        const { setupIntent, error } = await stripe.confirmCardSetup(
                                                            clientSecret, {
                                                                payment_method: {
                                                                    card: card,
                                                                    billing_details: { name: cardHolderName.value }
                                                                }
                                                            }
                                                        );
                                                        if (error) {
                                                            var errorElement = document.getElementById('card-errors');
                                                            errorElement.textContent = error.message;
                                                        } else {
                                                            paymentMethodHandler(setupIntent.payment_method);
                                                        }
                                                    });
                                                    function paymentMethodHandler(payment_method) {
                                                        var form = document.getElementById('subscribe-form');
                                                        var hiddenInput = document.createElement('input');
                                                        hiddenInput.setAttribute('type', 'hidden');
                                                        hiddenInput.setAttribute('name', 'payment_method');
                                                        hiddenInput.setAttribute('value', payment_method);
                                                        form.appendChild(hiddenInput);
                                                        form.submit();
                                                    }
                                                </script>
                                            @endif
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