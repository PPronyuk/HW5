<?php

namespace App\Http\Middleware;

use Closure;

class CheckForAdminUser
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
        if (\Auth::user() && \Auth::user()->isAdmin()) {
            return $next($request);
        }

        abort(403);
    }
}
