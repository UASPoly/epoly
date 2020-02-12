<?php

namespace Modules\Student\Entities;

use Modules\Core\Entities\BaseModel;

class Programme extends BaseModel
{
	
    public function students()
    {
    	return $this->hasMany(Student::class);
    }

    public function levels()
    {
    	return $this->hasMany('Modules\Department\Entities\Level');
    }

    public function courses()
    {
        return $this->hasMany('Modules\Department\Entities\Course');
    }

    public function department()
    {
    	return $this->belongsTo('Modules\Department\Entities\Department');
    }

    public function programmeType()
    {
        return $this->belongsTo('Modules\Department\Entities\ProgrammeType');
    }

    public function programmeLevels()
    {
        return $this->hasMany('Modules\Department\Entities\ProgrammeLevel');
    }

    public function reservedDepartmentSessionAdmissions()
    {
        return $this->hasMany('Modules\Department\Entities\ReservedDepartmentSessionAdmission');
    }

    public function departmentSessionAdmissions()
    {
        return $this->hasMany('Modules\Department\Entities\DepartmentSessionAdmission');
    }

    public function admissions()
    {
        return $this->hasMany('Modules\Department\Entities\Admission');
    }

    public function programmeSchedules()
    {
        return $this->hasMany('Modules\Department\Entities\ProgrammeSchedule');
    }

    public function departmentCourses()
    {
        return $this->hasMany('Modules\Department\Entities\DepartmentCourse');
    }

    public function hasMorningSchedule()
    {
        $flag = false;
        foreach ($this->programmeSchedules->where('schedule_id', 1) as $schedule) {
            $flag = true;
        }
        return $flag;
    }

    public function hasEveningSchedule()
    {
        $flag = false;
        foreach ($this->programmeSchedules->where('schedule_id', 2) as $schedule) {
            $flag = true;
        }
        return $flag;
    }

    public function serviceInCourses()
    {
        return $this->departmentCourses;
    }

    public function serviceOutCourses()
    {
        $courses = [];
        foreach ($this->courses as $course) {
            foreach($course->departmentCourses as $departmentCourse){
                $courses[] = $departmentCourse;
            }
        }
        return $courses;
    }

}
