<?php

namespace Modules\Department\Entities;

use Modules\Core\Entities\BaseModel;

class ProgrammeLevel extends BaseModel
{

    public function programme()
    {
    	return $this->belongsTo('Modules\Student\Entities\Programme');
    }
    
    public function courses()
    {
    	return $this->hasMany(Course::class);
    }

    public function departmentCourses()
    {
        return $this->hasMany(DepartmentCourse::class);
    }

    public function sessionRegistrations()
    {
        return $this->hasMany('Modules\Student\Entities\SessionRegistration');
    }
}
