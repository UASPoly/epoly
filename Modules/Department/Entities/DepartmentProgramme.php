<?php

namespace Modules\Department\Entities;

use Modules\Core\Entities\BaseModel;

class DepartmentProgramme extends BaseModel
{
    public function department()
    {
    	return $this->belongsTo(Department::class);
    }

    public function admissions()
    {
    	return $this->hasMany(Admission::class);
    }

    public function programme()
    {
    	return $this->belongsTo('Modules\Student\Entities\Programme');
    }

    public function departmentProgrammeSchedules()
    {
    	return $this->hasMany(DepartmentProgrammeSchedule::class);
    }

    public function hasMorningSchedule()
    {
    	$flag = false;
    	foreach ($this->departmentProgrammeSchedules->where('schedule_id', 1) as $key => $value) {
    		$flag = true;
    	}
    	return $flag;
    }

    public function hasEveningSchedule()
    {
    	$flag = false;
    	foreach ($this->departmentProgrammeSchedules->where('schedule_id', 2) as $key => $value) {
    		$flag = true;
    	}
    	return $flag;
    }
    
}
