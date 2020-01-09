<?php

namespace Modules\Staff\Entities;

use Modules\Core\Entities\BaseModel;

class StaffCategory extends BaseModel
{
    public function staffs()
    {
    	return $this->hasMany(Staff::class);
    }
    public function staffTypes()
    {
    	return $this->hasMany(StaffType::class);
    }
    public function positions()
    {
    	return $this->hasMany(Position::class);
    }
}
