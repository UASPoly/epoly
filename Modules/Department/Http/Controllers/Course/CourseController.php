<?php

namespace Modules\Department\Http\Controllers\Course;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Department\Entities\Course;
use Modules\Core\Http\Controllers\Department\HodBaseController;

class CourseController extends HodBaseController
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('department::department.course.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('department::department.course.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function register(Request $request)
    {
        $course = headOfDepartment()->department->courses()->create([
            'code'=>$request->code,
            'title'=>$request->title,
            'level_id'=>$request->level,
            'semester_id'=>$request->semester,
            'unit'=>$request->unit
        ]);
        headOfDepartment()->department->departmentCourses()->create(['course_id'=>$course->id]);
        session()->flash('message','Course is created successfully');
        return redirect()->route('department.course.index');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $course_id
     * @return Response
     */
    public function edit($course_id)
    {
        return view('department::department.course.edit',['course'=>Course::find($course_id)]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $course_id
     * @return Response
     */
    public function update(Request $request, $course_id)
    {
        $course = Course::find($course_id);
        $course->update([
            'code'=>$request->code,
            'title'=>$request->title,
            'level_id'=>$request->level,
            'semester_id'=>$request->semester,
            'unit'=>$request->unit
        ]);
        session()->flash('message','Course is updated successfully');
        return redirect()->route('department.course.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $course_id
     * @return Response
     */
    public function delete($course_id)
    {
        $errors = [];
        $course = Course::find($course_id);
        //check if this course is not allocated to any lecturer
        if($course->lecturerCourseAllocation){
            $errors[] = 'Sorry this course is already been allocated to some lecturer to delete it you have to delete the allocation';
        }
        if($course->departmentCourses){
            $errors[] = 'Sorry this course is already been assigned to some department to delete it you have to delete the department course assignment';
        }
        if(empty($errors)){
            $course->delete();
            session()->flash('message','Course is deleted successfully');
        }else{
            session()->flash('error',$errors);
        }
        return redirect()->route('department.course.index');
    }
}
