<?php
namespace Modules\Department\Services\Results\Course;

use Modules\Admin\Entities\Session;
use Modules\Department\Entities\Course;
use Modules\Department\Entities\LecturerCourse;
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
        if(!isset($this->data['department'])){
            $this->data['department'] = LecturerCourse::find($this->data['course'])->department_id;
            $this->data['course'] = LecturerCourse::find($this->data['course'])->course_id;
        }
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
            'lecturer_course_id'=>$this->getThisLecturerCourseId()->id,
            'session_id'=>$this->session->id,
        ])->first();

        if(blank($uploaded_result)){
        	return false;
        }
        $this->result = $uploaded_result;
        return true;
    }
    
    public function getThisLecturerCourseId()
    {
        foreach ($this->course->courseLecturer()->lecturerCourses->where('department_id',$this->data['department'])->where('is_active',1) as $lecturerCourse) {
            return $lecturerCourse;
        }
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