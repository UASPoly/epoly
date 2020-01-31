<?php

namespace Modules\Admin\Http\Controllers\College\Department\Management;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Department\Entities\Department;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class HodManagementController extends AdminBaseController
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index($departmentId)
    {
        return view('admin::college.department.management.headOfDepartment.index',['department'=>Department::find($departmentId)]);
    }

    

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function appoint(Request $request)
    {
        $request->validate(['lecturer'=>'required']);
        return redirect()->route('admin.college.department.appointment.hod.create',[$request->lecturer]);
    }

}
