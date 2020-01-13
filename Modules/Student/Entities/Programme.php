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

    public function department()
    {
    	return $this->belongsTo('Modules\Department\Entities\Department');
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

}
