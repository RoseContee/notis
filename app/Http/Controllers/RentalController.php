<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Models\Category;
use App\Models\Equipment;
use App\Models\Room;

class RentalController extends Controller
{
    public function index(){
        $rooms = Room::where('status', 1)->get();
        $equipments = Equipment::get();
        $categories = Category::get();
        return view('rental.index', compact('rooms', 'equipments', 'categories'));
    }

    public function top_category(Category $category){
        $sub_cats = Category::where('parent_cat',$category->id)->get();
        $equipments = Equipment::where('status', 1)->get();
        return view('rental.top_category', compact('category', 'sub_cats', 'equipments'));
    }
    public function category_product(Category $category){
        return view('rental.category_product', compact('category'));
    }
    public function view_equipment(Equipment $equipment){
        return view('rental.view_equipment', compact('equipment'));
    }
    public function view_room(Room $room){
        return view('rental.view_room', compact('room'));
    }

    public function rooms(Category $category){
        $rooms = Room::where('status', 1)->get();
        return view('rental.rooms', compact('rooms', 'category'));
    }

    public function rental_signin(){
        if (Auth::check()){
            return redirect()->route('rental');
        }
        return view('rental.signin');
    }

    public function rental_signup(){
        return view('rental.signup');
    }

    public function checkout()
    {
        $user = auth()->user();
        $bookings = $user->bookings()
            ->where('status', 'pending')
            ->with('bookable')
            ->get()
            ->groupBy(function ($booking) {
                return $booking->bookable_type . '-' . $booking->bookable_id;
            });
        $orders = Order::where(['user_id' => $user->id, 'status' => 'pending'])->get();

        return view('rental.checkout',compact('bookings', 'orders'));
    }

    public function equipment_buy(Request $request){
        $user_id = Auth::id();
        $order = Order::where(['user_id' => $user_id, 'equipment_id' => $request->equipment_id, 'status' => 'pending'])->first();
        if ($order){
            $orderQuantity = $order->quantity + $request->quantity;
            $order->update(['quantity' => $orderQuantity]);
        }else{
            $order = Order::create(['user_id' => $user_id, 'equipment_id' => $request->equipment_id, 'quantity' => $request->quantity]);
        }

        return redirect()->back()->with('Added to cart');
    }

    public function order_delete(Order $order){
        $order->delete();
        return redirect()->back()->with('Order Deleted Successfully');
    }

    public function rental_dashboard(){
        $user = Auth::user();
        return view('rental.dashboard',compact('user'));
    }

    public function rental_bookings(){
        $user = auth()->user();

        return view('rental.orders',compact('user'));
    }
    public function rental_purchases(){
        $user = auth()->user();

        return view('rental.purchases',compact('user'));
    }
    public function rental_account_detail(){
        $user = auth()->user();
        return view('rental.account_detail',compact('user'));
    }
    public function rental_payment_method(){
        $user = auth()->user();
        $intent = $user->createSetupIntent();
        return view('rental.payment_method',compact('user', 'intent'));
    }

    public function rental_complete_orders(){
        $user = auth()->user();
        $equipmentBookings = $user->bookings()->where('status', 'pending')->whereHasMorph('bookable', [Equipment::class])->with('bookable')->get();

        if ($equipmentBookings->count() > 0) {
            $roomBookings = $user->bookings()->where('status', 'pending')->whereHasMorph('bookable', [Room::class])->with('bookable')->get();

            if ($roomBookings->count() == 0) {
                return response()->json(['message' => 'You need to have a room booking in order to complete the rental.'], 400);
            }
        }

        $bookings = $user->bookings()->where('status', 'pending')->with('bookable')->get();
        $orders = $user->orders()->where('status', 'pending')->with('equipment')->get();

        $total = 0;
        if (count($bookings) > 0){
            foreach ($bookings as $booking){
                if ($booking->slot == 'whole day'){
                    $total += $booking->bookable->price_daily;
                } elseif (json_decode($booking->slot)) {
                    $slots = json_decode($booking->slot);
                    $count_hours = count($slots);
                    $total += $booking->bookable->price_hourly * $count_hours;
                }elseif (preg_match('/\d+\s*months/i', $booking->slot)) {

                    $number_months = (int) filter_var($booking->slot, FILTER_SANITIZE_NUMBER_INT);
                    if($booking->slot == '3 Months'){
                        $per_month_price = $booking->bookable->price_3;
                    }elseif ($booking->slot == '6 Months'){
                        $per_month_price = $booking->bookable->price_6;
                    }elseif ($booking->slot == '9 Months'){
                        $per_month_price = $booking->bookable->price_9;
                    }elseif ($booking->slot == '12 Months'){
                        $per_month_price = $booking->bookable->price_12;
                    }
                    $total += $per_month_price * $number_months;
                }
                $quantity = $booking->quantity;
                $total = $total * $quantity;
            }
        }
        if (count($orders) > 0){
            foreach ($orders as $order){
                $price = $order->equipment->price_daily * $order->quantity;
                $total += $price;
            }
        }
        $settings = \App\Models\Setting::first();
        $total = $total * (1 + $settings->insurance_percentage / 100);

        $paymentMethod = $user->defaultPaymentMethod()->asStripePaymentMethod();
        $one_time = $total;
        $one_time = $one_time * 100;
        $user->charge($one_time, $paymentMethod->id);

        $user = Auth::user();
        $data['name'] = $user->name;
        $data['email'] = $user->email;
        Mail::send('mails.checkout', $data, function($message) {
            $message->to('info@notisstudios.com', 'New Order Received')->subject
            ('New Order Received');
            $message->from('info@notisstudios.com', 'Notis Studio');
        });

        if (count($bookings) > 0){
            foreach ($bookings as $booking){
                if($booking->update(['status'=> 'confirmed'])){
                    Booking::where('date', $booking->date)->where('status', 'pending')->delete();
                }
            }
        }
        if (count($orders) > 0){
            foreach ($orders as $order){
                $order->update(['status'=> 'confirmed']);
            }
        }

        return redirect()->route('rental.bookings')->with('Order confirmed');
    }

    public function special_request(Request $request){
        $user = Auth::user();
        if ($request->type == 'room'){
            $item = Room::find($request->id);
        }else{
            $item = Equipment::find($request->id);
        }
        $data['name'] = $request->name;
        $data['phone'] = $request->phone;
        $data['email'] = $user->email;
        $data['special_request'] = $request->special_request;
        $data['item_name'] = $item->name;
        Mail::send('mails.special_request', $data, function($message) use ($request, $user, $data) {
            $message->to('info@notisstudios.com', 'Special Request Received')->subject
            ('Special Request Received for '.$data['item_name']);
            $message->from('info@notisstudios.com', $user->name);
        });
        session()->flash('success', 'Your Special Request has been sent successfully.');

        return redirect()->back();
    }

    public function hire(){
        return view('rental.hire');
    }
    public function hire_post(Request $request){
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['hire_message'] = $request->hire_message;
        Mail::send('mails.hiring_request', $data, function($message) use ( $data) {
            $message->to('info@notisstudios.com', 'Hiring Request Received')->subject
            ('Hiring Request Received '.$data['name']);
            $message->from('info@notisstudios.com', $data['name']);
        });

        session()->flash('success', 'Your Hiring Request has been sent successfully.');

        return redirect()->back();
    }

    public function all_rooms(){
        $rooms = Room::where('status', 1)->get();
        return view('rental.all_rooms',compact('rooms'));
    }
    public function all_equipment(){
        $equipments = Equipment::get();
        return view('rental.all_equipment',compact('equipments'));
    }

    public function delete_booking(Booking $booking){
        $booking->delete();
        return back();
    }

    public function seperate_page(Equipment $equipment){
        return view('rental.seperate_page',compact('equipment'));
    }
}
