<?php

namespace App\Http\Middleware;
use Auth;

use Closure;

class Authenticator
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
        if (!$request->is('signin', 'signup') && !Auth::check()) {
            return redirect('/signin');
	}

        return $next($request);
    }
}
