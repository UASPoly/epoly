<?php

namespace Modules\Department\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Core\Http\Controllers\Department\HodBaseController;

class DepartmentLecturerController extends HodBaseController
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {

        return view('department::department.lecturer.index',['staffs'=>headOfDepartment()->department->staffs]);
    }
}
