<?php

namespace Modules\Department\Entities;

use Modules\Core\Entities\BaseModel;

class LecturerCourse extends BaseModel
{

    public function course()
    {
    	return $this->belongsTo(Course::class);
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function programmeLevel()
    {
        foreach($this->department->departmentCourses->where('course_id',$this->course_id) as $departmentCourse){
            return $departmentCourse->programmeLevel;
        }
        
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
