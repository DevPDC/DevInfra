<?php

namespace App\Http\Middleware;

use Closure;

class AuthorizedUsers
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
        $roles = Auth::user()->role;
        foreach($roles as $role)
        {
            if(Auth::check() && $role->role_id === 1 || $role->role_id === 2 || $role->role_id === 3 || $role->role_id === 1000)
            {
                return $next($request);
            }
            else
            {
                return redirect('access-denied');
            }
        }
    }
}
