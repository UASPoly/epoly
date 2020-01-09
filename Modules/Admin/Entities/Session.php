<?php

namespace Modules\Admin\Entities;

use Illuminate\Support\Carbon;
use Modules\Core\Entities\BaseModel;

class Session extends BaseModel
{
    public function sessionCalendar()
    {
    	return $this->hasOne(SessionCalendar::class);
    }

    public function sessionRegistrations()
    {
        return $this->hasMany('Modules\Student\Entities\SessionRegistration');
    }

    public function lecturerCourseResultUploads()
    {
        return $this->hasMany('Modules\Lecturer\Entities\LecturerCourseResultUpload');
    }

    public function countDown()
    {
    	$count = Carbon::parse($this->end)->diffInMonths(Carbon::now());
    	$month = 'Month';
    	if($count > 1){
    		$month = 'Months';
    	}
		return $count.' '.$month.' Remain';
    }

    public function graduatedStudents()
    {
        $students = [];
        foreach($this->sessionRegistrations->where('department_id',$this->userDepartment()->id) as $sessionRegistration){
            if($sessionRegistration->student->graduatedAt($this)){
                $students[] = $sessionRegistration->student;
            }
        }
        return $students;
    }

    public function spilledStudents()
    {
        $students = [];
        foreach($this->sessionRegistrations->where('department_id',$this->userDepartment()->id) as $sessionRegistration){
            if($sessionRegistration->student->spillededAt($this)){
                $students[] = $sessionRegistration->student;
            }
        }
        return $students;
    }
    public function withDrawStudents()
    {
        $students = [];
        foreach($this->sessionRegistrations->where('department_id',$this->userDepartment()->id) as $sessionRegistration){
            if($sessionRegistration->student->withDrawedAt($this)){
                $students[] = $sessionRegistration->student;
            }
        }
        return $students;
    }

    public function userDepartment()
    {
        return department();
    }

}
