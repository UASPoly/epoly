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
        $sessions = [
            
            [
                'name'=>'2019/2020',
                'start'=>$this->data['session_start'],
                'end'=>$this->data['session_end'],
                'status'=> 1
            ],
            [
                'name'=>'2018/2019',
                'start'=>$this->data['session_start'],
                'end'=>$this->data['session_end'],
                'status'=> 0
            ],
            
        ];
        foreach ($sessions as $session) {
            $session = Session::firstOrCreate($session);
            $sessionCalendar = $session->sessionCalendar()->firstOrCreate(['start'=>$this->data['session_start'],'end'=>$this->data['session_end']]);
            $this->registerSemestersCalendar($sessionCalendar);
        }
	}

    public function registerSemestersCalendar($sessionCalendar)
    {
        $admin_id = 1;
        if(admin()){
            $admin_id = admin()->id;
        }
    	foreach ($this->semesters as $semester) {
            // create semester calender
    		$semesterCalendar = $sessionCalendar->semesterCalendars()->firstOrCreate([
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
            $this->registerNewSemseterResultUploadCalendar($semesterCalendar);
            $this->registerNewSemesterLectureCalendar($semesterCalendar);
            $this->registerNewSemseterCourseAllocationCalendar($semesterCalendar);
            $this->registerNewSemesterExamMarkingCalendar($semesterCalendar);
            $this->registerNewSemesterExamCalendar($semesterCalendar);
            
    	}
    }

    
}