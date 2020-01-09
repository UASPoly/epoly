<?php

namespace Modules\Department\Entities;

use Modules\Core\Entities\BaseModel;

class DepartmentCourse extends BaseModel
{
    public function department()
    {
    	return $this->belongsTo(Department::class);
    }
    public function course()
    {
    	return $this->belongsTo(Course::class);
    }
    public function departmentCourseStatus()
    {
    	return $this->belongsTo(DepartmentCourseStatus::class);
    }
}
