<?php
namespace Modules\Admin\Services\Calender;

use Modules\Admin\Entities\Session;

/**
* this class initiate the calender's session and register various caleders
* of the two semesters
*/

class UpdateSemesterCalenders
{
	use UpdateSubSemesterCalenders;
    private $session;
    public $data;

	function __construct(Session $session, array $data)
	{
		$this->session = $session;
		$this->data = $data;
		$this->updateCurrentSession();
		$this->updateSemestersCalender();
	}

	public function updateCurrentSession()
	{
		$this->session->update([
			'name'=>$this->session->name,
			'start'=>$this->data['session_start'],
			'end'=>$this->data['session_end'],
		]);
	}

    public function updateSemestersCalender()
    {
    	foreach ($this->session->calenders as $calender) {
    		$calender->update([
                'upload_result_calender_id' => $this->updateNewSemseterResultUploadCalender($calender)->id,
                'semester_id' => $calender->semester->id,
                'lecture_calender_id' => $this->updateNewSemesterLectureCalender($calender)->id,
                'course_allocation_calender_id'=>$this->updateNewSemseterCourseAllocationCalender($calender)->id,
                'marking_calender_id'=>$this->updateNewSemesterExamMarkingCalender($calender)->id,
                'exam_calender_id' => $this->updateNewSemesterExamCalender($calender)->id,
                'admin_id' => admin()->id,
    		]);
            if($calender->semester->id == 1){
                $calender->update([
                    'start'=>$this->data['first_semester_start'],
                    'end'=>$this->data['first_semester_end'],
                ]);
            }else{
                $calender->update([
                    'start'=>$this->data['second_semester_start'],
                    'end'=>$this->data['second_semester_end'],
                ]);
            }
    	}
    }

    
}