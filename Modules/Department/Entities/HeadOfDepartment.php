<?php

namespace Modules\Department\Entities;

use Illuminate\Support\Carbon;
use Modules\Admin\Entities\Session;
use Modules\Department\Entities\Level;
use Illuminate\Notifications\Notifiable;
use Modules\Department\Entities\Semester;
use Modules\Student\Entities\Programme;
use Modules\Student\Entities\Schedule;
use Illuminate\Foundation\Auth\User as Authenticatable;

class HeadOfDepartment extends Authenticatable
{
    use Notifiable;
    
    protected $fillable = [
    	'email',
    	'password',
    	'admin_id',
    	'staff_id',
    	'from',
    	'to',
    	'department_id'
    ];

    public function staff()
    {
        return $this->belongsTo('Modules\Staff\Entities\Staff');
    }

    public function admin()
    {
        return $this->belongsTo('Modules\Admin\Entities\Admin');
    }
    
    public function admissions()
    {
        return $this->hasMany('Modules\Department\Entities\Admission');
    }
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function duration()
    {
        $start = Carbon::now();
        if($this->to){
            $start = Carbon::parse($this->to);
        }
        $count = Carbon::parse($this->from)->diffInMonths($start);
        $month = 'Month';
        if($count > 1){
            $month = 'Months';
        }
        return $count.' '.$month;
    }
    
    public function myCoursesId()
    {
        $ids = [];
        foreach($this->staff->lecturer->lecturerCourses as $lecturer_course){
            if($lecturer_course->is_active == 1){
               $ids[] = $lecturer_course->course->id;
            }
        }
        return $ids;
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

    public function programmes()
    {
        return Programme::all();
    }

    public function schedules()
    {
        return Schedule::all();
    }
}
