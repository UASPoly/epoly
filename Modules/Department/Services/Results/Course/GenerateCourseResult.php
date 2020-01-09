<?php
namespace Modules\Department\Services\Results\Course;

use Modules\Admin\Entities\Session;
use Modules\Department\Entities\Course;
use Modules\Lecturer\Entities\LecturerCourseResultUpload;

/**
* 
*/
class GenerateCourseResult
{
	private $data;
    public  $errors;
    public  $result;
    public $session;
    public $course;

	function __construct(array $data)
	{
		$this->data = $data;
		$this->verifySearch();
	}
    
    private function courseSearchOf()
    {
    	$this->course = Course::find($this->data['course']);
    }
    
    private function sessionSearchOf()
    {
    	$this->session = Session::find($this->data['session']);
    }
    
    private function hasUploadedResult()
    {
    	$uploaded_result = LecturerCourseResultUpload::where([
            'lecturer_course_id'=>$this->course->currentCourseLecturer()->id,
            'session_id'=>$this->session->id,
        ])->first();
        if(blank($uploaded_result)){
        	return false;
        }
        $this->result = $uploaded_result;
        return true;
    }

    private function verifySearch()
    {
    	$this->courseSearchOf();
    	$this->sessionSearchOf();
    	if(!$this->hasUploadedResult()){
            $this->errors = ['The result of '.$this->course->code.' at '.$this->session->name.' is not yet uploaded'];
    	}
    }    
}