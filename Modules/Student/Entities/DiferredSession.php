<?php

namespace Modules\Student\Entities;

use Modules\Core\Entities\BaseModel;

class DiferredSession extends BaseModel
{
    public function session()
    {
    	return $this->belongsTo('Modules\Admin\Entities\Session');
    }

    public function student()
    {
    	return $this->belongsTo(Student::class);
    }

    public function diferringStatus()
    {
    	return $this->belongsTo(DiferringStatus::class);
    }

    public function department()
    {
    	return $this->belongsTo('Modules\Department\Entities\Department');
    }
}
