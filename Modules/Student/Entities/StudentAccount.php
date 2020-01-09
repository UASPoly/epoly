<?php

namespace Modules\Student\Entities;

use Modules\Core\Entities\BaseModel;

class StudentAccount extends BaseModel
{
    public function student()
    {
    	return $this->belongsTo(Student::class);
    }

    public function gender()
    {
    	return $this->belongsTo('Modules\Staff\Entities\Gender');
    }

    public function tribe()
    {
    	return $this->belongsTo('Modules\Staff\Entities\Tribe');
    }

    public function religion()
    {
    	return $this->belongsTo('Modules\Staff\Entities\Religion');
    }

    public function lga()
    {
        return $this->belongsTo('Modules\Staff\Entities\Lga');
    }
}
