<?php
namespace Modules\Department\Services\Results\Student;

trait ResultGeneralRemark

{
	public function generalRemarks()
	{
		if(!$this->hasEmcRemarks()){
			if($this->failedAllCoursesInThisSession()){
                $remark = 'WITH DRAW';
			}elseif($this->passedAllCoursesInThisSession()){
                $remark = 'PASSED';
			}else{
                $remark = $this->toRepeatCourses();
			}
		}else{
            $remark = $this->toReRegisterCourses();
		}
		return ['remark'=>$remark,'conditions'=>$this->remarkConditions()];
	}

	public function hasEmcRemarks()
	{
		if($this->cancelation_status == 1 || $this->sessionRegistration->cancelation_status == 1){
			return true;
		}
	}

	public function failedAllCoursesInThisSession()
	{
		if($this->sessionRegistration->allCoursesUploaded() && $this->sessionRegistration->passedResults() == 0){
			return true;
		}
	}

	public function passedAllCoursesInThisSession()
	{
		if(empty($this->failedResults()) && $this->sessionRegistration->allCoursesUploaded())
		{
			return true;
		}
	}

	public function toRepeatCourses()
	{
		if(!empty($this->failedResults())){
		    $courses = 'RPT';
		}else{
		    $courses = '';
		}
		foreach($this->failedResults() as $course){
            $courses = $courses.' '.$course->code;
		}
		return $courses;
	}

	public function toReRegisterCourses()
	{
		$courses = 'RGT';
		foreach($this->courseRegistrations->where('cancelation_status',1) as $courseRegistration){
            $courses = $courses.' '.$courseRegistration->course->code;
		}
		return $courses;
	}
    
    public function remarkConditions()
    {
    	$conditions = [];

    	foreach($this->semesterRegistrationRemarks as $emc_remark){
            $conditions[] = 'EMC '.$emc_remark->remark->name;
        }

        foreach($this->semesterRegistrationRemarks as $emc_remark){
            $conditions[] = 'EMC '.$emc_remark->remark->name;
    	}
    	return $conditions;
    }                  	
}