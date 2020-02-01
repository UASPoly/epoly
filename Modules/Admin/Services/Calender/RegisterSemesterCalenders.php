<?php
namespace Modules\Admin\Services\Calender;

use Modules\Admin\Entities\Session;
use Modules\Admin\Services\Calender\SubSemesterCalendars;

/**
* this class initiate the calender's session and register various caleders
* of the two semesters
*/

class RegisterSemesterCalenders
{
	use SubSemesterCalenders;

    private $session;
    private $semesters;
    public $data;

	function __construct(array $semesters,array $data)
	{
		$this->semesters = $semesters;
		$this->data = $data;
		$this->session = $this->registerCurrentSession();
	}

	public function registerCurrentSession()
	{
        if(admin()){
            $start = date('Y')-1;
            $end = date('Y');
            $name = $start.'/'.$end;
            $sessions = [
            
                [
                    'name'=>$name,
                    'start'=>$this->data['session_start'],
                    'end'=>$this->data['session_end'],
                    'status'=> 0
                ],
                
            ];
        }else{
            if(currentSession()){
                currentSession()->delete();
            }
            $sessions = [
            
                [
                    'name'=>'2019/2020',
                    'start'=>$this->data['session_start'],
                    'end'=>$this->data['session_end'],
                    'status'=> 1
                ],
                
            ];
        }

        

        
        foreach ($sessions as $session) {
            $session = Session::firstOrCreate($session);
            
            $this->registerSemestersCalendar($session);
        }
	}

    public function registerSemestersCalendar($session)
    {
        $admin_id = 1;
        if(admin()){
            $admin_id = admin()->id;
        }
    	foreach ($this->semesters as $semester) {
            // create semester calender
    		$semesterCalendar = $session->semesterCalendars()->firstOrCreate([
                'semester_id'=>$semester
            ]);
            if($semester == 1){
                $semesterCalendar->update([
                    'start'=>$this->data['first_semester_start'],
                    'end'=>$this->data['first_semester_end'],
                ]);
            }else{
                $semesterCalendar->update([
                    'start'=>$this->data['second_semester_start'],
                    'end'=>$this->data['second_semester_end'],
                ]);
            }
            $uploadCalendar = $this->registerNewSemseterResultUploadCalendar($semesterCalendar);
            $lectureCalendar = $this->registerNewSemesterLectureCalendar($semesterCalendar);
            $allocationCalendar = $this->registerNewSemseterCourseAllocationCalendar($semesterCalendar);
            $markingCalendar = $this->registerNewSemesterExamMarkingCalendar($semesterCalendar);
            $examCalendar = $this->registerNewSemesterExamCalendar($semesterCalendar);
            $semesterCalendar->update([
                'lecture_calendar_id'=>$lectureCalendar->id,
                'course_allocation_calendar_id'=>$allocationCalendar->id,
                'marking_calendar_id'=>$markingCalendar->id,
                'upload_result_calendar_id'=>$uploadCalendar->id,
                'exam_calendar_id'=>$examCalendar->id
            ]);
    	}
    }

    
}