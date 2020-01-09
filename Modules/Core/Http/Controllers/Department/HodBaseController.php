<?php

namespace Modules\Core\Http\Controllers\Department;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class HodBaseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:head_of_department');
        $this->middleware('active_hod');
    }
}
