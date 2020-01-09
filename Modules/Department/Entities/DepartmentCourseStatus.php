<?php

namespace Modules\Department\Entities;

use Modules\Core\Entities\BaseModel;

class DepartmentCourseStatus extends BaseModel
{
    public function departmentCourses()
    {
    	return $this->hasMany(DepartmentCourse::class);
    }
}
