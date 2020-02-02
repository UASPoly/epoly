<?php

namespace Modules\Department\Entities;

use Modules\Core\Entities\BaseModel;

class ProgrammeType extends BaseModel
{

    public function programmes()
    {
    	return $this->hasMany('Modules\Student\Entities\Programme');
    }
}
