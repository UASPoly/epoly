<?php

namespace Modules\Department\Http\Controllers\Programme\Course;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Student\Entities\Programme;
use Modules\Department\Entities\Department;
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
}
