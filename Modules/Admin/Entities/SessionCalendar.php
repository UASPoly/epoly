<?php

namespace Modules\Admin\Entities;

use Illuminate\Support\Carbon;
use Modules\Core\Entities\BaseModel;

class SessionCalendar extends BaseModel
{

    public function admin()
    {
    	return $this->belongsTo(Admin::class);
    }

    public function session()
    {
    	return $this->belongsTo(Session::class);
    }

    public function semesterCalendars()
    {
        return $this->hasMany(SemesterCalendar::class);
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
    
}
