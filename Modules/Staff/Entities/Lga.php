<?php

namespace Modules\Staff\Entities;

use Modules\Core\Entities\BaseModel;

class Lga extends BaseModel
{
    public function state()
    {
    	return $this->belongsTo(State::class);
    }

    public function studentAccounts()
    {
    	return $this->hasMany('Modules\Student\Entities\StudentAccount');
    }

    public function getAdmissions($session)
    {
    	$admissions = [];
    	foreach(department()->admissions->where('session_id',$session) as $admission){
    		if($admission->student->studentAccount->lga->id == $this->id){
    			$admissions[] = $admission;
    		}
    	}
    	return $admissions;
    }
}
