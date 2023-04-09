<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CanCreateAccounts
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user()->role !== 'admin') {
            return redirect()->back()->with('error', 'You do not have permission to create new accounts.');
        }
        return $next($request);
    }
}
