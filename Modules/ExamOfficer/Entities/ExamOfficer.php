<?php

namespace Modules\ExamOfficer\Entities;

use Illuminate\Support\Carbon;
use Modules\Admin\Entities\Session;
use Modules\Department\Entities\Level;
use Illuminate\Notifications\Notifiable;
use Modules\Department\Entities\Semester;
use Modules\Student\Entities\StudentType;
use Modules\Student\Entities\StudentSession;

use Illuminate\Foundation\Auth\User as Authenticatable;

class ExamOfficer extends Authenticatable
{
    use Notifiable;
    
    protected $fillable = [
    	'email',
    	'password',
    	'lecturer_id',
    	'head_of_department_id',
    	'from',
    	'to',
    	'department_id'
    ];

    public function lecturer()
    {
        return $this->belongsTo('Modules\Lecturer\Entities\Lecturer');
    }
    
    public function department()
    {
        return $this->belongsTo('Modules\Department\Entities\Department');
    }

    public function admissions()
    {
        return $this->belongsTo('Modules\Department\Entities\Admission');
    }

    public function duration()
    {
        $start = Carbon::now();
        if($this->to){
            $start = Carbon::parse($this->to);
        }
        $count = Carbon::parse($this->from)->diffInYears($start);
       
        return $count;
    }

    public function levels()
    {
        return Level::all();
    }

    public function sessions()
    {
        return Session::all();
    }

    public function semesters()
    {
        return Semester::all();
    }

    public function studentTypes()
    {
        return StudentType::all();
    }

    public function studentSessions()
    {
        return StudentSession::all();
    }
    public function myCoursesId()
    {
        $ids = [];
        foreach($this->lecturer->lecturerCourses as $lecturer_course){
            if($lecturer_course->is_active == 1){
               $ids[] = $lecturer_course->course->id;
            }
        }
        return $ids;
    }
}
