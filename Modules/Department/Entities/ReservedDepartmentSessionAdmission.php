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

    public function programme()
    {
        return $this->belongsTo('Modules\Student\Entities\Programme');
    }
    
    public function schedule()
    {
        return $this->belongsTo('Modules\Student\Entities\Schedule');
    }

}
