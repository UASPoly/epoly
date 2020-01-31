<?php

namespace Modules\Admin\Http\Controllers\College\Department\Management;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Department\Entities\Department;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class ExamOfficerManagementController extends AdminBaseController
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index($departmentId)
    {
        return view('admin::college.department.management.examOfficer.index',['department'=>Department::find($departmentId)]);
    }

}
