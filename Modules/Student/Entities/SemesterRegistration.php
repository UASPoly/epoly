<?php

namespace Modules\Student\Entities;

use Modules\Core\Entities\BaseModel;
use Modules\Department\Services\Results\Student\ResultGeneralRemark;
use Modules\Student\Services\Traits\Student\HasGradePointCalculator as Calculator;
class SemesterRegistration extends BaseModel
{
	use ResultGeneralRemark, Calculator;

    public function sessionRegistration()
    {
    	return $this->belongsTo(SessionRegistration::class);
    }

    public function semesterRegistrationRemarks()
    {
    	return $this->hasMany(SemesterRegistrationRemark::class);
    }
    
    public function courseRegistrations()
    {
    	return $this->hasMany(CourseRegistration::class);
    }

    public function semester()
    {
    	return $this->belongsTo('Modules\Department\Entities\Semester');
    }

    

}
