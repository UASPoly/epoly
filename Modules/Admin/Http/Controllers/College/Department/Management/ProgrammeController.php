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
    public function index($departmentId)
    {
        return view('admin::college.department.management.programme.index',['department'=>Department::find($departmentId)]);
    }

    public function register(Request $request)
    {
        $request->validate([
            'code'=>'required',
            'name'=>'required',
            'title'=>'required',
            'type'=>'required'
        ]);
        Department::find($request->departmentId)->addProgramme($request->all());
        
        return back();
    }

    public function update(Request $request)
    {
        $request->validate([
            'code'=>'required',
            'name'=>'required',
            'title'=>'required',
            'type'=>'required'
        ]);

        Department::find($request->departmentId)->updateProgramme($request->all());
        session()->flash('message', 'Department Programme updated successfully');
        return back();
    }

    public function deActivate($departmentId, $programmeId)
    {
        Department::find($departmentId)->deActivateProgramme($programmeId);
        session()->flash('message', 'Department Programme has been de-activate successfully');
        return back();
    }

    public function activate($departmentId, $programmeId)
    {
        Department::find($departmentId)->activateProgramme($programmeId);
        session()->flash('message', 'Department Programme has been activate successfully');
        return back();
    }

    public function delete($departmentId, $programmeId)
    {
        Department::find($departmentId)->deleteProgramme($programmeId);
        session()->flash('message', 'Department Programme was deleted successfully');
        return back();
    }


}
