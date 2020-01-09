<?php

namespace App\Http\Middleware;

use Closure;

class ActiveStudentMiddleware
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
        if(student() && student()->is_active == 0){
            session()->flush();
            session()->flash('error',['Sorry your access to your student account has been revoke due to some issues,','For more information contact your head of department']);
            return redirect()->route('student.auth.auth');
        }
        return $next($request);
    }
}
