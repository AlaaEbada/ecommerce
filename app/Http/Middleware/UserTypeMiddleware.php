<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserTypeMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, $types)
    {
        $user = Auth::user();

        if (!$user) {
            return redirect('/')->with('error', 'Unauthorized access!');
        }

        // Convert the comma-separated string of user types into an array
        $allowedTypes = explode(',', $types);

        // Check if the user's type is in the allowed types
        if (!in_array($user->usertype, $allowedTypes)) {
            return redirect('/')->with('error', 'Unauthorized access!');
        }

        return $next($request);
    }
}
