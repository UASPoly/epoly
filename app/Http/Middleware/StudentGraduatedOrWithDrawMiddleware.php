<?php

namespace App\Http\Middleware;

use Closure;

class StudentGraduatedOrWithDrawMiddleware
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
        if(student()->graduated()){
            return redirect()->route('student.graduation.status.page');
        }elseif(student()->withDrawed()){
            return redirect()->route('student.withdraw.status.page');
        }
        return $next($request);
    }
}
