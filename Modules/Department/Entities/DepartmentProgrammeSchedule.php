<?php

namespace Modules\Department\Entities;

use Modules\Core\Entities\BaseModel;

class DepartmentProgrammeSchedule extends BaseModel
{
    public function departmentProgramme()
    {
    	return $this->belongsTo(DepartmentProgramme::class);
    }

    public function schedule()
    {
    	return $this->hasMany('Modules\Student\Entities\Schedule');
    }
}
