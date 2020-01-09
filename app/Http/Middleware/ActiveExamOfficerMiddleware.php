<?php

namespace App\Http\Middleware;

use Closure;

class ActiveExamOfficerMiddleware
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
        if(examOfficer() && examOfficer()->is_active == 0){
            session()->flush();
            session()->flash('error',['Sorry your access to this account has been revoke due to the new appointment of the exam officer or another issue,','For more information contact the head of your department']);
            return redirect()->route('exam.officer.auth.auth');
        }
        return $next($request);
    }
}
