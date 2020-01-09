<?php

namespace App\Http\Middleware;

use Closure;

class ActiveCollegeDirecterMiddleware
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
        if(directer() && directer()->is_active == 0){
            session()->flush();
            session()->flash('error',['Sorry your access to this account has been revoke due to the new appointment of your college dircetr,','For more information contact the school administrator']);
            return redirect()->route('college.directer.auth.auth');
        }
        return $next($request);
    }
}
