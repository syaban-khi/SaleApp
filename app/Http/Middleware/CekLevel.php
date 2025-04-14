<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CekLevel
{
    public function handle($request, Closure $next, ...$levels)
    {
        if (!Auth::check()) {
            return redirect('/')->with('error', 'Please login first.');
        }

        $user = Auth::user();

        if (!isset($user->role)) {
            return redirect('/')->with('error', 'System error: Role not found.');
        }

        if (!in_array($user->role, $levels)) {
            return redirect('/')->with('error', 'You do not have access to this page.');
        }

        return $next($request);
    }
}
