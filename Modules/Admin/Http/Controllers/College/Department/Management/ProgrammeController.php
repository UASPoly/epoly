<?php

namespace Modules\Admin\Http\Controllers\College\Department\Management;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Department\Entities\Department;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class ProgrammeController extends AdminBaseController
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index($department,$departmentId)
    {
        return view('admin::college.department.management.programme.index',['department'=>Department::find($departmentId)]);
    }

    public function register(Request $request)
    {
        $request->validate([
            'code'=>'required',
            'programmeId'=>'required'
        ]);
        Department::find($request->departmentId)->addProgramme($request->all());
        session()->flash('message', 'Department programme added successfully');
        return back();
    }

    public function update(Request $request)
    {
        $request->validate([
            'code'=>'required',
            'programmeId'=>'required'
        ]);
        Department::find($request->departmentProgrammeId)->updateProgramme($request->all());
        session()->flash('message', 'Department Programme updated successfully');
        return back();
    }

}
