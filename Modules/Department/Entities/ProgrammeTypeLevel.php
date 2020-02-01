<?php

namespace Modules\Department\Entities;

use Modules\Core\Entities\BaseModel;

class ProgrammeTypeLevel extends BaseModel
{
    public function programmeType()
    {
    	return $this->belongsTo(ProgrammeType::class)
    }

}
