<?php
namespace Modules\Department\Services\Results\Student;

use Modules\Student\Entities\SessionRegistration;

/**
* this class will the register the emc verdict remark for the student
*/
class MakeStudentRemark
{
	
	function __construct(array $data)
	{
		$this->data = $data;
		$this->verifyRemarkRegistration();
	}

	public function cancellationOfSemester()
	{
		foreach ($this->registration->semesterRegistrations->where('semester_id',request()->route('semester_id')) as $semester_registration) {
			//cancel the semester registration
	        $semester_registration->update(['cancelation_status'=>1]);
	        //cancel all the course registration in the semester
	        foreach ($semester_registration->courseRegistrations as $courseRegistration) {
	        	$this->cancelCourseRegistration($courseRegistration);
	        }
	        $semester_registration->semesterRegistrationRemarks()->firstOrCreate([
	            'remark_id' => $this->data['remark']
	        ]);
	    }
	}

    public function cancelCourseRegistration($registration)
    {
    	$registration->cancelation_status = 1;
    	$registration->save();
    	$registration->course->reRegisterCourses()->firstOrCreate([
    		'student_id'=>$registration->semesterRegistration->sessionRegistration->student->id,
    		'status'=>1,
    		'session_id'=>currentSession()->id
    	]);
    }

	public function willDraw()
	{
		$this->registration->student->update(['is_active'=>0]);
	}

	public function cancellationOfSession()
	{
		$this->registration->cancelation_status =1;
		$this->registration->save();
		foreach ($this->registratration->semesterRegistrations as $semesterRegistration) {
			foreach ($semesterRegistration->courseRegistrations as $courseRegistration) {
	        	$this->cancelCourseRegistration($courseRegistration);
	        }
		}

	}

	public function cancelationOfExam()
	{
		request()->validate(['course'=>'required']);
	    foreach($this->registration->semesterRegistrations->where('semester_id',request()->route('semester_id')) as $semester_registration){
	        $course_registration = $semester_registration->courseRegistrations->where('course_id',$this->data['course'])->first();
	        $this->cancelCourseRegistration($course_registration);
	    }
	}

	public function currentRegistration()
	{
		$this->registration = SessionRegistration::find($this->data['registration_id']);
	}

	public function verifyRemarkRegistration()
	{
		$this->currentRegistration();
		request()->validate(['remark'=>'required']);
	    switch ($this->data['remark']) {
	        case '1':
	            # semester cancelation
	            $this->cancellationOfSemester();
	            break;
	        
	        case '2':
	            # with draw
	            $this->willDraw();
	            break;
	        
	        case '3':
	            # exam cancelation
	            $this->cancelationOfExam();
	            break;
	        default:
	            //
	            break;
	    }
	    $this->registerTheRemark();
	}
   
    public function registerTheRemark()
    {
    	if($this->data['remark'] != 1){
            $this->registration->sessionRegistrationRemarks()->firstOrCreate([
                'remark_id'=>$this->data['remark']
            ]);
        }
    }
}