<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Models\Advertisement;
use App\Models\Avatar;
use App\Models\Genre;
use App\Models\Movie;
use App\Models\Profile;
use App\Models\Setting;
use App\Models\Episode;
use App\Models\Season;
use App\Models\Show;
use App\Models\Network;
use App\Models\Subscription;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use Stripe\Event;
use App\Models\MediaCategory;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $movies = Movie::where('status', 1)->orderBy('date_sort', 'desc')->get();
        $shows = Show::where('status', 1)->orderBy('date_sort', 'desc')->get();
        return view('welcome', compact('movies', 'shows'));
    }

    public function network(Request $request)
    {
        $name = $request->name;
        $networks = Network::where('status', 1)
                            ->where('name', 'like', '%'.$name.'%')
                            ->get();

        $network_list = [];
        foreach ($networks as $key => $network) {
            $movies = Movie::where('status', 1)
                    ->where('contribute_id', $network->user_id)
                    ->orderBy('date_sort', 'desc')->get();
            $network_list[] = [
                'network'   => $network,
                'movies'    => $movies
            ];
        }
        
        return view('network', compact('network_list'));
    }
    public function movie(Movie $movie)
    {
        if ($movie->status == 0){
            return redirect()->back();
        }
        $genres = $movie->genres()->pluck('name')->toArray();
        $movies = Movie::where('status', 1)->whereHas('genres', function ($query) use ($genres) {
            $query->whereIn('name', $genres);
        })->orderBy('date_sort', 'desc')->get();
        if (Auth::check()){
            $savedTime = $movie->watchTimes()->where('user_id', Auth::id())->first();
        }
        $savedTime = $savedTime->time ?? null;
        return view('movie', compact('movies', 'movie', 'savedTime'));
    }
    public function show(Show $show)
    {
        if ($show->status == 0){
            return redirect()->back();
        }
        return view('show', compact('show'));
    }
    public function season(Season $season)
    {
        if ($season->status == 0){
            return redirect()->back();
        }
        return view('season', compact('season'));
    }

    public function get_ad_images(Request $request) {
        $movie = Movie::find($request->id);
        $setting = Setting::first();
        $ad_images = Advertisement::where('status', 1)->get();
        $images = [];
        foreach ($ad_images as $ad){
            if($ad->user_id != null) {
                $user = User::find($ad->user_id);
                if($user->balance < $setting->ad_image_price) {
                    continue;
                }
            }
            
            $ad_movies = $ad->movies()->pluck('movies.id')->toArray();
            if ($ad->movies_type == 'include'){
                if(in_array($movie->id, $ad_movies)){
                    if ($ad->type == 'image'){
                        $images[] = [
                            'id' => $ad->id,
                            'link' => $ad->getFirstMediaUrl('file'),
                        ];
                    }
                }
            }elseif ($ad->movies_type == 'exclude'){
                if(!in_array($movie->id, $ad_movies)){
                    if ($ad->type == 'image'){
                        $images[] = [
                            'id' => $ad->id,
                            'link' => $ad->getFirstMediaUrl('file'),
                        ];
                    }
                }
            }else{
                if ($ad->type == 'image'){
                    $images[] = [
                        'id' => $ad->id,
                        'link' => $ad->getFirstMediaUrl('file'),
                    ];
                }
            }
        }

        if(count($images) == 0)
            return response([
                'image' => null
            ]);

        $index = rand(0, count($images)-1);

        $ad_id = $images[$index]['id'];

        $ad = Advertisement::find($ad_id);

        if($ad->user_id != null) {
            $advertisor = User::find($ad->user_id);
            if($advertisor->balance > $setting->ad_image_price) {
                $advertisor->balance -= $setting->ad_image_price;
                $advertisor->save();

                $cont_balance = $setting->ad_image_price * $setting->contribute_percentage / 100;

                if(isset($movie->contribute->user)) {
                    $contributor = $movie->contribute->user;
                    $contributor->a_cash += $cont_balance;
                    $contributor->save();
                }

                $movie->adsViews()->create(['user_id' => Auth::id(), 'ads_id' => $ad->id]);
                
            }

        }



        return response([
            'image' => $images[$index]
        ]);

    }

    public function get_ad_videos(Request $request) {
        $movie = Movie::find($request->id);
        $total_length = $request->total;
        $setting = Setting::first();
        $ad_length = isset($setting->ad_length) ? explode(',', $setting->ad_length) : [];
        $ad_price = isset($setting->ad_price) ? explode(',', $setting->ad_price) : [];
        $ad_special_price = isset($setting->ad_special_price) ? explode(',', $setting->ad_special_price) : [];
        $ad_videos = Advertisement::where('status', 1)->get();
        $videos = [];
        foreach ($ad_videos as $ad){
            if($ad->user_id != null) {
                $user = User::find($ad->user_id);
                $price = 0;
                if($ad->use_target === 0) {
                    $price = $ad_price[$ad->ad_length];
                }
                if($ad->use_target === 1) {
                    $price = $ad_special_price[$ad->ad_length];
                }
                if($user->balance < $price) {
                    continue;
                }
            }
            
            $ad_movies = $ad->movies()->pluck('movies.id')->toArray();
            if ($ad->movies_type == 'include'){
                if(in_array($movie->id, $ad_movies)){
                    if ($ad->type == 'video'){
                        $videos[] = [
                            'id' => $ad->id,
                            'link' => $ad->getFirstMediaUrl('file'),
                            'length'    => $ad_length[$ad->ad_length]
                        ];
                    }
                }
            }elseif ($ad->movies_type == 'exclude'){
                if(!in_array($movie->id, $ad_movies)){
                    if ($ad->type == 'video'){
                        $videos[] = [
                            'id' => $ad->id,
                            'link' => $ad->getFirstMediaUrl('file'),
                            'length'    => $ad_length[$ad->ad_length]
                        ];
                    }
                }
            }else{
                if ($ad->type == 'video'){
                    $videos[] = [
                        'id'        => $ad->id,
                        'link'      => $ad->getFirstMediaUrl('file'),
                        'length'    => $ad_length[$ad->ad_length]
                    ];
                }
            }
        }

        if(count($videos) == 0)
            return response([
                'video' => null
            ]);

        $remain_length = $setting->ad_total_length - $total_length;
        if($remain_length <= 0) {
            return response([
                'video' => null
            ]);
        }

        $index = rand(0, count($videos)-1);

        $ad_id = $videos[$index]['id'];

        $ad = Advertisement::find($ad_id);

        if($ad->user_id != null) {
            $advertisor = User::find($ad->user_id);
            $price = 0;
            if($ad->use_target === 0) {
                $price = $ad_price[$ad->ad_length];
            }
            if($ad->use_target === 1) {
                $price = $ad_special_price[$ad->ad_length];
            }
            if($advertisor->balance > $price) {
                $advertisor->balance -= $price;
                $advertisor->save();

                $cont_balance = $price * $setting->contribute_percentage / 100;

                if(isset($movie->contribute->user)) {
                    $contributor = $movie->contribute->user;
                    $contributor->a_cash += $cont_balance;
                    $contributor->save();
                }

                $movie->adsViews()->create(['user_id' => Auth::id(), 'ads_id' => $ad->id]);
            }

        }

        return response([
            'video' => $videos[$index]
        ]);

    }

    public function get_ad_episode_images(Request $request) {
        $episode = Episode::find($request->id);
        $setting = Setting::first();
        $ad_images = Advertisement::where('status', 1)->get();
        $images = [];
        foreach ($ad_images as $ad){
            if($ad->user_id != null) {
                $user = User::find($ad->user_id);
                if($user->balance < $setting->ad_image_price) {
                    continue;
                }
            }

            $ad_seasons = $ad->seasons()->pluck('seasons.id')->toArray();    
            
            $ad_episodes = $ad->episodes()->pluck('episodes.id')->toArray();

            if(count($ad_episodes) > 0) {
                if ($ad->movies_type == 'include'){
                    if(in_array($episode->id, $ad_episodes)){
                        if ($ad->type == 'image'){
                            $images[] = [
                                'id' => $ad->id,
                                'link' => $ad->getFirstMediaUrl('file'),
                            ];
                        }
                    }
                }elseif ($ad->movies_type == 'exclude'){
                    if(!in_array($episode->id, $ad_episodes)){
                        if ($ad->type == 'image'){
                            $images[] = [
                                'id' => $ad->id,
                                'link' => $ad->getFirstMediaUrl('file'),
                            ];
                        }
                    }
                }else{
                    if ($ad->type == 'image'){
                        $images[] = [
                            'id' => $ad->id,
                            'link' => $ad->getFirstMediaUrl('file'),
                        ];
                    }
                }
            } 
            else if(count($ad_seasons) > 0) {
                if ($ad->movies_type != 'exclude'){
                    if ($ad->type == 'image'){
                        $images[] = [
                            'id' => $ad->id,
                            'link' => $ad->getFirstMediaUrl('file'),
                        ];
                    }
                }
            }
            else if(count($ad_seasons) == 0) {
                if ($ad->movies_type == 'exclude'){
                    if ($ad->type == 'image'){
                        $images[] = [
                            'id' => $ad->id,
                            'link' => $ad->getFirstMediaUrl('file'),
                        ];
                    }
                }
            }
            

        }

        if(count($images) == 0)
            return response([
                'image' => null
            ]);

        $index = rand(0, count($images)-1);

        $ad_id = $images[$index]['id'];

        $ad = Advertisement::find($ad_id);

        if($ad->user_id != null) {
            $advertisor = User::find($ad->user_id);
            if($advertisor->balance > $setting->ad_image_price) {
                $advertisor->balance -= $setting->ad_image_price;
                $advertisor->save();

                $cont_balance = $setting->ad_image_price * $setting->contribute_percentage / 100;

                if(isset($episode->contribute->user)) {
                    $contributor = $episode->contribute->user;
                    $contributor->a_cash += $cont_balance;
                    $contributor->save();
                }

                $episode->adsViews()->create(['user_id' => Auth::id(), 'ads_id' => $ad->id]);
            }

        }

        return response([
            'image' => $images[$index]
        ]);

    }

    public function get_ad_episode_videos(Request $request) {
        $episode = Episode::find($request->id);
        $total_length = $request->total;
        $setting = Setting::first();
        $ad_length = isset($setting->ad_length) ? explode(',', $setting->ad_length) : [];
        $ad_price = isset($setting->ad_price) ? explode(',', $setting->ad_price) : [];
        $ad_special_price = isset($setting->ad_special_price) ? explode(',', $setting->ad_special_price) : [];
        $ad_videos = Advertisement::where('status', 1)->get();

        $videos = [];
        foreach ($ad_videos as $ad){
            if($ad->user_id != null) {
                $user = User::find($ad->user_id);
                $price = 0;
                if($ad->use_target === 0) {
                    $price = $ad_price[$ad->ad_length];
                }
                if($ad->use_target === 1) {
                    $price = $ad_special_price[$ad->ad_length];
                }
                if($user->balance < $price) {
                    continue;
                }
            }
            
            $ad_seasons = $ad->seasons()->pluck('seasons.id')->toArray();    

            $ad_episodes = $ad->episodes()->pluck('episodes.id')->toArray();

            if(count($ad_episodes) > 0) {
                if ($ad->movies_type == 'include'){
                    if(in_array($episode->id, $ad_episodes)){
                        if ($ad->type == 'video'){
                            $videos[] = [
                                'id' => $ad->id,
                                'link' => $ad->getFirstMediaUrl('file'),
                                'length'    => $ad_length[$ad->ad_length]
                            ];
                        }
                    }
                }elseif ($ad->movies_type == 'exclude'){
                    if(!in_array($episode->id, $ad_episodes)){
                        if ($ad->type == 'video'){
                            $videos[] = [
                                'id' => $ad->id,
                                'link' => $ad->getFirstMediaUrl('file'),
                                'length'    => $ad_length[$ad->ad_length]
                            ];
                        }
                    }
                }else{
                    if ($ad->type == 'video'){
                        $videos[] = [
                            'id' => $ad->id,
                            'link' => $ad->getFirstMediaUrl('file'),
                            'length'    => $ad_length[$ad->ad_length]
                        ];
                    }
                }
            } 
            else if(count($ad_seasons) > 0) {
                if ($ad->movies_type != 'exclude'){
                    if ($ad->type == 'video'){
                        $videos[] = [
                            'id' => $ad->id,
                            'link' => $ad->getFirstMediaUrl('file'),
                            'length'    => $ad_length[$ad->ad_length]
                        ];
                    }
                }
            }
            else if(count($ad_seasons) == 0) {
                if ($ad->movies_type == 'exclude'){
                    if ($ad->type == 'video'){
                        $videos[] = [
                            'id' => $ad->id,
                            'link' => $ad->getFirstMediaUrl('file'),
                            'length'    => $ad_length[$ad->ad_length]
                        ];
                    }
                }
            }
        }

        if(count($videos) == 0)
            return response([
                'video' => null
            ]);

        $remain_length = $setting->ad_total_length - $total_length;
        if($remain_length <= 0) {
            return response([
                'video' => null
            ]);
        }

        $index = rand(0, count($videos)-1);

        $ad_id = $videos[$index]['id'];

        $ad = Advertisement::find($ad_id);

        if($ad->user_id != null) {
            $advertisor = User::find($ad->user_id);
            $price = 0;
            if($ad->use_target === 0) {
                $price = $ad_price[$ad->ad_length];
            }
            if($ad->use_target === 1) {
                $price = $ad_special_price[$ad->ad_length];
            }
            if($advertisor->balance > $price) {
                $advertisor->balance -= $price;
                $advertisor->save();

                $cont_balance = $price * $setting->contribute_percentage / 100;

                if(isset($episode->contribute->user)) {
                    $contributor = $episode->contribute->user;
                    $contributor->a_cash += $cont_balance;
                    $contributor->save();
                }

                $episode->adsViews()->create(['user_id' => Auth::id(), 'ads_id' => $ad->id]);
            }

        }

        return response([
            'video' => $videos[$index]
        ]);

    }
    public function watch_movie(Movie $movie){
        if ($movie->status == 0){
            if ($movie->user_id != Auth::id() && !Auth::user()->hasRole(['admin', 'super_admin'])){
                return redirect()->back();
            }
        }
        $profile_id = request()->session()->get('selected_profile');
        $savedTime = $movie->watchTimes()->where('user_id', Auth::id())
                            ->where('profile_id', $profile_id)
                            ->first();
        $savedTime = $savedTime->time ?? 0;
        if ($savedTime > 5){
            $savedTime  = $savedTime - 5;
        }
        if ($savedTime <= 0){
            $savedTime  = 0;
        }
        
        $movie->views()->create(['user_id' => Auth::id(), 'profile_id' => $profile_id]);
        $now = \Carbon\Carbon::now();
        $noAdds = Auth::user()->p_subscriptions()->where('adds',0)->where('expire_at', '>', $now)->count()>0;
        return view('watch_movie', compact('movie', 'savedTime', 'noAdds'));
    }
    public function movie_currentTime(Request $request){
        $movie = Movie::find($request->id);
        $profile_id = $request->session()->get('selected_profile');
        $profile_id = (int)$profile_id;
        $movie->watchTimes()->updateOrCreate(
            ['user_id' => Auth::id(), 'profile_id' => $profile_id],
            ['time' => $request->currentTime]
        );
        return true;
    }
    public function watch_episode(Episode $episode){
        $profile_id = request()->session()->get('selected_profile');
        $savedTime = $episode->watchTimes()->where('profile_id', $profile_id)
                            ->where('user_id', Auth::id())->first();
        $savedTime = $savedTime->time ?? 0;
        if ($savedTime > 5){
            $savedTime  = $savedTime - 5;
        }
        if ($savedTime <= 0){
            $savedTime  = 0;
        }
        $episode->views()->create(['user_id' => Auth::id(), 'profile_id' => $profile_id]);
        $now = \Carbon\Carbon::now();
        $noAdds = Auth::user()->p_subscriptions()->where('adds',0)->where('expire_at', '>', $now)->count()>0;
        return view('watch_episode', compact('episode', 'savedTime', 'noAdds'));
    }
    public function episode_currentTime(Request $request){
        $episode = Episode::find($request->id);
        $profile_id = $request->session()->get('selected_profile');
        $episode->watchTimes()->updateOrCreate(
            ['user_id' => Auth::id(), 'profile_id' => $profile_id],
            ['time' => $request->currentTime]
        );
        return true;
    }
    public function movies($media_category_id){
        $media_category = MediaCategory::find($media_category_id);

        $movies = Movie::where('status', 1)
                        ->where('media_category_id', $media_category_id)
                        ->orderBy('date_sort', 'desc')->get();
        $genres = Genre::get();
        return view('movies', compact('movies', 'media_category', 'genres'));
    }
    public function tvshows($media_category_id){
        $media_category = MediaCategory::find($media_category_id);
        $shows = Show::where('status', 1)
                        ->where('media_category_id', $media_category_id)
                        ->orderBy('date_sort', 'desc')->get();
        $genres = Genre::get();
        return view('shows', compact('shows', 'media_category', 'genres'));
    }
    public function pricing(){
        $user = null;
        $intent = null;
        

        if (Auth::check()){
            $user = Auth::user();
            $intent = env('APP_ENV') === 'local' ? $user->createSetupIntent() : [];
        }
        $subscriptions = Subscription::where('status', 1)->get();
        $settings = Setting::first();
        return view('pricing', compact('subscriptions', 'settings', 'intent'));
    }
    public function get_stripePaymentForm(Request $request){
        $subscription = Subscription::find($request->planId);
        return view('includes.stripePaymentForm', compact('subscription'));
    }
    public function get_paypalPaymentForm(Request $request){
        $subscription = Subscription::find($request->planId);
        $setting = Setting::first();
        return view('includes.paypal', compact('subscription', 'setting'));
    }
    public function paypal_modal_success(Request $request){
        $user = Auth::user();
        $provider = new PayPalClient;
        $settings = Setting::first();
        $config = [
            'mode'    => $settings->paypal_mode, // Can only be 'sandbox' Or 'live'. If empty or invalid, 'live' will be used.
            'sandbox' => [
                'client_id'         => $settings->paypal_key,
                'client_secret'     => $settings->paypal_secret,
                'app_id'            => '',
            ],
            'live' => [
                'client_id'         => $settings->paypal_key,
                'client_secret'     => $settings->paypal_secret,
                'app_id'            => env('PAYPAL_LIVE_APP_ID', ''),
            ],

            'payment_action' => 'Sale',
            'currency'       => 'USD',
            'notify_url'     => 'https://your-app.com/paypal/notify',
            'locale'         => 'en_US',
            'validate_ssl'   => true,
        ];
        $provider->setApiCredentials($config);
        $provider->getAccessToken();
//        $subscription = $provider->showSubscriptionDetails('I-D8E70YDT6K0B');
        $userSubscriptions = $user->p_subscriptions()->where('type', 'paypal')->get();
        if (count($userSubscriptions) >= 0){
            foreach ($userSubscriptions as $userSubscription){
                if ($userSubscription->pivot->paypal_subscription_id) {
                    $provider->cancelSubscription($userSubscription->pivot->paypal_subscription_id, 'Cancelling');
                }
            }
        }
        /** it's all right **/
        /** Here Write your database logic like that insert record or value in database if you want **/

        $subscription = Subscription::find($request->subscription_id);
        if($subscription->recurring == 1){
            $expire_at = Carbon::now()->addDays($subscription->days)->format('Y.m.d H:i:s');
        }else{
            $expire_at = Carbon::now()->addYears(10)->format('Y.m.d H:i:s');
        }
        $data[$subscription->id] = ['expire_at' => $expire_at, 'type' => 'paypal', 'paypal_subscription_id' => $request->paypal_subscription_id];
        $user->p_subscriptions()->attach($data);
        user_profile_helper($user, $subscription);

        return redirect(route('home'));
    }
    public function profile(Request $request){
        $profile_id = $request->session()->get('selected_profile');
        $user = Auth::user();
        $profile = Profile::find($profile_id);
        return view('profile', compact('user', 'profile'));
    }
    public function my_movies(){
        $user = Auth::user();
        $genres = Genre::get();
        return view('my_movies', compact('user', 'genres'));
    }
    public function account_edit(Request $request){
        $profile_id = $request->session()->get('selected_profile');
        $profile = Profile::find($profile_id);
        $email = Auth::user()->email;
        return view('account_edit', compact('profile', 'email'));
    }
    public function account_edit_post(Request $request){
        $profile_id = $request->session()->get('selected_profile');
        $profile = Profile::find($profile_id);
        $profile->update(['name' => $request->name, 'country' => $request->country, 'city' => $request->city, 'gender' => $request->gender, 'zipcode' => $request->zipcode, 'age' => $request->age ]);

        return redirect()->route('home');
    }
    public function change_password(){
        $user = Auth::user();
        return view('change_password', compact('user'));
    }
    public function change_password_post(Request $request){
        $user = Auth::user();

        if ($request->current_password && $request->password){
            if (Hash::check($request->current_password, $user->password)) {
                $user->update(['password' => Hash::make($request->password)]);
            }
        }
        return redirect()->back();
    }
    public function payment_method(){
        $user = Auth::user();
        $intent = env('APP_ENV') === 'local' ? $user->createSetupIntent() : [];
        return view('payment_method', compact('user', 'intent'));
    }
    public function add_payment_method(Request $request){
        $user = Auth::user();
        if (! $user->stripe_id) {
            $user->createAsStripeCustomer();
        }
//        if ($user->hasDefaultPaymentMethod()){
        $user->deletePaymentMethods();
//        }
        $paymentMethod = $request->input('payment_method');
        $user->addPaymentMethod($paymentMethod);
        $user->updateDefaultPaymentMethod($paymentMethod);
        if ($request->has('plan')){
            $this->orderPost($request);
        }
        return redirect()->back();
    }
    public function delete_payment_method(){
        $user = Auth::user();
        $user->deletePaymentMethods();
        return redirect()->back();
    }
    public function orderPost(Request $request)
    {
        $user = Auth::user();
        $paymentMethod = $user->defaultPaymentMethod()->asStripePaymentMethod();

        $plan = $request->input('plan');
        try {
            $subscription = Subscription::find($plan);
            $settings = Setting::first();
            if($subscription->recurring == 1){
                if ($user->subscribed('default')) {
                    $user->subscription('default')->cancelNow();
                }else{
                    if ($user->onetime != 1){
                        if ($subscription->onet_time_price != 0 && $subscription->recurring_price != 0)
                        {
                            $one_time = $subscription->onet_time_price;
                            $one_time = $one_time * 100;
                            $user->charge($one_time, $paymentMethod->id);
                            $user->update(['onetime' => 1]);
                        }
                    }
                    if ($subscription->recurring_price != 0){
                        $user->newSubscription('default', $subscription->stripe_id)->create($paymentMethod->id, [
                            'email' => $user->email
                        ]);
                    }
                }
            }else{
                $one_time = $subscription->onet_time_price;
                $one_time = $one_time * 100;
                $user->charge($one_time, $paymentMethod->id);
//                $expire_at = Carbon::now()->addYears(10)->format('Y.m.d H:i:s');
            }
            if($subscription->recurring == 1){
                $expire_at = Carbon::now()->addDays($subscription->days)->format('Y.m.d H:i:s');
            }else{
                $expire_at = Carbon::now()->addYears(10)->format('Y.m.d H:i:s');
            }
            $data[$subscription->id] = ['expire_at' => $expire_at, 'type' => 'stripe'];
            $user->p_subscriptions()->attach($data);
            if(!is_null($user->ref_by)){
                $ref_user = User::find($user->ref_by);
                $ref_amount = $subscription->recurring_price * $settings->affiliate_percentage / 100;
                $total = $ref_user->a_cash + $ref_amount;
                $ref_user->update('a_cash', $total);
            }
            user_profile_helper($user, $subscription);
        } catch (\Exception $e) {
            dd($e->getMessage());
            return back()->withErrors(['message' => 'Error creating subscription. ' . $e->getMessage()]);
        }
        return redirect()->route('home')->with('success', 'Subscribed Successfully');
    }

    public function contact_us_post(Request $request){
        $data = $request->all();
        Mail::send('mails.contact_us', $data, function($message) use ($request) {
            $message->to('info@notisstudios.com', 'Notis Studio Contact Form')->subject
            ('Notis Studio Contact Form');
            $message->from($request->email, $request->name);
        });
        return back();
    }

    public function select_profile(Request $request, $profileid = null){
        $user = Auth::user();
        $now = \Carbon\Carbon::now();
        if (!$user->p_subscriptions()->where('expire_at', '>', $now)->first()){
            return redirect()->route('pricing');
        }
        if ($profileid){
            $selectedProfile = Profile::where('id', $profileid)->where('user_id', $user->id)->first();
            if ($selectedProfile){
                $request->session()->put('selected_profile', $profileid);
                return redirect()->route('home');
            }
        }

        $userProfiles = $user->profiles;
        foreach($userProfiles as $profile){
            if(!$profile->avatar){
                $avatar = \App\Models\Avatar::where('is_default',1)->first();
                $profile->update(['avatar_id' => $avatar->id]);
            }
        }


        return view('select_profile', compact('user'));
    }
    public function new_profile($userid){
        $user = User::find($userid);
        $count = $user->profiles()->count() + 1;
        $user->profiles()->create(['name' => 'Profile '.$count]);
        return redirect(route('profile'));
    }

    public function profile_streaming_on(Request $request){
        $profile_id = $request->session()->get('selected_profile');
        $profile = Profile::find($profile_id);
        $profile->update(['streaming'=> 1]);
        return true;
    }
    public function profile_streaming_off(Request $request){
        $profile_id = $request->session()->get('selected_profile');
        $profile = Profile::find($profile_id);
        $profile->update(['streaming'=> 0]);
        return true;
    }

    public function handlePaypalWebhook(Request $request)
    {
        $payload = json_decode($request->getContent());
        if ($payload->event_type === 'BILLING.SUBSCRIPTION.CANCELLED' || $payload->event_type === 'BILLING.SUBSCRIPTION.EXPIRED' || $payload->event_type === 'BILLING.SUBSCRIPTION.SUSPENDED') {
            // retrieve the subscription from the database
            $subscription = $payload->resource->id;
            DB::table('p_subscriptions_user')->where('paypal_subscription_id', $subscription)->update(['status' => 'cancelled']);
        } elseif ($payload->event_type === 'BILLING.SUBSCRIPTION.ACTIVATED' || $payload->event_type === 'BILLING.SUBSCRIPTION.UPDATED') {
            // retrieve the subscription from the database
            $subscription = $payload->resource->id;

            // retrieve the user associated with the subscription
            $email = $payload->resource->subscriber->email_address;
            $user = User::where('email', $email)->first();

            // update the subscription's expire_at column with the new expiration date
            if ($user) {
                $userSubscription = $user->p_subscriptions()->where('type', 'paypal')->where('paypal_subscription_id', $subscription)->first();
                if ($userSubscription) {
                    $expire_at = Carbon::createFromTimestamp($payload->resource->billing_info->next_billing_time)->toDateTimeString();
                    $user->p_subscriptions()->updateExistingPivot($userSubscription->id, ['expire_at' => $expire_at, 'status' => 'active']);
                }
            }
        }elseif ($payload->event_type === 'PAYMENT.SALE.COMPLETED'){
            $paypal_subscription_id = $payload->resource->billing_agreement_id;
            $record = DB::table('p_subscriptions_user')
                ->where('paypal_subscription_id', $paypal_subscription_id)
                ->first();
            $subscription = Subscription::find($record->p_subscription_id);
            $date = Carbon::parse($payload->resource->update_time);
            $expire_at = $date->addDays($subscription->days)->format('Y-m-d');
            DB::table('p_subscriptions_user')
                ->where('paypal_subscription_id', $paypal_subscription_id)
                ->update(['expire_at' => $expire_at, 'status' => 'active']);
        }
        return true;
    }
    public function handleStripeWebhook(Request $request)
    {
        // Retrieve the event data from the request
        $event = json_decode($request->getContent(), true);
        $event_id = $event['id'];

        // Verify the event's authenticity
        $stripeEvent = Event::retrieve($event_id);

        if ($stripeEvent->type === 'customer.subscription.deleted') {
            // Retrieve the user's subscription ID
            $email = $stripeEvent->data->object->customer_email;

            // Update the user's subscription status
            $user = User::where('email', $email)->first();
            if($user){
                $userSubscriptions = $user->p_subscriptions()->where('type', 'stripe')->get();
                foreach ($userSubscriptions as $subscription){
                    $user->p_subscriptions()->updateExistingPivot($subscription->id, ['status' => 'cancelled']);
                }
            }
        } elseif ($stripeEvent->type === 'invoice.paid') {
            // Retrieve the subscription associated with the invoice
            $subscription_id = $stripeEvent->data->object->subscription;
            $subscription = Subscription::retrieve($subscription_id);

            // Update the subscription's expire_at column with the new expiration date
            $user = User::where('email', $subscription->customer_email)->first();
            if ($user) {
                $userSubscription = $user->p_subscriptions()->where('type', 'stripe')->where('p_subscription_id', $subscription->id)->first();
                if ($userSubscription) {
                    $expire_at = Carbon::createFromTimestamp($subscription->current_period_end)->toDateTimeString();
                    $user->p_subscriptions()->updateExistingPivot($userSubscription->id, ['expire_at' => $expire_at, 'status' => 'active']);
                }
            }
        }
        return true;
    }

    public function stripe_cancel_subscription(){
        $user = Auth::user();
        $user->subscription('default')->cancel();
        $userSubscriptions = $user->p_subscriptions()->where('type', 'stripe')->get();
        foreach ($userSubscriptions as $subscription){
            $user->p_subscriptions()->updateExistingPivot($subscription->id, ['status' => 'cancelled']);
        }
        return back()->with('success', 'Subscription Cancelled Successfully');
    }

    public function paypal_cancel_subscription(){
        $user = Auth::user();
        $provider = new PayPalClient;
        $settings = Setting::first();
        $config = [
            'mode'    => $settings->paypal_mode, // Can only be 'sandbox' Or 'live'. If empty or invalid, 'live' will be used.
            'sandbox' => [
                'client_id'         => $settings->paypal_key,
                'client_secret'     => $settings->paypal_secret,
                'app_id'            => '',
            ],
            'live' => [
                'client_id'         => $settings->paypal_key,
                'client_secret'     => $settings->paypal_secret,
                'app_id'            => env('PAYPAL_LIVE_APP_ID', ''),
            ],

            'payment_action' => 'Sale',
            'currency'       => 'USD',
            'notify_url'     => 'https://your-app.com/paypal/notify',
            'locale'         => 'en_US',
            'validate_ssl'   => true,
        ];
        $provider->setApiCredentials($config);
        $provider->getAccessToken();
//        $subscription = $provider->showSubscriptionDetails('I-D8E70YDT6K0B');
        $userSubscriptions = $user->p_subscriptions()->where('type', 'paypal')->get();
        if (count($userSubscriptions) >= 0){
            foreach ($userSubscriptions as $userSubscription){
                if ($userSubscription->pivot->paypal_subscription_id) {
                    $provider->cancelSubscription($userSubscription->pivot->paypal_subscription_id, 'Cancelling');
                }
            }
        }
        $userSubscriptions = $user->p_subscriptions()->where('type', 'paypal')->get();
        foreach ($userSubscriptions as $subscription){
            $user->p_subscriptions()->updateExistingPivot($subscription->id, ['status' => 'cancelled']);
        }
        return back()->with('success', 'Subscription Cancelled Successfully');
    }

    public function change_avatar(Avatar $avatar){
        $selectedProfile = \App\Models\Profile::find(request()->session()->get('selected_profile'));
        $selectedProfile->update(['avatar_id' => $avatar->id]);
        return back()->with('success', 'Avatar Changed Successfully');
    }

    public function update_account_detail(Request $request){
        $user = Auth::user();
        $user->update(['name' => $request->name]);

        if ($request->current_password && $request->password){
            if (Hash::check($request->current_password, $user->password)) {
                $user->update(['password' => Hash::make($request->password)]);
            }
        }
        return redirect()->back();
    }
}
