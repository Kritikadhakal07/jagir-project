<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GuestAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
{
    if (auth()->check() && auth()->user()->is_admin && !$request->is('admin/login')) {
        return redirect()->route('admin.home');
    }

    if (auth()->check() && !auth()->user()->is_admin && !$request->is('admin/login')) {
        return redirect()->route('profile.form');
    }

    return $next($request);
}

}
