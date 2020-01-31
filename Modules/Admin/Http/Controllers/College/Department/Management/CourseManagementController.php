<?php

namespace Modules\Admin\Http\Controllers\College\Department\Management;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Department\Entities\Course;
use Modules\Department\Entities\Department;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class CourseManagementController extends AdminBaseController
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index($departmentId)
    {
        return view('admin::college.department.management.course.index',['department'=>Department::find($departmentId)]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function register(Request $request,$departmentId)
    {
        $request->validate([
            'title'=>'required|string',
            'code'=>'required',
            'programme'=>'required',
            'level'=>'required',
            'semester'=>'required',
            'unit'=>'required',
        ]);

        $department = Department::find($departmentId);
        $department->courses()->firstOrCreate([
            'title'=>$request->title,
            'code'=>$request->code,
            'programme_id'=>$request->programme,
            'level_id'=>$request->level,
            'semester_id'=>$request->semester,
            'unit'=>$request->unit
        ]);
        session()->flash('message','Course registered successfully');
        return back();
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $courseId)
    {

        $request->validate([
            'title'=>'required|string',
            'code'=>'required',
            'programme'=>'required',
            'level'=>'required',
            'semester'=>'required',
            'unit'=>'required',
        ]);
        $course = Course::find($courseId);
        
        $course->update([
            'title'=>$request->title,
            'code'=>$request->code,
            'programme_id'=>$request->programme,
            'level_id'=>$request->level,
            'semester_id'=>$request->semester,
            'unit'=>$request->unit
        ]);
        session()->flash('message','Course Information Updated');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function delete($departmentId,$courseId)
    {
        $course = Course::find($courseId);
        if(count($course->courseRegistrations) == 0){
            $course->delete();
            session()->flash('message','Course is deleted successfully');
        }else{
            session()->flash('error',['Sorry you will not be able to delete this course, it has been registered by many student']);
        }
        return back();
    }
}
