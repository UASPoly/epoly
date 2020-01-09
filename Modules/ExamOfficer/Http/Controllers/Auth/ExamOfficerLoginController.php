<?php

namespace Modules\ExamOfficer\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class ExamOfficerLoginController extends Controller
{
    public function showLoginForm()
    {
      return view('examofficer::auth.login');
    }

    public function login(Request $request)
    {
      // Validate the form data
      $this->validate($request, [
        'email'   => 'required|email',
        'password' => 'required|min:6'
      ]);

      // Attempt to log the user in
      if (Auth::guard('exam_officer')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
        // if successful, then redirect to their intended location
        return redirect()->intended(route('exam.officer.dashboard'));
      }

      // if unsuccessful, then redirect back to the login with the form data
      return redirect()->back()->withInput($request->only('email', 'remember'));
    }

    public function logout()
    {
        Auth::guard('exam_officer')->logout();
        return redirect('/exam-officer/login');
    }
    public function unauthorize()
    {
      return view('examofficer::auth.auth');
    }
}
