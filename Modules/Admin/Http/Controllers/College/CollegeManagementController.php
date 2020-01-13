<?php

namespace Modules\Admin\Http\Controllers\College;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\College\Entities\College;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class CollegeManagementController extends AdminBaseController
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index($collegeId)
    {
        return view('admin::college.management.index',['college'=>College::find($collegeId)]);
    }
}
