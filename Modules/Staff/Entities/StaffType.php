<?php

namespace Modules\Staff\Entities;

use Modules\Core\Entities\BaseModel;

class StaffType extends BaseModel
{
	
    public function staffCategory()
    {
    	return $this->belongsTo(StaffCategory::class);
    }

    public function staffs()
    {
    	return $this->hasMany(Staff::class);
    }
}
