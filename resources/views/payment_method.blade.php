@extends('layouts.front')

@section('content')

    <div class="content-wrap mt-5">
        <div class="container pt-5 pb-7">
            <div class="row gy-6 gx-6">
                <div class="col-12 col-xl order-5">
                    <div class="flq-account-content" data-sr data-sr-delay="300" data-sr-duration="1200" data-sr-distance="10">
                        @if (env('APP_ENV') === 'local' && $user->hasPaymentMethod())
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
                                    <button type="button" id="card-button" data-secret="{{ isset($intent->client_secret) ? $intent->client_secret : '' }}" class="btn btn-lg btn-success btn-block">Add</button>
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
                @include('includes.profile-sidebar')
            </div>
        </div>
    </div>

@endsection