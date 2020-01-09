<?php

namespace Modules\College\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Core\Http\Controllers\College\DirecterBaseController;

class CollegeController extends DirecterBaseController
{

    public function verify()
    {
        return redirect()->route('college.directer.dashboard');
    }
    
    public function index()
    {
        return view('college::index');
    }

    
}
