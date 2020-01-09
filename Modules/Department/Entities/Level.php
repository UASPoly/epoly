<?php

namespace Modules\Department\Entities;

use Modules\Core\Entities\BaseModel;

class Level extends BaseModel
{

    public function courses()
    {
    	return $this->hasMany(Course::class);
    }

    public function studentType()
    {
    	return $this->belongsTo('Modules\Student\Entities\StudentType');
    }

    public function sessionRegistrations()
    {
        return $this->hasMany('Modules\Student\Entities\SessionRegistration');
    }

}
