<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Profile;

class MaxStreaming
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
        $user = Auth::user();
        $streamingProfiles = Profile::where('user_id', $user->id)->where('streaming', 1)->count();

        $now = \Carbon\Carbon::now();
        $maxStreaming = $user->p_subscriptions()->where('expire_at', '>', $now)->first()->number_of_streaming;

        if ($streamingProfiles >= $maxStreaming){
            return redirect()->route('movies');
        }
        return $next($request);
    }
}
