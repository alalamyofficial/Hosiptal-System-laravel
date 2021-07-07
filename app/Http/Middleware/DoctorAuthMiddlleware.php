<?php

namespace App\Http\Middleware;

use Closure;
use App\DoctorAuth;

class DoctorAuthMiddlleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (auth()->check()) {
            if (!auth()->DoctorAuth()) {
                auth()->logout();

                return redirect()->route('doctor_home')->with('message', 'Done');
            }
        }
        
        return $next($request);
    }
}
