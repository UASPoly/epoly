<?php

namespace Modules\Student\Entities;

use Modules\Core\Entities\BaseModel;

class SemesterRegistrationRemark extends BaseModel
{
    public function semesterRegistration()
    {
    	return $this->belongsTo(SemesterRegistration::class);
    }

    public function remark()
    {
    	return $this->belongsTo(Remark::class);
    }
    
}
