<h1>New Order Received</h1>
<br>
<b>Name:</b> {{$name}}<br>
<b>Email:</b> {{$email}}<br>
@php
    $user = \App\Models\User::where('email', $email)->first();

@endphp
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
            foreach ($bookingGroup as $booking){
                if ($booking->slot == 'whole day'){
                    $count_days++;
                }else{
                    $slots = json_decode($booking->slot);
                    $count_hours += count($slots);
                }
            }
            $count_hours = $count_hours * 2;
            $subtotal =  ($count_days * $bookable->price_daily) + ($count_hours * $bookable->price_hourly);
        @endphp
        <tr>
            <td>#{{$bookable->id}}</td>
            <td>{{$bookable->name}}</td>
            <td>{{$bookable->bookings[0]->created_at}}</td>

            <td>${{$subtotal}}
                @if($bookable->price_type == 'day')
                    for {{$count_days}} {{$bookable->price_type}}{{$count_days > 1 ? 's' : ''  }}
                @elseif($bookable->price_type == 'hour')
                    for {{$count_hours}} {{$bookable->price_type}}{{$count_hours > 1 ? 's' : ''  }}
                @endif
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
            foreach ($bookingGroup as $booking){
                if ($booking->slot == 'whole day'){
                    $count_days++;
                }else{
                    $slots = json_decode($booking->slot);
                    $count_hours += count($slots);
                }
            }
            $count_hours = $count_hours * 2;
            $subtotal =  ($count_days * $bookable->price_daily) + ($count_hours * $bookable->price_hourly);
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

        </tr>
    @endforeach

    </tbody>
</table>