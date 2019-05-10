<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AccountManagers
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
        $role = Auth::user()->role;
            if(Auth::check() && $role->role_id === 1 || $role->role_id === 1000)
            {
                return $next($request);
            }
            else
            {
                return redirect('access-denied');
            }
    }
}
