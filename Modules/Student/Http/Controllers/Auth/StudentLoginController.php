<?php

namespace Modules\Student\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class StudentLoginController extends Controller
{
    public function showLoginForm()
    {
      return view('student::auth.login');
    }

    public function login(Request $request)
    {
      // Validate the form data
      $this->validate($request, [
        'user_name'   => 'required|integer',
        'password' => 'required'
      ]);
      
      // Attempt to log the user in
      if (Auth::guard('student')->attempt(['user_name' => $request->user_name, 'password' => $request->password], $request->remember)) {
        // if successful, then redirect to their intended location
        return redirect()->intended(route('student.dashboard'));
      }

      // if unsuccessful, then redirect back to the login with the form data
      return redirect()->back()->withInput($request->only('user_name', 'remember'));
    }

    public function logout()
    {
        Auth::guard('student')->logout();
        return redirect('/student/login');
    }

    public function unauthorize()
    {
      return view('student::auth.auth');
    }
}
