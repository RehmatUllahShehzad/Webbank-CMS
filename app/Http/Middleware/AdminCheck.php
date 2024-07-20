<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        if (!$user || !$user->roles()->count() || (!$user->isAdmin() && !$user->isActive())){
            Auth::logout();
            return redirect()->route('login')->withErrors(['email' => "Invalid Credentials or doesn't have any roles"]);
        }
        
        return $next($request);
    }
}
