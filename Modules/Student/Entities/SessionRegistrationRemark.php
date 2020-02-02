<?php

namespace Modules\Student\Entities;

use Modules\Core\Entities\BaseModel;

class SessionRegistrationRemark extends BaseModel
{
	
    public function sessionRegistration()
    {
    	return $this->belongsTo(SessionRegistration::class);
    }

    public function remark()
    {
    	return $this->belongsTo(Remark::class);
    }

    public function programmeLevel()
    {
    	return $this->belongsTo('Modules\DEpartment\Entities\ProgrammeLevel');
    }

}
