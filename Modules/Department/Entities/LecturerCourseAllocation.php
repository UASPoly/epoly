<?php

namespace Modules\Department\Entities;

use Modules\Core\Entities\BaseModel;

class LecturerCourseAllocation extends BaseModel
{
    public function department()
    {
    	return $this->belongsTo(Department::class);
    }

    public function lecturer()
    {
    	return $this->belongsTo('Modules\Lecturer\Entities\Lecturer');
    }

    public function course()
    {
    	return $this->belongsTo(Course::class);
    }
}
