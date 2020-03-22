<?php
namespace Modules\Department\Export\Result;
/**
* this class will download the score sheet of the course at particular session
*/
use Maatwebsite\Excel\Facades\Excel;
use Modules\Department\Export\Downloads\CourseResultDownload;


class CourseResultExport
{
    protected $courseResult;
    protected $session;
    protected $department;
    protected $course;

	function __construct($lecturerCourseResultUpload)
	{
		$this->courseResult = $lecturerCourseResultUpload;
		$this->session = $this->courseResult->session;
		$this->department = $this->courseResult->lecturerCourse->department;
		$this->course = $this->courseResult->lecturerCourse->course;
	}
    
	public function getFileData()
	{
		return $this->courseResult;

    }
    
	public function getFileName()
	{
        return str_replace('/','_',$this->session->name).' '.$this->department->name.' '.$this->course->code.' Result.csv';
	}

	public function downloadFile()
	{
		return Excel::download(new CourseResultDownload($this->getFileData()), $this->getFileName(),'Csv',['Content-Type' => 'text/csv']);
	}
}