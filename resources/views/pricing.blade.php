@extends('layouts.front')

@section('content')

    <div class="flq-background py-7">

        <div class="flq-background-overlay" style="background-color: hsla(var(--flq-color-black), 0.8);"></div>
        <div class="container text-center" data-sr="banner-text" data-sr-interval="100" data-sr-distance="10" data-sr-duration="1000">
            <h1 class="display-5 mb-1" data-sr-item="banner-text">Pricing</h1>
            <nav aria-label="breadcrumb" data-sr-item="banner-text">
                <ol class="breadcrumb flq-color-opacity">
                    <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Pricing</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="content-wrap">
        <div class="py-7 flq-background-color-100" style="background-image: radial-gradient(100% 100% at 50% 0%, hsla(var(--flq-color-brand), 0.14) 25%, hsla(var(--flq-color-background), 0) 100%);">
            <div class="container" data-sr="pricing" data-sr-interval="150" data-sr-duration="1200" data-sr-distance="30">
                <div class="row align-items-center justify-content-center g-5">
                    @foreach($subscriptions as $subscription)
                        @php
                        if ($subscription->days){
                            $duration = $subscription->days .'-days';
                            if ($subscription->days == 30){
                                $duration = '1-month';
                            }elseif ($subscription->days == 60){
                                $duration = '2-months';
                            }elseif ($subscription->days == 90){
                                $duration = '3-months';
                            }elseif ($subscription->days == 180){
                                $duration = '6-months';
                            }elseif ($subscription->days == 365){
                                $duration = '1-year';
                            }
                        }else{
                            $duration = 'Life Time';
                        }
                        @endphp
                        <div class="col-12 col-sm-10 col-md-6 col-lg-5 col-xl-4 pricing" data-sr-item="pricing">
                            <div class="card flq-card-pricing">
                                <div class="card-head">
                                    <div class="card-subtitle h6">{{$duration}} plan</div>
                                    <div class=" h1">${{$subscription->recurring_price > 0 ? $subscription->recurring_price : $subscription->onet_time_price}}</div>
                                </div>
                                <div class="card-body flq-vertical-rhythm">
                                    {!! $subscription->description !!}
                                    <ul>
                                        @if($subscription->recurring > 0 && $subscription->onet_time_price > 0)
                                            <li>One Time Admin Fee: ${{$subscription->onet_time_price}}</li>
                                        @endif
                                        <li>Number of Profiles: {{$subscription->number_of_profiles}}</li>
                                        <li>Number of Simultaneous Streaming: {{$subscription->number_of_streaming}}</li>
                                        <li>Up to 4k Streams</li>
                                        <li>Multi Platform (Roku, Fire TV)</li>
                                        <li>Secure Connection</li>
                                    </ul>
                                </div>
                                <div class="card-footer">
                                    @if(\Illuminate\Support\Facades\Auth::check())
                                        @php
                                            $user = \Illuminate\Support\Facades\Auth::user();
                                            $userSubscriptions = $user->p_subscriptions()->pluck('p_subscriptions_user.p_subscription_id')->toArray();
                                        @endphp
                                        @if(in_array($subscription->id, $userSubscriptions))
                                            <button type="button" class="btn btn-block btn-outline btn-brand-hover" disabled>
                                                Current Subscription
                                                <br>
                                                @php
                                                    $sub = $user->p_subscriptions()->where('p_subscription_id', $subscription->id)->first();
                                                @endphp
                                                Status: {{$sub->pivot->status}}
                                                <br>
                                                Expire at: {{date("m-d-Y", strtotime($sub->pivot->expire_at))}}

                                            </button>
                                            <br>
                                            @if($sub->pivot->type == 'stripe' && $sub->pivot->status == 'active')
                                                <a onclick="return confirm('Are you sure you want to Cancel this subscription?');" class="btn btn-block btn-outline btn-brand-hover" href="{{route('stripe.cancel_subscription')}}" >Cancel Subscription</a>
                                            @elseif($sub->pivot->type == 'paypal' && $sub->pivot->status == 'active')
                                                <a onclick="return confirm('Are you sure you want to Cancel this subscription?');" class="btn btn-block btn-outline btn-brand-hover" href="{{route('paypal.cancel_subscription')}}" >Cancel Subscription</a>
                                            @endif
                                        @else
                                            <button type="button" class="btn btn-block btn-outline btn-brand-hover getDealBtn" data-planId="{{$subscription->id}}" data-paypalId="{{$subscription->paypal_id}}">
                                                Subscribe Now
                                            </button>
                                        @endif

                                    @else
                                        <button class="btn btn-block btn-outline btn-brand-hover" data-fancybox data-src="#flq_popup_signin" data-base-class="flq-fancybox-signin" data-animation-duration="1000" data-keyboard="false" data-auto-focus="false" data-touch="false" data-close-existing="true" data-small-btn="false" data-toolbar="false"> Sign Up </button>
                                    @endif
                                </div>
                            </div>
                        </div>

                    @endforeach

                    @if(\Illuminate\Support\Facades\Auth::check())
                            <div class="col-12 col-sm-10 col-md-6 col-lg-5 col-xl-4 allPaymentMethods d-none" data-sr-item="pricing">
                                @if($settings->stripe)
                                    <div class="card flq-card-pricing payment_methods">
                                        <div class="card-head">
                                            <div class="card-subtitle h1">Stripe</div>
                                        </div>
                                        <div class="card-footer">
                                            @if($user->hasPaymentMethod())
                                                <button type="button" class="btn btn-block btn-outline btn-brand-hover paymentMethodBtn paymentMethodBtnStripe">
                                                    Stripe
                                                </button>
                                            @else
                                                <button type="button" class="btn btn-block btn-outline btn-brand-hover paymentMethodBtn getPaymentMethodStripe">
                                                    Stripe
                                                </button>
                                            @endif
                                        </div>
                                    </div>
                                @endif
                                    <br>
                                @if($settings->paypal)
                                    <div class="card flq-card-pricing payment_methods">
                                        <div class="card-head">
                                            <div class="card-subtitle h1">Paypal</div>
                                        </div>
                                        <div class="card-footer">
                                            <button type="button" class="btn btn-block btn-outline btn-brand-hover paymentMethodBtn paymentMethodBtnPaypal">
                                                Paypal
                                            </button>
                                        </div>
                                    </div>
                                @endif
                            </div>

                        @if($settings->stripe && \Illuminate\Support\Facades\Auth::check())
                            @if($user->hasPaymentMethod())

                                <div class="col-12 col-sm-10 col-md-6 col-lg-5 col-xl-4 stripePaymentForm d-none" data-sr-item="pricing">
                                </div>
                            @else
                                    <div class="col-12 col-sm-10 col-md-6 col-lg-5 col-xl-4 stripePaymentMethodForm d-none" data-sr-item="pricing">
                                        <h5><u>Add Payment Method</u></h5>
                                        <form action="{{route('add_payment_method')}}" method="POST" id="subscribe-form">
                                            @csrf
                                            <input type="hidden" name="plan" id="plan_id">
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
                                                <button type="button" id="card-button" data-secret="{{ $intent ? $intent->client_secret : '' }}" class="btn btn-lg btn-success btn-block">Subscribe Now</button>
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
                                    </div>
                            @endif
                        @endif
                        @if($settings->paypal)
                            <div class="col-12 col-sm-10 col-md-6 col-lg-5 col-xl-4 paypalPaymentForm d-none" data-sr-item="pricing">
                                <div style=" width: 40%; margin: auto; margin-top: 10%" class="paypal-button-container" id=""></div>
                            </div>
                        @endif
                    @endif

                </div>
            </div>
        </div>

        <div class="py-7">
            <div class="container">
                <div class="accordion" data-sr="accordion" data-sr-interval="100" data-sr-duration="1000" data-sr-distance="10">
                    <div class="accordion-item" data-sr-item="accordion">
                        <h2 class="accordion-header h5">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq-1" aria-expanded="true" aria-controls="faq-1"> How does subscription works? <span class="accordion-button-icon"></span>
                            </button>
                        </h2>
                        <div id="faq-1" class="accordion-collapse collapse  show">
                            <div class="accordion-body">
                                <p>Our subscriptions are monthly and gives you access to our entire library.</p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item" data-sr-item="accordion">
                        <h2 class="accordion-header h5">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-2" aria-expanded="false" aria-controls="faq-2"> How many profiles can I have? <span class="accordion-button-icon"></span>
                            </button>
                        </h2>
                        <div id="faq-2" class="accordion-collapse collapse">
                            <div class="accordion-body">
                                <p>Each subscription comes with 5 profiles, however, only two of the profile can stream at the same time.</p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item" data-sr-item="accordion">
                        <h2 class="accordion-header h5">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-3" aria-expanded="false" aria-controls="faq-3"> Where can I watch at? <span class="accordion-button-icon"></span>
                            </button>
                        </h2>
                        <div id="faq-3" class="accordion-collapse collapse">
                            <div class="accordion-body">
                                <p>You can stream on the web, on Roku TV, and on Amazon Fire TV.</p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item" data-sr-item="accordion">
                        <h2 class="accordion-header h5">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-4" aria-expanded="false" aria-controls="faq-4"> How do I cancel my subscription? <span class="accordion-button-icon"></span>
                            </button>
                        </h2>
                        <div id="faq-4" class="accordion-collapse collapse">
                            <div class="accordion-body">
                                <p>You can cancel at anytime by simply clicking on pricing and clicking cancel under your subscription.</p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item" data-sr-item="accordion">
                        <h2 class="accordion-header h5">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq-5" aria-expanded="false" aria-controls="faq-5"> Can I get a refund? <span class="accordion-button-icon"></span>
                            </button>
                        </h2>
                        <div id="faq-5" class="accordion-collapse collapse">
                            <div class="accordion-body">
                                <p>There is not refund after payment.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


@endsection

@section('script')
    @if(\Illuminate\Support\Facades\Auth::check() && $settings->paypal)
        <script src="https://www.paypal.com/sdk/js?client-id={{$settings->paypal_key}}&vault=true&intent=subscription" data-sdk-integration-source="button-factory"></script>
        <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    @endif
    <script>
        $(".getDealBtn").click(function(){
            $(this).prop('disabled', true);
            var planId = $(this).attr("data-planId");
            var paypalId = $(this).attr("data-paypalId");

            if(planId){
                $(".pricing").not($(this).closest(".pricing")).hide();

                $(".paymentMethodBtn").attr("data-planid", planId);

                $(".allPaymentMethods").removeClass('d-none')
                $(".allPaymentMethods").css('opacity', '1');

                var div = $(this).attr("href");
                $('html, body').animate({
                    scrollTop: $(".allPaymentMethods").offset().top
                }, 100);
            }


            // For Stripe Get Payment Method Button
            $(".getPaymentMethodStripe").click(function(){
                $(this).prop('disabled', true);
                $('#plan_id').val(planId)

                $(".payment_methods").not($(this).closest(".payment_methods")).hide();
                $(".stripePaymentMethodForm").removeClass('d-none')
                $(".stripePaymentMethodForm").css('opacity', '1');
            });

            // For Stripe Button
            $(".paymentMethodBtnStripe").click(function(){
                $(this).prop('disabled', true);

                url = "{{route('get_stripePaymentForm')}}";
                $.get(url, {planId: planId}, function(data) {
                    $(".stripePaymentForm").html(data)
                }).fail(function(xhr, status, error) {
                    console.log(error);
                });

                $(".payment_methods").not($(this).closest(".payment_methods")).hide();
                $(".stripePaymentForm").removeClass('d-none')
                $(".stripePaymentForm").css('opacity', '1');
            });


            // For Paypal Button
            $(".paymentMethodBtnPaypal").click(function(){
                $(this).prop('disabled', true);

                $(".payment_methods").not($(this).closest(".payment_methods")).hide();
                $(".paypalPaymentForm").removeClass('d-none')
                $(".paypalPaymentForm").css('opacity', '1');

                $(".paypal-button-container").attr('id',   'paypal-button-container-' + paypalId);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                paypal.Buttons({
                    style: {
                        shape: 'rect',
                        color: 'gold',
                        layout: 'vertical',
                        label: 'subscribe'
                    },
                    createSubscription: function(data, actions) {
                        return actions.subscription.create({
                            /* Creates the subscription */
                            plan_id: paypalId
                        });
                    },
                    onApprove: function(data, actions) {
                        console.log(data)
                        var paypal_subscription_id = data.subscriptionID;
                        var subscription_id = planId;
                        $.ajax({
                            type:'POST',
                            url:"{{ route('paypal_modal_success') }}",
                            data:{subscription_id:subscription_id, paypal_subscription_id:paypal_subscription_id},
                            success:function(data){
                                window.location.href = "/";
                            }
                        });
                    }
                }).render('#paypal-button-container-'+paypalId); // Renders the PayPal button

            });

        });

    </script>
@endsection
