<?php

namespace Modules\Department\Entities;

use Illuminate\Database\Eloquent\Model;

class DepartmentProgrammeSchedule extends Model
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
