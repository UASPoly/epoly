<?php

namespace Modules\Department\Entities;

use Modules\Core\Entities\BaseModel;

class DepartmentalAppointment extends BaseModel
{
    public function department()
    {
    	return $this->belongsTo(Department::class);
    }

    public function appointment()
    {
    	return $this->belongsTo('Modules\Admin\Entities\Appointment');
    }

    public function lecturer()
    {
    	$this->belongsTo('Modules\Lecturer\Entities\Lecturer');
    }
    
}
