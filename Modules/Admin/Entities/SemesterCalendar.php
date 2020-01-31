<?php

namespace Modules\Admin\Entities;

use Illuminate\Support\Carbon;
use Modules\Core\Entities\BaseModel;

class SemesterCalendar extends BaseModel
{
	

    public function session()
    {
        return $this->belongsTo(Session::class);
    }

    public function semester()
    {
    	return $this->belongsTo('Modules\Department\Entities\Semester');
    }
    
    public function countDown()
    {
    	$count = Carbon::parse($this->end)->diffInWeeks(Carbon::now());
    	$week = 'Week';
        $status = 'Ago';
        if($count > 1){
            $week = 'Weeks';
        }
        if(time() < strtotime($this->end)){
            $status = 'Remain';
        }
        return $count.' '.$week.' '.$status;
    }

    public function courseAllocationCalendar()
    {
    	return $this->belongsTo(CourseAllocationCalendar::class);
    }

    public function examCalendar()
    {
    	return $this->belongsTo(ExamCalendar::class);
    }

    public function lectureCalendar()
    {
    	return $this->belongsTo(LectureCalendar::class);
    }

    public function markingCalendar()
    {
    	return $this->belongsTo(MarkingCalendar::class);
    }

    public function uploadResultCalendar()
    {
    	return $this->belongsTo(UploadResultCalendar::class);
    }
}
