<?php

namespace Modules\Department\Entities;

use Modules\Core\Entities\BaseModel;

class ProgrammeType extends BaseModel
{
    public function programmeTypeLevels()
    {
    	return $this->hasMany(ProgrammeTypeLevel::class);
    }

    public function programmes()
    {
    	return $this->hasMany('Modules\Student\Entities\Programme');
    }
}
