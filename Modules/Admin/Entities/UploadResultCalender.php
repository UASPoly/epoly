<?php

namespace Modules\Admin\Entities;

use Illuminate\Support\Carbon;
use Modules\Core\Entities\BaseModel;

class UploadResultCalendar extends BaseModel
{
    public function semesterCalendar()
    {
    	return $this->hasOne(SemesterCalendar::class);
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
}
