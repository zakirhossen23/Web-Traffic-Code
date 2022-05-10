<?php

namespace App\Http\Middleware;

use Closure;

class isBanned
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
        // Check if user is logged in
        if (\Auth::check()) {

            // Check if user status is banned
            if(\Auth::user()->banned == 1)
            {
                // Destroy data associated with the user session from persistent storage.
                auth()->logout();
                return redirect()->back()->with('message', 'Your Web Traffic Exchanger account has been banned for violating our Terms and Conditions');
            }
        }

        return $next($request);
    }
}
