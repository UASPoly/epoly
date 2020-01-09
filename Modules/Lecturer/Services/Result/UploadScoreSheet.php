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
    	$course_lecturer = $this->course->currentCourseLecturer();
        return $course_lecturer->lecturerCourseResultUploads()->firstOrCreate(['session_id'=>$this->data['session']]);
    }
}