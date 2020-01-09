<?php

namespace Modules\Department\Entities;

use Modules\Core\Entities\BaseModel;
use Modules\Staff\Entities\Tribe;
use Modules\Staff\Entities\Gender;
use Modules\Staff\Entities\Religion;
use Modules\Department\Services\Admission\AfterAdmission;
use Modules\Admission\Services\Traits\AdmissionHasDetail;
use Modules\Department\Services\Admission\CanUpdateAdmission as UpdateAble;
class Admission extends BaseModel
{
	
	use AdmissionHasDetail, UpdateAble, AfterAdmission;

    public function student()
    {
    	return $this->hasOne('Modules\Student\Entities\Student');
    }

    public function courseRegistrations()
    {
        return $this->hasMany('Modules\Student\Entities\CourseRegistration');
    }

    public function department()
    {
    	return $this->belongsTo('Modules\Department\Entities\Department');
    }

    public function genders()
    {
        return Gender::all();
    }

    public function religions()
    {
        return Religion::all();
    }

    public function tribes()
    {
        return Tribe::all();
    }
}
