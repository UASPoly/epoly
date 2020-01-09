<?php
namespace Modules\Lecturer\Services\Result;

use Modules\Admin\Entities\Session;
use Modules\Department\Entities\Course;

trait VerifyUploadFile
{
	public function verifyThisFile($data)
	{
		$errors = [];
		if($this->getDowloadedFileSession($data)->id != currentSession()->id){
            $errors[] = 'This seems to be you either change the name of the dowloaded file or trying to upload the last session result if this error persist please download the new score sheet and upload it again';
		}
        if($this->getUploadedFileCourse($data)->id != $data['course']){
        	$errors[] = 'Invalid conbination of selected course or course score sheet please make sure the first six character of the file name to upload must matches the name of the selected course';
        }
		return $errors;
	}

	public function getDowloadedFileSession($data)
	{
		return $this->getThisSession(str_replace('_', '/',(substr($data['result']->getClientOriginalName(), 7,9))));
	}

    public function getUploadedFileCourse($data)
    {
    	return $this->getThisCourse(str_replace('_', '/',(substr($data['result']->getClientOriginalName(), 0,6))));
    }

	public function getThisSession($name)
	{
		$session = null;
		foreach (Session::where('name',$name)->get() as $thisSession) {
			$session = $thisSession;
		}
		return $session;
	}

	public function getThisCourse($name)
	{
		$course = null;
		foreach (Course::where('code',$name)->get() as $thisCourse) {
			$course = $thisCourse;
		}
		return $course;
	}
}