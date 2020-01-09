<?php

namespace Modules\Core\Http\Controllers\Department;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class ExamOfficerBaseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:exam_officer');
        $this->middleware('active_exam_officer');
    }
}
