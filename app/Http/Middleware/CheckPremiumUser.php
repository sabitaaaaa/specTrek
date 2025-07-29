<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckPremiumUser
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check() && !auth()->user()->is_premium) {
            return redirect()->route('stripe')->with('error', 'Please pay to access premium features.');
        }

        return $next($request);
    }
}

