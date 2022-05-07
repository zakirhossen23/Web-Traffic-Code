<?php

namespace App\Http\Middleware;

use Closure;

class IsAdmin
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
        // Redirect user to /login page if not logged in
        if(!\Auth::check())
        {
            return redirect()->to('/login');
        }

        // Check if user is logged in
        if (\Auth::check()) {

            // Check and redirect if user level is not Admin
            if(\Auth::user()->userlevel != 1)
            {
                return redirect()->to('/dashboard');
            }
        }
        return $next($request);
    }
}
