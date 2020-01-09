<?php
namespace Modules\Student\Services\Traits\Student;

trait HasGraduationStatusAt

{

    public function graduatedAt($session)
    {
        if(empty($this->currentLevelReRegisterCoursesAt($session)) && $this->yearsSinceAdmission() >= 2){
            return true;
        }
        return false;
    }

    public function spillededAt($session)
    {
        if(!empty($this->currentLevelReRegisterCoursesAt($session)) && $this->yearsSinceAdmission() >= 2){
            return true;
        }
        return false;
    }

    public function withDrawedAt($session)
    {
    	if(!empty($this->currentLevelReRegisterCoursesAt($session)) && !$this->canMakeCourseRegistrationAt($session)){
            return true;
        }
        return false;
    }

    public function canMakeCourseRegistrationAt($session)
    {
        if($this->yearsToGraduate() > $this->yearsSinceAdmissionTo($session)){
            return true;
        }
        return false;
    }

    public function yearsSinceAdmissionTo($session)
    {
        return substr($session->name, 5) - $this->admissionYear();
    }

}