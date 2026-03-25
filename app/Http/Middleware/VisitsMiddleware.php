<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Jenssegers\Agent\Agent;
use App\Models\Setting;
use App\Models\Visit;
use Stevebauman\Location\Facades\Location;
use PayPal\Api\Agreement;

class VisitsMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $agent = new Agent();
        $ip = request()->ip();
        $location = Location::get($ip)->countryName ?? null;
        $device = $agent->platform();
        $browser = $agent->browser();
        $user_id = Auth::id() ?? null;
        $page = $request->path();
        $profile_id = $request->session()->get('selected_profile');
        Visit::create(['ip' => $ip, 'location' => $location, 'device' => $device, 'browser' => $browser, 'user_id' => $user_id, 'profile_id' => $profile_id, 'page' => $page]);
        return $next($request);

    }
}
