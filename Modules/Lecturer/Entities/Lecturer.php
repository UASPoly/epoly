<?php

namespace Modules\Lecturer\Entities;

use Illuminate\Support\Carbon;
use Modules\Admin\Entities\Session;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Lecturer extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'from',
        'email',
        'password',
        'staff_id',
        'admin_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function staff()
    {
        return $this->belongsTo('Modules\Staff\Entities\Staff');
    }

    public function lecturerCourseAllocations()
    {
        return $this->hasMany('Modules\Department\Entities\LecturerCourseAllocation');
    }

    public function departmentalAppointments()
    {
        return $this->hasMany('Modules\Department\Entities\DepartmentalAppointment');
    }
    
    
    public function lecturerCourses()
    {
        return $this->hasMany('Modules\Department\Entities\LecturerCourse');
    }

    public function duration()
    {
        if(!$this->to){
            $this->to = Carbon::now();
        }
        $count = Carbon::parse($this->from)->diffInYears($this->to);
        $year = 'Year';
        if($count > 1){
            $year = 'Years';
        }
        return $count.' '.$year;
    }

    public function sessions()
    {
        return Session::all();
    }

    public function lecturerAvailableCourses()
    {
        $courses = [];
        foreach ($this->lecturerCourses as $lecturer_course) {
            if($lecturer_course->is_active == 1 && $lecturer_course->lecturer_course_status_id == 1){
                $courses[] = $lecturer_course;
            }
        }
        return $courses;
    }

    public function hasValidExamOfficerAppointment()
    {
        $status = false;    
        foreach ($this->departmentalAppointments as $appointment) {
            if($appointment->appointment_id == 1 && $appointment->is_active == 1){
                $status = true;
            }
        }
        return $status;
    }

}
