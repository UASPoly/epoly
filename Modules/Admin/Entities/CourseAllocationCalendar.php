<?php

namespace Modules\Admin\Entities;

use Illuminate\Support\Carbon;
use Modules\Core\Entities\BaseModel;

class CourseAllocationCalendar extends BaseModel
{
    public function semesterCalendar()
    {
        return $this->belongsTo(SemesterCalendar::class);
    }

    public function countDown()
    {
    	$count = Carbon::parse($this->end)->diffInDays(Carbon::now());
    	$day = 'Day';
    	if($count > 1){
    		$day = 'Days';
    	}
		return $count.' '.$day.' Remain';
    }
}
