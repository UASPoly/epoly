<?php

namespace App\Http\Middleware;

use Closure;

class ActiveHeadOfDepartmentMiddleware
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
        if(headOfDepartment() && headOfDepartment()->is_active == 0){
            session()->flush();
            session()->flash('error',['Sorry your access to this account has been revoke due to the new appointment of the head of your department,','For more information contact the school administrator']);
            return redirect()->route('department.hod.auth.auth');
        }
        return $next($request);
    }
}
