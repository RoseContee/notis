<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use App\Models\Setting;
use Illuminate\Support\Facades\Log;

class StripeKeysServiceProvider extends ServiceProvider
{
    public function register()
    {
        $stripeKeys = DB::table('settings')->first();

        if ($stripeKeys){
            $stripeKey = $stripeKeys->stripe_key;
            $stripeSecret = $stripeKeys->stripe_secret;

            config(['services.stripe.key' => $stripeKey]);
            config(['services.stripe.secret' => $stripeSecret]);
            Log::info("Stripe keys loaded");
        } else {
            Log::error("No Stripe keys found in settings table");
        }
    }
}