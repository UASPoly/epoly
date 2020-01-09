<?php
namespace Modules\Admin\Services\Calender;

use Modules\Admin\Entities\Session;

/**
* 
*/
class DeleteAcademicCalender
{

	private $session;

	function __construct(Session $session)
	{
		$this->session = $session;
		$this->deleteAcademicCalenders();
	}

	public function deleteAcademicCalenders()
	{
		foreach ($this->session->calenders as $calender) {
			$this->deleteSubCalenders($calender);
		}
		$this->session->delete();
	}
    
    public function deleteSubCalenders($calender)
    {
    	
    	$calender->courseAllocationCalender ? $calender->courseAllocationCalender->delete() : '';
    	$calender->lectureCalender ? $calender->lectureCalender->delete() : '';
    	$calender->examCalender ? $calender->examCalender->delete() : '';
    	$calender->markingCalender ? $calender->markingCalender->delete() : '';
    	$calender->uploadResultCalender ? $calender->uploadResultCalender->delete() : '';
    	$calender ? $calender->delete() : '';
    }

}