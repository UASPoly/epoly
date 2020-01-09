<?php

namespace Modules\Department\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Core\Http\Controllers\Department\HodBaseController;

class DepartmentController extends HodBaseController
{
    
    public function verify()
    {
        return redirect()->route('department.hod.dashboard');
    }

    public function index()
    {
        return view('department::index');
    }

}
