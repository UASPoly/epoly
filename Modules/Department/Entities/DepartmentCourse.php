<?php

namespace Modules\Department\Entities;

use Modules\Core\Entities\BaseModel;

class DepartmentCourse extends BaseModel
{

    public function department()
    {
    	return $this->belongsTo(Department::class);
    }

    public function course()
    {
    	return $this->belongsTo(Course::class);
    }

    public function programmeLevel()
    {
        return $this->belongsTo(ProgrammeLevel::class);
    }

    public function programme()
    {
        return $this->belongsTo('Modules\Student\Entities\Programme');
    }

    public function semester()
    {
        return $this->belongsTo(Semester::class);
    }

    public function courseLecturer()
    {
        $lecturerCourse = LecturerCourse::where([
            'course_id'=>$this->course_id,
            'department_id'=>$this->department_id,
            'is_active'=>1
        ])->first();
        return optional($lecturerCourse)->lecturer;
    }
}
