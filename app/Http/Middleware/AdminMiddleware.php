<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::check() && Auth::user()->role_as == 'admin' || Auth::user()->role_as == 'user')
        {
            if (Auth::check())
            {
                $expiresAt = Carbon::now()->addMinutes(2);
                Cache::put('user-is-online' . Auth::user()->id, true, $expiresAt);
                // Cache::put('user-is-online' . Auth::user()->id, true);
            }
            return $next($request);
        }
        else
        {
            return redirect('/home')->with('status','You are not allowed to access the Dashboard.!');
        }
    }
}
