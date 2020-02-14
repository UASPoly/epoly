<?php

namespace Modules\ExamOfficer\Http\Controllers\Programme\Course;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Student\Entities\Programme;
use Modules\Department\Entities\Course;
use Modules\Department\Entities\Department;
use Modules\Core\Http\Controllers\Department\ExamOfficerBaseController;

class ServiceCourseController extends ExamOfficerBaseController
{
    public function serviceOutCourses($programmeId)
    {
        $programme = Programme::find($programmeId);

        return view('examofficer::programme.course.service',[
            'departmentCourses'=>$programme->serviceOutCourses(),
            'programme'=>$programme,
            'status'=>'out'
        ]);
    }

    public function serviceInCourses($programmeId)
    {
        $programme = Programme::find($programmeId);

        return view('examofficer::programme.course.service',[
            'departmentCourses'=>$programme->serviceInCourses(),
            'departments'=>Department::all(),
            'programme'=>$programme,
            'status'=>'in'
        ]);
    }
    public function register(Request $request)
    {
        $course = Course::find($request->course);

        if($this->alreadyRegistered($request->all())){
            return back()->with('warning','Sorry this course was already registered to this programme');
        }else{
            $course->departmentCourses()->create([
                'department_id' => department()->id,
                'programme_id' => $request->myprogramme,
                'programme_level_id' => $request->myprogrammelevel,
                'semester_id' => $course->semester->id,
            ]);
        }

        return back()->with('success','The course borrowed successfully');
    }

    public function alreadyRegistered($data)
    {
        $departmentCourse = DepartmentCourse::where(['department_id' => department()->id,
                'programme_id' => $data['myprogramme'],
                'programme_level_id' => $data['myprogrammelevel'],
                'course_id' => $data['course']])->first();
        if($departmentCourse){
            return true;
        }
    }
}
