<?php

namespace Modules\Department\Http\Controllers\Programme\Course;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Department\Entities\Course;
use Modules\Student\Entities\Programme;
use Modules\Lecturer\Entities\Lecturer;
use Modules\Department\Entities\LecturerCourse;
use Modules\Department\Entities\LecturerCourseAllocation;
use Modules\Core\Http\Controllers\Department\HodBaseController;

class CourseAllocationController extends HodBaseController
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index($programmeId)
    {
        return view('department::department.programme.course.courseAllocation.index',['programme'=>Programme::find($programmeId)]);
    }

    public function register(Request $request)
    {
        $request->validate([
            'lecturer_id'=>'required',
            'department_id'=>'required',
        ]);

        $course = Course::find($request->course_id);
        if($this->courseHasAllocation($request->all())){
            if(!$this->lecturerHasThisCourseAllocation($request->all())){
                foreach ($course->lecturerCourses->where('department_id',$request->department_id) as $lecturerCourse) {
                    $lecturerCourse->update(['is_active'=>0,'to'=>time()]);
                }
                $course->lecturerCourses()->create([
                    'department_id'=>$request->department_id,
                    'lecturer_id'=>$request->lecturer_id,
                    'from'=>time()
                ]);
            }else{
                return redirect()->route('department.programme.course.allocation.index',[$course->programme->id])->with('warning','The course allocated already exit');
            }
        }else{
            $course->lecturerCourses()->create([
                'department_id'=>$request->department_id,
                'lecturer_id'=>$request->lecturer_id,
                'from'=>time(),
            ]);
        }
                
        return back()->with('success','The course allocated successfully');
    }

    public function lecturerHasThisCourseAllocation($data)
    {
        $flag = false;
        foreach(Lecturer::find($data['lecturer_id'])->lecturerCourses
            ->where('course_id',$data['course_id'])
            ->where('department_id',$data['department_id'])
            ->where('is_active',1) as $lecturerCourse){
            $flag = true;
        }
        return $flag;
    }

    public function courseHasAllocation($data)
    {
        $flag = false;
        foreach (Course::find($data['course_id'])->lecturerCourses
            ->where('department_id',$data['department_id'])
            ->where('is_active',1) as $active) {
            $flag = true;
        }
        return $flag;
    }
    
}
