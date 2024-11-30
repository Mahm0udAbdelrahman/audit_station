<?php

namespace Modules\Instructor\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class InstructorMiddleware
{
    /**
     * Handle an incoming request.
     */
    // public function handle(Request $request, Closure $next)
    // {
    //     return $next($request);
    // }


    public function handle($request, Closure $next)
    {
        if (auth()->check() && auth()->user()->isInstructor()) {
            return $next($request);
        }

        return response()->json(['message' => 'Unauthorized'], 403);
    }
}
