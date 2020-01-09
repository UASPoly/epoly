<?php

namespace Modules\Student\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Core\Http\Controllers\Student\StudentBaseController;

class StudentController extends StudentBaseController
{
    public function verify()
    {
        return redirect()->route('student.dashboard');
    }

    public function index()
    {
        return view('student::index');
    }
}
