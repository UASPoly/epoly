<?php

namespace Modules\Staff\Entities;

use Modules\Admin\Entities\Session;
use Modules\Core\Entities\BaseModel;

class State extends BaseModel
{
    public function lgas()
    {
    	return $this->hasMany(Lga::class);
    }

    public function students(Session $session,$programme)
    {
    	$students = [];
    	foreach ($this->lgas as $lga) {
    		foreach ($lga->studentAccounts as $studentAccount) {
    			if($studentAccount->student->admission->programme->id == $programme->id && $studentAccount->student->admission->session_id == $session->id){
    			    $students[] = $studentAccount->student;
    			}
    		}
    	}
    	return $students;
    }
}
