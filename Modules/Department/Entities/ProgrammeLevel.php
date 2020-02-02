<?php

namespace Modules\Department\Entities;

use Modules\Core\Entities\BaseModel;

class ProgrammeLevel extends BaseModel
{

    public function programme()
    {
    	return $this->belongsTo('Modules\Student\Entities\Programme');
    }

}
