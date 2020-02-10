<?php

namespace Modules\ExamOfficer\Http\Controllers\Programme\Course;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Department\Entities\Course;
use Modules\Student\Entities\Programme;
use Modules\Core\Http\Controllers\Department\ExamOfficerBaseController;

class CourseController extends ExamOfficerBaseController
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index($programmeId)
    {
        return view('examofficer::programme.course.index',['programme'=>Programme::find($programmeId),'route'=>[
                'edit'=>'exam.officer.department.programme.course.edit',
                'delete'=>'exam.officer.department.programme.course.delete',
            ]
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('examofficer::course.create',['route'=>'exam.officer.department.course.register']);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function register(Request $request)
    {
        $course = department()->courses()->firstOrCreate([
            'code'=>$request->code,
            'title'=>$request->title,
            'programme_level_id'=>$request->level,
            'programme_id'=>$request->programme,
            'semester_id'=>$request->semester,
            'unit'=>$request->unit
        ]);
        department()->departmentCourses()->create(['course_id'=>$course->id]);
        session()->flash('message','Course is created successfully');
        return redirect()->route('exam.officer.department.programme.course.index',['route'=>[
                'edit'=>'exam.officer.department.course.edit',
                'delete'=>'exam.officer.department.course.delete',
            ]
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($programmeId,$courseId)
    {
        return view('examofficer::programme.course.edit',['route'=>'exam.officer.department.programme.course.update','course'=>Course::find($courseId)]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $course_id)
    {
        $course = Course::find($course_id);
        $course->update([
            'code'=>$request->code,
            'title'=>$request->title,
            'programme_level_id'=>$request->level,
            'programme_id'=>$request->programme,
            'semester_id'=>$request->semester,
            'unit'=>$request->unit
        ]);
        return back()->with('success',$course->code.' Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
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
            return back()->with('success','Course deleted successfully');
        }else{
            session()->flash('error',$errors);
            return back();
        }
        
    }
}
