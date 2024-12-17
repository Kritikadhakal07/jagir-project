<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckSessionToken
{
    public function handle($request, Closure $next)
{
    if (!Session::has('user_token')) {
        return redirect()->route('login')->withErrors(['message' => 'Please log in first.']);
    }

    return $next($request);
}

}
