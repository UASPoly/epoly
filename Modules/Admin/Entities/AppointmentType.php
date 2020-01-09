<?php

namespace Modules\Admin\Entities;

use Modules\Core\Entities\BaseModel;

class AppointmentType extends BaseModel
{
    public function appointments()
    {
    	return $this->hasMany(Appointment::class);
    }
}
