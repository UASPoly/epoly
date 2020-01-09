<?php

namespace Modules\Department\Entities;

use Modules\Core\Entities\BaseModel;

class ReservedDepartmentSessionAdmission extends BaseModel
{
    public function department()
    {
    	return $this->belongsTo(Department::class);
    }

    public function session()
    {
    	return $this->belongsTo('Modules\Admin\Entities\Session');
    }

    public function studentType()
    {
    	return $this->belongsTo('Modules\Student\Entities\StudentType');
    }
}
