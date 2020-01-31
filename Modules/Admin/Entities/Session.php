<?php

namespace Modules\Admin\Entities;

use Illuminate\Support\Carbon;
use Modules\Core\Entities\BaseModel;

class Session extends BaseModel
{

    public function sessionRegistrations()
    {
        return $this->hasMany('Modules\Student\Entities\SessionRegistration');
    }

    public function semesterCalendars()
    {
        return $this->hasMany(SemesterCalendar::class);
    }

    public function lecturerCourseResultUploads()
    {
        return $this->hasMany('Modules\Lecturer\Entities\LecturerCourseResultUpload');
    }

    public function countDown()
    {
    	$count = Carbon::parse($this->end)->diffInMonths(Carbon::now());
    	$month = 'Month';
        $status = 'Ago';
        if($count > 1){
            $week = 'Months';
        }
        if(time() < strtotime($this->end)){
            $status = 'Remain';
        }
        return $count.' '.$month.' '.$status;
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
