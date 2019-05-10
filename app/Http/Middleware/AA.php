<?php

namespace App\Http\Middleware;

use Closure;

class AA
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    public function handle($request, Closure $next)
    {
        if ($this->auth->getUser()->role_id !== 1) {
            return redirect()->route('posts.index');
        }
        return $next($request);
    }
}
