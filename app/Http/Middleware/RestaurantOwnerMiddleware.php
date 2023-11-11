<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RestaurantOwnerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::guard('restaurant_owner')->check()) {
            return $next($request);
        }
 // For debugging purposes, you can log the current user information
        // and the attempted route, which might help identify the issue
        Log::info('User not authenticated as restaurant owner:', [
            'user' => Auth::user(),
            'route' => $request->route()->getName(),
        ]);

        abort(403, 'Unauthorized action.');
    }
}
