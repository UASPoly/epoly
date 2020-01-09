<?php

namespace Modules\Student\Entities;

use Modules\Core\Entities\BaseModel;

class DiferringStatus extends BaseModel
{
    public function diferredSemesters()
    {
    	reteurn $this->hasMany(DiferredSemester::class);
    }

    public function diferredSessions()
    {
    	reteurn $this->hasMany(DiferredSession::class);
    }
}
