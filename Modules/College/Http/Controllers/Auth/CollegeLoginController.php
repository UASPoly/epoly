<?php

namespace Modules\College\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class CollegeLoginController extends Controller
{
    public function showLoginForm()
    {
      return view('college::auth.login');
    }

    public function login(Request $request)
    {
      // Validate the form data
      $this->validate($request, [
        'email'   => 'required|email',
        'password' => 'required'
      ]);

      // Attempt to log the user in
      if (Auth::guard('directer')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
        // if successful, then redirect to their intended location
        return redirect()->intended(route('college.directer.dashboard'));
      }

      // if unsuccessful, then redirect back to the login with the form data
      return redirect()->back()->withInput($request->only('email', 'remember'));
    }

    public function unauthorize()
    {
      return view('college::auth.auth');
    }
    
    public function logout()
    {
        Auth::guard('lecturer')->logout();
        return redirect('/college/directer/login');
    }
}
