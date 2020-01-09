<?php

namespace Modules\Department\Entities;

use Modules\Core\Entities\BaseModel;

class LecturerCourse extends BaseModel
{

    public function course()
    {
    	return $this->belongsTo(Course::class);
    }

    public function lecturer()
    {
    	return $this->belongsTo('Modules\Lecturer\Entities\Lecturer');
    }

    public function lecturerCourseStatus()
    {
    	return $this->belongsTo(LecturerCourseStatus::class);
    }

    public function lecturerCourseResultUploads()
    {
        return $this->hasMany('Modules\Lecturer\Entities\LecturerCourseResultUpload');
    }

    public function hasUploadedCurrentSessionResult()
    {
        if(count($this->lecturerCourseResultUploads->where('session_id',currentSession()->id)) > 0){
            return true;
        }
    }
    
}
