<?php

namespace Modules\Department\Http\Controllers\Programme\Course;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Department\Entities\Course;
use Modules\Student\Entities\Programme;
use Modules\Department\Entities\Department;
use Modules\Department\Entities\DepartmentCourse;
use Modules\Core\Http\Controllers\Department\HodBaseController;

class ServiceCourseController extends HodBaseController
{
    public function serviceOutCourses($programmeId)
    {
        $programme = Programme::find($programmeId);

        return view('department::department.programme.course.service',[
            'departmentCourses'=>$programme->serviceOutCourses(),
            'programme'=>$programme,
            'status'=>'out'
        ]);
    }

    public function serviceInCourses($programmeId)
    {
        $programme = Programme::find($programmeId);

        return view('department::department.programme.course.service',[
            'departmentCourses'=>$programme->serviceInCourses(),
            'departments'=>Department::all(),
            'programme'=>$programme,
            'status'=>'in'
        ]);
    }
    public function register(Request $request)
    {
        $request->validate([
            "myprogramme" => "required",
            "department" => "required",
            "course" => "required",
            "myprogrammelevel" => "required"
        ]);
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

    public function update(Request $request,$programmeId, $departmentCourseId)
    {
        $request->validate([
            "myprogramme" => "required",
            "department" => "required",
            "course" => "required",
            "myprogrammelevel" => "required"
        ]);

        $departmentCourse = DepartmentCourse::find($departmentCourseId);
        if(!$this->alreadyRegistered($request->all())){
            $departmentCourse->update([
                'programme_level_id'=>$request->myprogrammelevel,
                'department_id'=>$request->department,
                'programme_id'=>$request->myprogramme,
                'course_id'=>$request->course,
                'semester_id'=>Course::find($request->course)->semester->id,
            ]);
            return back()->withSuccess('Course information updated successfully');
        }else{
            return back()->withError('Sorry this course was already exist in this programme');
        }
        
    }

    public function delete($programmeId, $departmentCourseId)
    {
        $departmentCourse = DepartmentCourse::find($departmentCourseId);
        $departmentCourse->delete();
        return back()->withSuccess('Course was removed from your borrowed course for this programme');
    }
}
