<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\User;

class RoleMiddleware
{
    /**
     * Handle an incoming request. Check if is Admin
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        //check if the guest have a account and if he has the role admin to go
             if (Auth::check() && Auth::user()->role->lib == 'Admin')
            {
                return $next($request);
            }
            
        // else back to index
    return redirect('/');
    }
}
