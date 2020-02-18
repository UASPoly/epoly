<?php

namespace Modules\Student\Entities;

use Illuminate\Notifications\Notifiable;
use Modules\Admin\Entities\Session;
use Modules\Department\Entities\Level;
use Modules\Department\Entities\Course;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Modules\Student\Services\Traits\HasLevelAndSemester;
use Modules\Student\Services\Traits\Student\HasGraduationStatus;
use Modules\Student\Services\Traits\Student\HasGraduationStatusAt;
use Modules\Student\Services\Traits\Student\Result\HasResult;
class Student extends Authenticatable
{
	use Notifiable, HasLevelAndSemester, HasGraduationStatus, HasGraduationStatusAt, HasResult;

	protected $fillable = [
        'first_name',
        'last_name',
        'middle_name',
        'phone',
        'email',
        'user_name',
        'password',
        'programme_id',
        'schedule_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function admission()
    {
    	return $this->belongsTo('Modules\Department\Entities\Admission');
    }

    public function studentAccount()
    {
    	return $this->hasOne(StudentAccount::class);
    }

    public function programme()
    {
    	return $this->belongsTo(Programme::class);
    }

    public function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }

    public function sessionRegistrations()
    {
        return $this->hasMany(SessionRegistration::class);
    }
    
    public function repeatCourses()
    {
        return $this->hasMany(RepeatCourse::class);
    }

    public function reRegisterCourses()
    {
        return $this->hasMany(ReRegisterCourse::class);
    }

    public function dropCourses()
    {
        return $this->hasMany(DropCourse::class);
    }
    
    public function diferredSessions()
    {
        return $this->hasMany(DiferredSession::class);
    }

    public function diferredSemesters()
    {
        return $this->hasMany(DiferredSemester::class);
    }

    public function currentRegisteredCourses()
    {
        $courses = [];
        foreach ($this->sessionRegistrations()->where('programme_level_id',$this->level()->id)->get() as $session_registration) {
            foreach ($session_registration->semesterRegistrations as $semester_registration) {
                foreach ($semester_registration->courseRegistrations as $course_registraion) {
                    $courses[] = $course_registraion->course;
                }
            } 
        }
        return $courses;
    }

    public function makeCurrentSessionRegistration()
    {
        $flag = false;
        foreach ($this->sessionRegistrations->where('session_id',currentSession()->id) as $session) {
            $flag = true;
        }
        return $flag;
    }
    
    public function cummulativeGradePointAverage()
    {
        $count = 0;
        $points = 0;
        foreach ($this->sessionRegistrations as $sessionRegistration) {
            $count ++ ;
            $points = $points + $sessionRegistration->sessionGrandPoints();
        }
        if($count == 0){
            $count++;
        }
        return number_format($points/$count,2);
    }

}
