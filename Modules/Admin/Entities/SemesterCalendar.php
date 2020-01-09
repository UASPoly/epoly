<?php

namespace Modules\Admin\Entities;

use Illuminate\Support\Carbon;
use Modules\Core\Entities\BaseModel;

class SemesterCalendar extends BaseModel
{
	public function sessionCalendar()
	{
		return $this->belongsTo(SessionCalendar::class);
	}

    public function semester()
    {
    	return $this->belongsTo('Modules\Department\Entities\Semester');
    }
    
    public function countDown()
    {
    	$count = Carbon::parse($this->end)->diffInWeeks(Carbon::now());
    	$week = 'Week';
    	if($count > 1){
    		$week = 'Weeks';
    	}
		return $count.' '.$week.' Remain';
    }

    public function courseAllocationCalendar()
    {
    	return $this->hasOne(CourseAllocationCalendar::class);
    }

    public function examCalendar()
    {
    	return $this->hasOne(ExamCalendar::class);
    }

    public function lectureCalendar()
    {
    	return $this->hasOne(LectureCalendar::class);
    }

    public function markingCalendar()
    {
    	return $this->hasOne(MarkingCalendar::class);
    }

    public function uploadResultCalendar()
    {
    	return $this->hasOne(UploadResultCalendar::class);
    }
}
