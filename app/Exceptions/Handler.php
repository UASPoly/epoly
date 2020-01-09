<?php

namespace App\Exceptions;
use Exception;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];
    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];
    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }
    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        return parent::render($request, $exception);
    }
    
    protected function unauthenticated($request, AuthenticationException $exception)
    {
        if ($request->expectsJson()) {
            return response()->json(['error' => 'Unauthenticated.'], 401);
        }
        $guard = $exception->guards();
        switch ($guard[0]) {
            
            case 'admin':
                $login = 'admin.auth.login';
            break;

            case 'staff':
                $login = 'staff.auth.login';
            break;
            
            case 'lecturer':
                $login = 'lecturer.auth.login';
            break;

            case 'head_of_department':
                $login = 'department.hod.auth.login';
            break;

            case 'directer':
                $login = 'college.directer.auth.login';
            break;

            case 'student':
                $login = 'student.auth.login';
            break;

            case 'exam_officer':
                $login = 'exam.officer.auth.login';
            break;

            default:
                
            break;
        }
        return redirect()->guest(route($login));
    }
}
