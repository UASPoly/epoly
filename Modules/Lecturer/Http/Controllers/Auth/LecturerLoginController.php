<?php

namespace Modules\Lecturer\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class LecturerLoginController extends Controller
{
    public function showLoginForm()
    {
      return view('lecturer::auth.login');
    }

    public function login(Request $request)
    {
      // Validate the form data
      $this->validate($request, [
        'email'   => 'required|email',
        'password' => 'required'
      ]);

      // Attempt to log the user in
      if (Auth::guard('lecturer')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
        // if successful, then redirect to their intended location
        return redirect()->intended(route('lecturer.dashboard'));
      }

      // if unsuccessful, then redirect back to the login with the form data
      return redirect()->back()->withInput($request->only('email', 'remember'));
    }
    public function unauthorize()
    {
      return view('lecturer::auth.auth');
    }
    public function logout()
    {
        Auth::guard('lecturer')->logout();
        return redirect('/lecturer/login');
    }
}
