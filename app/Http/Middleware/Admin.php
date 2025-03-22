<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Admin
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
        if(Auth::check() && Auth::user()->is_admin == 1){
            return $next($request);
            // ['name' => 'Admin', 'email' => 'admin@admin.com', 'password' => bcrypt('adminpass'), 'email_verified_at' => now(), 'id' => 1];
        } else {
            return redirect(route('login'));
        }
    }
}
