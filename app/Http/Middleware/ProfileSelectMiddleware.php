<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;

class ProfileSelectMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $now = \Carbon\Carbon::now();
        if (Auth::check()){
            if (Auth::user()->p_subscriptions()->where('expire_at', '>', $now)->count() <= 0){
                return redirect()->route('pricing');
            }else{
                if (!$request->session()->has('selected_profile')) {
                    return redirect()->route('select_profile');
                }else{
                    $profile =  Profile::find($request->session()->get('selected_profile'));
                    if (!$profile->gender || !$profile->zipcode || !$profile->age || !$profile->name || !$profile->city){
                        return redirect()->route('account_edit');
                    }
                }
            }
        }

        $routeName = $request->route()->getName();
        if ($routeName == 'watch_movie'){
            $movie = $request->route('movie');
            if ($movie->access != 'free' && $movie->access == 'paid'){
                if (Auth::user()->p_subscriptions()->where('expire_at', '>', $now)->count() <= 0){
                    return redirect()->route('pricing');
                }
            }
        }elseif ($routeName == 'watch_episode'){
            if (Auth::user()->p_subscriptions()->where('expire_at', '>', $now)->count() <= 0){
                return redirect()->route('pricing');
            }
        }
        return $next($request);
    }
}
