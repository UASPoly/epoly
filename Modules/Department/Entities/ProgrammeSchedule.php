<?php

namespace Modules\Department\Entities;

use Modules\Core\Entities\BaseModel;

class ProgrammeSchedule extends BaseModel
{
    public function programme()
    {
    	return $this->belongsTo('Modules\Student\Entities\Programme');
    }

    public function schedule()
    {
    	return $this->belongsTo('Modules\Student\Entities\Schedule');
    }
}
