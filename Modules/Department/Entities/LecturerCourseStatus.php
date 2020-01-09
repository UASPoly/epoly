<?php

namespace Modules\Department\Entities;

use Modules\Core\Entities\BaseModel;

class LecturerCourseStatus extends BaseModel
{
    public function lecturerCourses()
    {
    	return $this->hasMany(LecturerCourse::class);
    }
}
