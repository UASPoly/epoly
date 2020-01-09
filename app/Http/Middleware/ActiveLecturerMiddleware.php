<?php

namespace App\Http\Middleware;

use Closure;

class ActiveLecturerMiddleware
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
        if(lecturer() && lecturer()->is_active == 0){
            session()->flush();
            session()->flash('error',['Sorry your access to the lecturer account has been revoke due to some issues,','For more information contact the school administrator']);
            return redirect()->route('department.hod.auth.auth');
        }
        return $next($request);
    }
}
