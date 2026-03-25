<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Equipment;
use App\Models\Room;

class BookingController extends Controller
{
    public function store_slots(Request $request)
    {
        $bookableId = $request->id;
        $bookableType = $request->type;
        $date = $request->date;
        $bookable = $bookableType === 'room' ? Room::findOrFail($bookableId) : Equipment::findOrFail($bookableId);
        $user_id = auth()->id();

        $booking = Booking::where('date', $date)
            ->where('bookable_id', $bookableId)
            ->where('bookable_type', $bookableType == 'room' ? Room::class : Equipment::class)
            ->where('status', '!=' ,'confirmed')
            ->where('user_id', $user_id)
            ->first();

        // Create new booking
        $bookingSlots = $request->checkboxValues;
        $bookingSlots = json_encode($bookingSlots);

        if ($booking){
            $booking->update(['slot' => $bookingSlots,]);
        }else{
            $status = 'pending';
            $user = Auth::user();
            if($user->hasRole('super_admin') || $user->hasRole('admin'))
            {
                $status = 'confirmed';
            }
            $booking = new Booking([
                'date' => $date,
                'slot' => $bookingSlots,
                'user_id' => $user_id,
                'status' => $status
            ]);
            $bookable->bookings()->save($booking);
        }

        return response()->json([
            'status' => 'success',
            'message' => $bookable->name.' added to cart'
        ]);
    }

    public function store_special_days(Request $request){
        $bookableId = $request->id;
        $bookableType = $request->type;
        $bookable = $bookableType === 'room' ? Room::findOrFail($bookableId) : Equipment::findOrFail($bookableId);
        $user_id = auth()->id();

        foreach ($request->dates as $date){
            $date = \Carbon\Carbon::parse($date)->format('Y-m-d');

            $booking = Booking::where('date', $date)
                ->where('bookable_id', $bookableId)
                ->where('bookable_type', $bookableType == 'room' ? Room::class : Equipment::class)
                ->where('status', '!=' ,'confirmed')
                ->where('user_id', $user_id)
                ->first();

            if (!$booking){
                // Check if there is any confirmed booking for this date
                $confirmedBooking = Booking::where('date', $date)
                    ->where('bookable_id', $bookableId)
                    ->where('bookable_type', $bookableType == 'room' ? Room::class : Equipment::class)
                    ->where('status', 'confirmed')
                    ->first();
                if(!$confirmedBooking){
                    $status = 'pending';
                    $user = Auth::user();
                    if($user->hasRole('super_admin') || $user->hasRole('admin'))
                    {
                        $status = 'confirmed';
                    }
                    $booking = new Booking([
                        'date' => $date,
                        'slot' => 'whole day',
                        'user_id' => $user_id,
                        'status' => $status
                    ]);
                    $bookable->bookings()->save($booking);
                }
            }

        }
        return response()->json([
            'status' => 'success',
            'message' => $bookable->name.' added to cart'
        ]);
    }

    public function store_consective_days(Request $request){
        $bookableId = $request->id;
        $bookableType = $request->type;
        $bookable = $bookableType === 'room' ? Room::findOrFail($bookableId) : Equipment::findOrFail($bookableId);
        $user_id = auth()->id();

        $start_date = $request->start_date;
        $end_date = $request->end_date;

        $dates = \Carbon\CarbonPeriod::create($start_date, $end_date);

        foreach ($dates as $date) {
            $date = $date->format('Y-m-d');

            $booking = Booking::where('date', $date)
                ->where('bookable_id', $bookableId)
                ->where('bookable_type', $bookableType == 'room' ? Room::class : Equipment::class)
                ->where('status', '!=' ,'confirmed')
                ->where('user_id', $user_id)
                ->first();
            if (!$booking){
                // Check if there is any confirmed booking for this date
                $confirmedBooking = Booking::where('date', $date)
                    ->where('bookable_id', $bookableId)
                    ->where('bookable_type', $bookableType == 'room' ? Room::class : Equipment::class)
                    ->where('status', 'confirmed')
                    ->first();
                if(!$confirmedBooking){
                    $status = 'pending';
                    $user = Auth::user();
                    if($user->hasRole('super_admin') || $user->hasRole('admin'))
                    {
                        $status = 'confirmed';
                    }
                    $booking = new Booking([
                        'date' => $date,
                        'slot' => 'whole day',
                        'user_id' => $user_id,
                        'status' => $status,
                        'quantity' => $request->quantity
                    ]);
                    $bookable->bookings()->save($booking);
                }
            }

        }
        return response()->json([
            'status' => 'success',
            'message' => $bookable->name.' added to cart'
        ]);
    }


    public function boooking_modal(){
        return view('includes.booking_modal');
    }

    public function checkDaysAvailability(Request $request){
        $bookableId = $request->id;
        $bookableType = $request->type;

        $booking_confirmed = Booking::where('bookable_id', $bookableId)
            ->where('bookable_type', $bookableType == 'room' ? Room::class : Equipment::class)
            ->where('status', 'confirmed')
            ->whereDate('date', '>=', now()->format('Y-m-d'))
            ->pluck('date')
            ->toArray();

        return $booking_confirmed;
    }
    public function checkAvailability(Request $request)
    {
        $bookableId = $request->id;
        $bookableType = $request->type;
        $date = $request->date;
        $now = Carbon::now();
        $dateInstance = Carbon::parse($date);
        $isPast = $dateInstance->isBefore($now) && !$dateInstance->isSameDay($now);
        if ($isPast) {
            return response()->json([
                'status' => 'error',
                'message' => 'Can\'t select past date'
            ]);
        }

        // Find the bookable based on the type and ID
        $bookable = $bookableType === 'room' ? Room::findOrFail($bookableId) : Equipment::findOrFail($bookableId);



        if ($bookable->price_type === 'day' || $bookable->price_type === 'both') {

            $booking_confirmed = Booking::where('bookable_id', $bookableId)
                ->where('bookable_type', $bookableType == 'room' ? Room::class : Equipment::class)
                ->where('date', $date)
                ->where('status', 'confirmed')
                ->where('slot', 'whole day')
                ->first();

            if ($booking_confirmed) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'This date is already booked'
                ]);
            }

            $booking_pending = Booking::where('bookable_id', $bookableId)
                ->where('bookable_type', $bookableType == 'room' ? Room::class : Equipment::class)
                ->where('date', $date)
                ->where('status', 'pending')
                ->where('user_id', auth()->id())
                ->where('slot', 'whole day')
                ->first();

            if ($booking_pending) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'You have already booked this date, please complete the payment.'
                ]);
            }

        }
        if ($bookable->price_type === 'day'){
            return response()->json([
                'status' => 'available',
                'type' => $bookable->price_type,
            ]);
        }else{
            // Hourly and Both bookings
            $slots = ['9:00am - 11:00am', '11:00am - 01:00pm', '01:00pm - 03:00pm', '03:00pm - 05:00pm'];
            $currentTime = Carbon::now();
            $endOfDay = Carbon::createFromTime(17, 0); // 5 pm

            // Filter the slots based on the current time and up to 5 pm
            $filteredSlots = array_filter($slots, function ($slot) use ($currentTime, $endOfDay) {
                $slotStart = Carbon::createFromFormat('h:ia', explode(' - ', $slot)[0]);
                return $slotStart->isAfter($currentTime) && $slotStart->isBefore($endOfDay);
            });

            // Reset array keys
            $slots = array_values($filteredSlots);

            $booking_confirmed = Booking::where('bookable_id', $bookableId)
                ->where('bookable_type', $bookableType == 'room' ? Room::class : Equipment::class)
                ->where('date', $date)
                ->where('status', 'confirmed')
                ->where('slot', '!=', 'whole day')
                ->first();

            if ($booking_confirmed) {
                $booked_slots = json_decode($booking_confirmed->slot);
                $slots = array_diff($slots, $booked_slots);
            }
            return response()->json([
                'status' => 'available',
                'type' => $bookable->price_type,
                'slots' => $slots
            ]);
        }

    }
    public function monthly_bookings_check(Request $request){
        $booking = Booking::where('bookable_id', $request->id)
            ->where('bookable_type',  Room::class)
            ->where('status', 'confirmed')
            ->latest()->first();


        // Initialize a variable with the current date
        $nextAvailableDate = Carbon::now();

        if ($booking) {
            // Parse the slot value to get the number of months
            $months = (int) filter_var($booking->slot, FILTER_SANITIZE_NUMBER_INT);

            // Add the months to the booking date
            $bookingDate = Carbon::createFromFormat('Y-m-d', $booking->date);
            $bookingDate->addMonths($months);

            // Check if the booking date after adding months is in the future
            if ($bookingDate->isFuture()) {
                // Set the next available date to the day after the booking date
                $nextAvailableDate = $bookingDate->addDay();
            }
        }

        // Format the next available date as a string
        $nextAvailableDateString = $nextAvailableDate->format('Y-m-d');

        return $nextAvailableDateString;
    }
    public function store_monthly_room(Request $request){
        $start_date = $request->start_date;
        $months = $request->months;

        $bookableId = $request->id;
        $bookable = Room::findOrFail($bookableId);
        $user_id = auth()->id();

        $status = 'pending';
        $user = Auth::user();
        if($user->hasRole('super_admin') || $user->hasRole('admin'))
        {
            $status = 'confirmed';
        }
        $booking = new Booking([
            'date' => $start_date,
            'slot' => $months,
            'user_id' => $user_id,
            'status' => $status
        ]);
        $bookable->bookings()->save($booking);
        return response()->json([
            'status' => 'success',
            'message' => $bookable->name.' added to cart'
        ]);
    }

    public function destroy($bookableType, $bookableId)
    {
        $bookable = $bookableType == 'room' ? Room::find($bookableId) : Equipment::find($bookableId);

        if (!$bookable) {
            return redirect()->back()->with('error', 'Bookable item not found.');
        }

        $user = auth()->user();

        $deletedRows = Booking::where('bookable_id', $bookableId)
            ->where('bookable_type', 'like', '%' . $bookableType . '%')
            ->where('user_id', $user->id)
            ->where('status', '!=', 'confirmed')
            ->delete();

        if ($deletedRows > 0) {
            return redirect()->back()->with('success', 'Booking deleted successfully.');
        }

        return redirect()->back()->with('error', 'Booking not found.');
    }




}
