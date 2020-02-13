<?php

namespace Modules\Department\Http\Controllers\Programme\Course;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Department\Entities\Course;
use Modules\Student\Entities\Programme;
use Modules\Core\Http\Controllers\Department\HodBaseController;

class CourseController extends HodBaseController
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index($programmeId)
    {
        return view('department::department.programme.course.index',['programme'=>Programme::find($programmeId)]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('department::department.programme.course.create');
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
            'programme_level_id'=>$request->level,
            'semester_id'=>$request->semester,
            'unit'=>$request->unit,
            'programme_id'=>$request->programme
        ]);
        return redirect()->route('department.programme.course.index')->with('success','Course is created successfully');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $course_id
     * @return Response
     */
    public function edit($course_id)
    {
        return view('department::department.programme.course.edit',['course'=>Course::find($course_id)]);
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
            'unit'=>$request->unit,
            'programme_level_id'=>$request->level,
            'programme_id'=>$request->programme,
            'semester_id'=>$request->semester,
        ]);
        return redirect()->route('department.programme.course.index',[$course->programme->id])->with('success','Course is updated successfully');
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
            return back()->with('success','Course is deleted successfully');
        }else{
            session()->flash('error',$errors);
        }
        return back();
    }

}
