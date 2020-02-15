<?php
namespace Modules\Lecturer\Services\Result;

/**
* this class will upload the score sheet of the course at particular session
*/
class UploadScoreSheet extends DownloadScoreSheet
{
	function __construct(array $data)
	{
		$this->data = $data;
		$this->currentCourse();
	}
    
    public function uploadedBy()
    {
    	$lecturerCourse = null;
    	foreach ($this->course->lecturerCourses->where('department_id',$this->data['department'])->where('is_active',1) as $courseLecturer) {
    		$lecturerCourse = $courseLecturer;
    	}
    	
        return $lecturerCourse->lecturerCourseResultUploads()->firstOrCreate(['session_id'=>$this->data['session']]);
    }
}