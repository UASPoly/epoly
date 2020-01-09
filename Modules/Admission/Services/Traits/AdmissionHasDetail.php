<?php
namespace Modules\Admission\Services\Traits;

trait AdmissionHasDetail
{
    public function yearNo()
    {
    	return substr($this->admission_no,0,2);
    }
    
    public function collegeNo()
    {
    	return substr($this->admission_no,2,1);
    }

    public function departmentNo()
    {
    	return substr($this->admission_no,3,1);
    }

    public function programmeNo()
    {
    	return substr($this->admission_no,4,1);
    }

    public function scheduleNo()
    {
    	return substr($this->admission_no,5,1);
    }

    public function serialNo()
    {
    	return substr($this->admission_no,6);
    }
    
}