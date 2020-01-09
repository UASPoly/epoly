<?php

namespace Modules\Admin\Entities;

use Modules\Core\Entities\BaseModel;

class Appointment extends BaseModel
{

    public function departmentalAppointments()
    {
    	return $this->hasMany('Modules\Department\Entities\DepartmentalAppointment');
    }

    public function appointmentType()
    {
    	return $this->belongsTo(AppointmentType::class);
    }
    
}
