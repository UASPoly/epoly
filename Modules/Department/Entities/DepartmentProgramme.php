<?php

namespace Modules\Department\Entities;

use Modules\Core\Entities\BaseModel;

class DepartmentProgramme extends BaseModel
{
    public function department()
    {
    	return $this->belongsTo(Department::class);
    }

    public function programme()
    {
    	return $this->belongsTo(Department::class);
    }

    public function departmentProgrammeSchedules()
    {
    	return $this->hasMany(DepartmentProgrammeSchedule::class);
    }
    
}
