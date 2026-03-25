@extends('layouts.rental')
@section('content')

<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <!--start breadcrumb-->
        <section class="py-3 border-bottom d-none d-md-flex">
            <div class="container">
                <div class="page-breadcrumb d-flex align-items-center">
                    <h3 class="breadcrumb-title pe-3">Shop Cart</h3>
                    <div class="ms-auto">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i> Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="javascript:;">Shop</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Shop Cart</li>
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
                <div class="shop-cart">
                    <div class="row">
                        <div class="col-12 col-xl-8">
                            <div class="checkout-review">

                                <div class="card  rounded-0 shadow-none">
                                    <div class="card-body">
                                        <h5 class="mb-0">Review Your Order</h5>
                                        <div class="my-3 border-bottom"></div>
                                        <table class="table">
                                            <tr>
                                                <th></th>
                                                <th>Item</th>
                                                <th>Duration</th>
                                                <th>Quantity</th>
                                                <th>Total</th>
                                                <th></th>
                                            </tr>
                                            @php
                                                $total = 0;
                                            @endphp
                                            @foreach ($bookings as $bookingGroup)
                                                @php
                                                    $booking = $bookingGroup->first();
                                                    $bookable = $booking->bookable;
                                                    $subtotal = 0;
                                                    $count_days = 0;
                                                    $count_hours = 0;
                                                    $months = 0;
                                                    $per_month_price = 0;
                                                    $months_total = 0;
                                                    $quantity = 1;
                                                    foreach ($bookingGroup as $booking){
                                                        if ($booking->slot == 'whole day'){
                                                            $count_days++;
                                                        }elseif (json_decode($booking->slot)) {
                                                            $slots = json_decode($booking->slot);
                                                            $count_hours += count($slots);
                                                        } elseif (preg_match('/\d+\s*months/i', $booking->slot)) {
                                                            // This block will be executed when the slot value is something like "3 Months", "6 months", etc.
                                                            // Handle months case here
                                                            $number_months = (int) filter_var($booking->slot, FILTER_SANITIZE_NUMBER_INT);
                                                            $months = $booking->slot;
                                                            if($booking->slot == '3 Months'){
                                                                $per_month_price = $bookable->price_3;
                                                            }elseif ($booking->slot == '6 Months'){
                                                                $per_month_price = $bookable->price_6;
                                                            }elseif ($booking->slot == '9 Months'){
                                                                $per_month_price = $bookable->price_9;
                                                            }elseif ($booking->slot == '12 Months'){
                                                                $per_month_price = $bookable->price_12;
                                                            }
                                                            $total = $per_month_price * $number_months;
                                                            // Your logic for handling months
                                                        }
                                                        $quantity = $booking->quantity;
                                                    }
                                                    if($bookable->type != 'monthly'){
                                                        $count_hours = $count_hours * 2;
                                                        $subtotal =  (($count_days * $bookable->price_daily) + ($count_hours * $bookable->price_hourly)) * $quantity;
                                                        $total += $subtotal;
                                                    }
                                                @endphp
                                                <tr>
                                                    <td>
                                                        <div class="cart-img text-center text-lg-start">
                                                            @if ($bookable->hasMedia('gallery'))
                                                                <div class="carousel slide" data-bs-ride="carousel" id="roomCrousel{{$bookable->id}}" style="width: 200px">
                                                                    <div class="carousel-indicators">
                                                                        @foreach ($bookable->getMedia('gallery') as $media)
                                                                            <li data-bs-target="#roomCrousel{{$bookable->id}}" data-bs-slide-to="{{ $loop->index }}" @if ($loop->first) class="active" @endif></li>
                                                                        @endforeach
                                                                    </div>
                                                                    <div class="carousel-inner">
                                                                        @foreach ($bookable->getMedia('gallery') as $media)
                                                                            <div class="carousel-item @if ($loop->first) active @endif">
                                                                                <img src="{{ $media->getUrl() }}" class="d-block w-100" alt="{{ $media->name }}">
                                                                            </div>
                                                                        @endforeach
                                                                    </div>
                                                                    <a class="carousel-control-prev" href="#roomCrousel{{$bookable->id}}" role="button" data-bs-slide="prev">
                                                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                                        <span class="visually-hidden">Previous</span>
                                                                    </a>
                                                                    <a class="carousel-control-next" href="#roomCrousel{{$bookable->id}}" role="button" data-bs-slide="next">
                                                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                                        <span class="visually-hidden">Next</span>
                                                                    </a>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </td>
                                                    <td>
                                                        {{$bookable->name}}
                                                        <br>
                                                        @if($bookable->price_type == 'hour')
                                                            - ${{$bookable->price_hourly}} per {{$bookable->price_type}}
                                                        @elseif($bookable->price_type == 'day')
                                                            - ${{$bookable->price_daily}} per {{$bookable->price_type}}
                                                        @elseif($bookable->price_type == 'both')
                                                            - ${{$bookable->price_daily}} per day
                                                            <br>
                                                            - ${{$bookable->price_hourly}} per hour
                                                        @elseif($bookable->price_type == 'monthly')
                                                            - ${{$per_month_price}}
                                                        @endif

                                                    </td>
                                                    <td>
                                                        @if($bookable->price_type == 'hour')
                                                            {{$count_hours}} hours
                                                        @elseif($bookable->price_type == 'day')
                                                            {{$count_days}} days
                                                        @elseif($bookable->price_type == 'both')
                                                            {{$count_days}} days
                                                            <br>
                                                            {{$count_hours}} hours
                                                        @elseif($bookable->price_type == 'monthly')
                                                            {{$months}}
                                                        @endif
{{--                                                        {{$count}} {{$bookable->price_type}}{{$count > 1 ? 's' : ''  }}--}}
                                                    </td>
                                                    <td>{{$quantity}}</td>
                                                    <td>
                                                        @if($bookable->price_type == 'monthly')
                                                            ${{ $total }}
                                                        @else
                                                            ${{ $subtotal }}
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="text-center">
                                                            <div class="d-flex gap-2 justify-content-center justify-content-lg-end">
                                                                <a href="{{ route('booking.delete', ['bookableType' => strtolower(class_basename($bookable)), 'bookableId' => $bookable->id]) }}" class="btn btn-light rounded-0 btn-ecomm" onclick="event.preventDefault(); document.getElementById('delete-booking-form-{{ $bookable->id }}').submit();"><i class='bx bx-x-circle me-0'></i></a>
                                                                <form id="delete-booking-form-{{ $bookable->id }}" action="{{ route('booking.delete', ['bookableType' => strtolower(class_basename($bookable)), 'bookableId' => $bookable->id]) }}" method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                </form>

                                                                <button type="button" class="btn btn-light btn-sm rounded-0" data-bs-toggle="modal" data-bs-target="#exampleModal{{$bookable->category_id}}{{$bookable->id}}">
                                                                    View
                                                                </button>
                                                                <!-- Modal -->
                                                                <div class="modal fade" id="exampleModal{{$bookable->category_id}}{{$bookable->id}}" tabindex="-1" aria-hidden="true">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title">Order Details</h5>
                                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <h5>Pending booking of {{$bookable->name}} following dates:</h5>
                                                                                <p>Please Complete payment to confirm this booking.</p>
                                                                                @php
                                                                                    $bookings = $bookable->bookings()->where('status', 'pending')->get();
                                                                                @endphp
                                                                                <ul>
                                                                                    @foreach($bookings as $booking)

                                                                                        <li>{{$booking->date}}</li>
                                                                                        @if(json_decode($booking->slot) )
                                                                                            <li>
                                                                                                <ul>
                                                                                                    @foreach(json_decode($booking->slot) as $slot)
                                                                                                        <li>{{$slot}}</li>
                                                                                                    @endforeach
                                                                                                </ul>
                                                                                            </li>
                                                                                        @endif
                                                                                    @endforeach
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                {{--                                                                <a href="javascript:;" class="btn btn-light rounded-0 btn-ecomm"><i class='bx bx-edit'></i> Edit</a>--}}
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            @if(count($orders) > 0)
                                                @foreach ($orders as $order)
                                                    @php
                                                        $equipment = $order->equipment;
                                                        $subtotal = $order->quantity * $equipment->price_daily;
                                                        $total += $subtotal;
                                                    @endphp
                                                    <tr>
                                                        <td>
                                                            <div class="cart-img text-center text-lg-start">
                                                                @if ($equipment->hasMedia('gallery'))
                                                                    <div class="carousel slide" data-bs-ride="carousel" id="roomCrousel{{$equipment->id}}" style="width: 200px">
                                                                        <div class="carousel-indicators">
                                                                            @foreach ($equipment->getMedia('gallery') as $media)
                                                                                <li data-bs-target="#roomCrousel{{$equipment->id}}" data-bs-slide-to="{{ $loop->index }}" @if ($loop->first) class="active" @endif></li>
                                                                            @endforeach
                                                                        </div>
                                                                        <div class="carousel-inner">
                                                                            @foreach ($equipment->getMedia('gallery') as $media)
                                                                                <div class="carousel-item @if ($loop->first) active @endif">
                                                                                    <img src="{{ $media->getUrl() }}" class="d-block w-100" alt="{{ $media->name }}">
                                                                                </div>
                                                                            @endforeach
                                                                        </div>
                                                                        <a class="carousel-control-prev" href="#roomCrousel{{$equipment->id}}" role="button" data-bs-slide="prev">
                                                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                                            <span class="visually-hidden">Previous</span>
                                                                        </a>
                                                                        <a class="carousel-control-next" href="#roomCrousel{{$equipment->id}}" role="button" data-bs-slide="next">
                                                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                                            <span class="visually-hidden">Next</span>
                                                                        </a>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        </td>
                                                        <td>
                                                            {{$equipment->name}}
                                                            <br>
                                                            - ${{$equipment->price_daily}}
                                                        </td>
                                                        <td>-</td>
                                                        <td>
                                                            {{$order->quantity}}
                                                        </td>
                                                        <td>
                                                            ${{ $subtotal }}
                                                        </td>
                                                        <td>
                                                            <div class="text-center">
                                                                <div class="d-flex gap-2 justify-content-center justify-content-lg-end">
                                                                    <a href="{{ route('order.delete', $order->id) }}" class="btn btn-light rounded-0 btn-ecomm" ><i class='bx bx-x-circle me-0'></i></a>

                                                                    {{--                                                                <a href="javascript:;" class="btn btn-light rounded-0 btn-ecomm"><i class='bx bx-edit'></i> Edit</a>--}}
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                            <tr>
                                                <td colspan="4" class="text-center">Sub Total</td>
                                                <td>${{$total}}</td>
                                            </tr>
                                            <tr>
                                                <td colspan="4" class="text-center">Insurance</td>
                                                <td>
                                                    @php
                                                        $settings = \App\Models\Setting::first();
                                                    @endphp
                                                    +{{$settings->insurance_percentage}}%
                                                    <br>
                                                    @php
                                                        $total = $total * (1 + $settings->insurance_percentage / 100);
                                                    @endphp
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="4" class="text-center">Total</td>
                                                <td>${{$total}}</td>
                                            </tr>

                                        </table>

                                    </div>
                                </div>
                                <div class="card rounded-0 shadow-none">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="payment-mode">
                                                    <h5 class="mb-3">Payment Mode:</h5>
                                                    @php
                                                        $user = \Illuminate\Support\Facades\Auth::user();
                                                        $intent = $user->createSetupIntent();
                                                    @endphp
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
                                </div>
                                <div class="card rounded-0 shadow-none">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="d-grid">
                                                    <a href="{{route('rental')}}" class="btn btn-light btn-ecomm"><i class="bx bx-chevron-left"></i>Continue Shopping</a>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="d-grid">
                                                    @if ($user->hasPaymentMethod() && (count($orders) > 0 || count($bookings) > 0) )
                                                        <a href="{{route('rental.complete_orders')}}" class="btn btn-white btn-ecomm">Complete Order<i class="bx bx-chevron-right"></i></a>
                                                    @else
                                                        <button class="btn btn-white btn-ecomm" disabled>Complete Order<i class="bx bx-chevron-right"></i></button>
                                                    @endif
                                                </div>
                                            </div>
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