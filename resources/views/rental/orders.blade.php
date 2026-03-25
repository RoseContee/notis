@extends('layouts.rental')
@section('content')

<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <!--start breadcrumb-->
        <section class="py-3 border-bottom d-none d-md-flex">
            <div class="container">
                <div class="page-breadcrumb d-flex align-items-center">
                    <h3 class="breadcrumb-title pe-3">My Bookings</h3>
                    <div class="ms-auto">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i> Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="javascript:;">Account</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">My Bookings</li>
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
                                            <a href="{{route('rental.bookings')}}" class="list-group-item active d-flex justify-content-between align-items-center">Bookings <i class='bx bx-cart-alt fs-5'></i></a>
                                            <a href="{{route('rental.purchases')}}" class="list-group-item d-flex justify-content-between align-items-center bg-transparent">Purchases <i class='bx bx-download fs-5'></i></a>
                                            <a href="{{route('rental.payment_method')}}" class="list-group-item d-flex justify-content-between align-items-center bg-transparent">Payment Methods <i class='bx bx-credit-card fs-5'></i></a>
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
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead class="table-light">
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Name</th>
                                                    <th>Created at</th>
                                                    <th>Status</th>
                                                    <th>Total</th>
                                                    <th>Actions</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @php
                                                    $bookings = $user->bookings()
                                                            ->where('status', 'pending')
                                                            ->with('bookable')
                                                            ->get()
                                                            ->groupBy(function ($booking) {
                                                                return $booking->bookable_type . '-' . $booking->bookable_id;
                                                            });
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
                                                        }
                                                        if($bookable->type != 'monthly'){
                                                            $count_hours = $count_hours * 2;
                                                            $subtotal =  ($count_days * $bookable->price_daily) + ($count_hours * $bookable->price_hourly);
                                                            $total += $subtotal;
                                                        }
                                                    @endphp
                                                    <tr>
                                                        <td>#{{$bookable->id}}</td>
                                                        <td>{{$bookable->name}}</td>
                                                        <td>{{$bookable->bookings[0]->created_at}}</td>
                                                        <td>
                                                            <div class="badge rounded-pill bg-warning w-100">Pending</div>
                                                        </td>
                                                        <td>${{$subtotal}}
                                                            @if($bookable->price_type == 'day')
                                                                for {{$count_days}} {{$bookable->price_type}}{{$count_days > 1 ? 's' : ''  }}
                                                            @elseif($bookable->price_type == 'hour')
                                                                for {{$count_hours}} {{$bookable->price_type}}{{$count_hours > 1 ? 's' : ''  }}
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <div class="d-flex gap-2">
                                                                <!-- Button trigger modal -->
                                                                <button type="button" class="btn btn-light btn-sm rounded-0" data-bs-toggle="modal" data-bs-target="#exampleModal{{$bookable->id}}">
                                                                    View
                                                                </button>
                                                                <!-- Modal -->
                                                                <div class="modal fade" id="exampleModal{{$bookable->id}}" tabindex="-1" aria-hidden="true">
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
                                                                <a href="{{route('rental.checkout')}}" class="btn btn-light btn-sm rounded-0">Pay</a>
                                                                <a href="{{ route('booking.delete', ['bookableType' => strtolower(class_basename($bookable)), 'bookableId' => $bookable->id]) }}" class="btn btn-light btn-sm rounded-0" onclick="event.preventDefault(); document.getElementById('delete-booking-form-{{ $bookable->id }}').submit();">Cancel</a>
                                                                <form id="delete-booking-form-{{ $bookable->id }}" action="{{ route('booking.delete', ['bookableType' => strtolower(class_basename($bookable)), 'bookableId' => $bookable->id]) }}" method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                </form>

                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach



                                                @php
                                                    $bookings = $user->bookings()
                                                            ->where('status', 'confirmed')
                                                            ->with('bookable')
                                                            ->get()
                                                            ->groupBy(function ($booking) {
                                                                return $booking->bookable_type . '-' . $booking->bookable_id;
                                                            });
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
                                                        }
                                                        if($bookable->type != 'monthly'){
                                                            $count_hours = $count_hours * 2;
                                                            $subtotal =  ($count_days * $bookable->price_daily) + ($count_hours * $bookable->price_hourly);
                                                            $total += $subtotal;
                                                        }
                                                    @endphp
                                                    <tr>
                                                        <td>#{{$bookable->id}}</td>
                                                        <td>{{$bookable->name}}</td>
                                                        <td>{{$bookable->bookings[0]->created_at}}</td>
                                                        <td>
                                                            <div class="badge rounded-pill bg-success w-100">Completed</div>
                                                        </td>
                                                        <td>${{$subtotal}}
                                                            @if($bookable->price_type == 'day')
                                                                for {{$count_days}} {{$bookable->price_type}}{{$count_days > 1 ? 's' : ''  }}
                                                            @elseif($bookable->price_type == 'hour')
                                                                for {{$count_hours}} {{$bookable->price_type}}{{$count_hours > 1 ? 's' : ''  }}
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <div class="d-flex gap-2">
                                                                <!-- Button trigger modal -->
                                                                <button type="button" class="btn btn-light btn-sm rounded-0" data-bs-toggle="modal" data-bs-target="#aexampleModal{{$bookable->id}}">
                                                                    View
                                                                </button>
                                                                <!-- Modal -->
                                                                <div class="modal fade" id="aexampleModal{{$bookable->id}}" tabindex="-1" aria-hidden="true">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title">Order Details</h5>
                                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <h5>Completed booking of {{$bookable->name}} following dates:</h5>
                                                                                @php
                                                                                    $bookings = $bookable->bookings()->where('status', 'confirmed')->get();
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

                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach

                                                </tbody>
                                            </table>
                                        </div>
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