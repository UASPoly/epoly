<?php

namespace Modules\College\Entities;

use Illuminate\Support\Carbon;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Directer extends Authenticatable
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

    public function college()
    {
        return $this->belongsTo(College::class);
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
}
