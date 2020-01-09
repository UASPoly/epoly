<?php

namespace App\Http\Middleware;

use Closure;

class StaffVerificationMiddleware
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
        if(!staff()->staffType){
            session()->flush();
            session()->flash('error',["Sorry your registration is haven't been completed please contact the school administrator for more information"]);
            return redirect()->route('staff.auth.unauthorize');
        }
        return $next($request);
    }
}
