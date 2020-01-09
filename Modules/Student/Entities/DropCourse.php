<?php

namespace Modules\Student\Entities;

use Modules\Core\Entities\BaseModel;

class DropCourse extends BaseModel
{
    public function student()
    {
    	return $this->belongsTo(Student::class);
    }

    public function session()
    {
    	return $this->belongsTo('Modules\Admin\Entities\Session');
    }

    public function course()
    {
    	return $this->belongsTo('Modules\Department\Entities\Course');
    }
}
