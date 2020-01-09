<?php

namespace Modules\Admin\Http\Controllers\college\Department;
use Illuminate\Http\Response;
use Modules\College\Entities\College;
use Modules\Department\Entities\Department;
use Modules\Department\Http\Requests\DepartmentFormRequest;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class DepartmentController extends AdminBaseController
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('admin::college.department.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('admin::college.department.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function register(DepartmentFormRequest $request)
    {
        $college= College::find($request->college);
        $college->departments()->create([
            'established_date'=>$request->established_date,
            'name'=>$request->name,
            'description'=>$request->description,
            'code'=>$request->code,
            'admin_id' => admin()->id
        ]);
        session()->flash('message','Department created successfully');
        return redirect()->route('admin.college.department.index');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($department, $department_id)
    {
        return view('admin::college.department.edit',['department'=>Department::find($department_id)]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(DepartmentFormRequest $request, $id)
    {
        $department = Department::find($department_id);
        $department->update([
            'college_id'=>$request->college,
            'established_date'=>$request->established_date,
            'code'=>$request->code,
            'name'=>$request->name,
            'description'=>$request->description,
        ]);
        session()->flash('message','Department updated successfully');
        return redirect()->route('admin.college.department.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function delete($id)
    {
        $department = Department::find($department_id);
        if($department->staffs){
            session()->flash('error','[Sorry you can not delete this department at moment be cause there are staffs under it you have to delete them first]');
        }else{
            $department->delete();

            session()->flash('message','Department deleted successfully');
        }
        
        return redirect()->route('admin.college.department.index');
    }
}