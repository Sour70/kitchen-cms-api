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
        // return response()->json(['message' => auth()->user()], 403);

        if (auth()->user()->role !== 'admin') {
        return response()->json(['message' => 'Unauthorized'], 403);
       }
        return $next($request);
    }
}
