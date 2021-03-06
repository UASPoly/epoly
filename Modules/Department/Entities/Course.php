<?php

namespace Modules\Department\Entities;

use Modules\Core\Entities\BaseModel;

class Course extends BaseModel
{
    public function departmentCourses()
    {
    	return $this->hasMany(DepartmentCourse::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function courseRegistrations()
    {
        return $this->hasMany('Modules\Student\Entities\CourseRegistration');
    }

    public function repeatCourses()
    {
        return $this->hasMany('Modules\Student\Entities\RepeatCourse');
    }

    public function reRegisterCourses()
    {
        return $this->hasMany('Modules\Student\Entities\ReRegisterCourse');
    }

    public function dropCourses()
    {
        return $this->hasMany('Modules\Student\Entities\DropCourse');
    }

    public function lecturerCourses()
    {
    	return $this->hasMany(LecturerCourse::class);
    }

    public function programmeLevel()
    {
    	return $this->belongsTo(ProgrammeLevel::class);
    }

    public function semester()
    {
    	return $this->belongsTo(Semester::class);
    }

    public function programme()
    {
        return $this->belongsTo('Modules\Student\Entities\Programme');
    }

    public function lecturerCourseAllocations()
    {
    	return $this->hasMany(LecturerCourseAllocation::class);
    }

    public function currentCourseMaster()
    {
        
        $lecturer = null;
        foreach($this->lecturerCourses->where('department_id',department()->id)->where('is_active',1) as $lecturerCourse){
            $lecturer = $lecturerCourse->lecturer;
        }
        return $lecturer;
    }

    public function courseLecturer()
    {
        $lecturer = null;
        foreach($this->lecturerCourses->where('department_id',department()->id)->where('is_active',1) as $lecturerCourse){
            $lecturer = $lecturerCourse->lecturer;
        }
        return $lecturer;
    }

    
}
