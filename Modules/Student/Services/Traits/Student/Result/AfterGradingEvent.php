<?php
namespace Modules\Student\Services\Traits\Student\Result;

trait AfterGradingEvent
{
	public function repeat()
    {
        $this->courseRegistration->course->repeatCourses()->firstOrCreate([
            'student_id'=>$this->courseRegistration->semesterRegistration->sessionRegistration->student->id,
            'session_id'=>$this->courseRegistration->session_id + 1,
            'status'=>1
        ]);
    }

    public function reRegister()
    {
        $this->courseRegistration->course->reRegisterCourse()->firstOrCreate([
            'student_id'=>$this->courseRegistration->semesterRegistration->sessionRegistration->student->id,
            'session_id'=>$this->courseRegistration->session_id + 1,
            'status'=>1
        ]);
    }

    public function approved()
    {
        if($this->lecturerCourseResultUpload && $this->lecturerCourseResultUpload->verification_status == 1){
            return true;
        }
        return false;
    }

    public function uploaded()
    {
        if($this->lecturerCourseResultUpload){
            return true;
        }
    }
}