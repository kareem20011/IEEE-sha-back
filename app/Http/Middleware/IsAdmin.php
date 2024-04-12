<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && Auth::user()->role == 'admin') {
            // User is authenticated and has the "admin" role, continue
            return $next($request);
        } else {
            // User is not authenticated or doesn't have the "admin" role
            return redirect()->route('errors.403'); // Redirect to login page (or a custom error page)
        }
        return $next($request);
    }
}
