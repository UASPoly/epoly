<?php

namespace Modules\Department\Entities;

use Modules\Core\Entities\BaseModel;

class Semester extends BaseModel
{
    public function courses()
    {
    	return $this->hasMany(Course::class);
    }

    public function calenders()
    {
    	return $this->hasMany('Modules\Admin\Entities\Calender');
    }
}
