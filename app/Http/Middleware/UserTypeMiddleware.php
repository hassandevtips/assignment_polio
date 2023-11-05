<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserTypeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
   public function handle($request, Closure $next, $userType)
{
    // Check if the user is of the specified type (e.g., 'admin')
    if ($request->user() && $request->user()->user_type !== $userType) {
        // Redirect, return an error response, or perform other actions
        return response('Unauthorized', 403);
    }

    return $next($request);
}
}
