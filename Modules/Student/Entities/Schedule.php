<?php

namespace Modules\Student\Entities;

use Modules\Core\Entities\BaseModel;

class Schedule extends BaseModel
{
    public function students()
    {
    	return $this->hasMany(Student::class);
    }
}
