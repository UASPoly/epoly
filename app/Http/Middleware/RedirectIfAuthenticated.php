<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        switch ($guard) {
        case 'admin':
            if (Auth::guard($guard)->check()) {
                return redirect()->route('admin.dashboard');
            }
            break;

        case 'staff':
            if (Auth::guard($guard)->check()) {
                return redirect()->route('staff.dashboard');
            }
            break;
          
        case 'lecturer':
            if (Auth::guard($guard)->check()) {
                return redirect()->route('lecturer.dashboard');
            }
            break;
        case 'exam_officer':
            if (Auth::guard($guard)->check()) {
                return redirect()->route('exam.officer.dashboard');
            }
            break;        
        case 'directer':
            if (Auth::guard($guard)->check()) {
                return redirect()->route('college.directer.dashboard');
            }
            break;
        case 'head_of_department':
            if (Auth::guard($guard)->check()) {
                return redirect()->route('department.hod.dashboard');
            }
            break;    
        default:
          if (Auth::guard($guard)->check()) {
              return redirect('/student');
          }
          break;
      }

      return $next($request);
    }
}
