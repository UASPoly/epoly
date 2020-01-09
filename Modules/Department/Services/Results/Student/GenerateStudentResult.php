<?php
namespace Modules\Department\Services\Results\Student;

use Modules\Department\Entities\Admission;
use Modules\Admin\Entities\Session;
/**
* this class generate the student result for student on semester wise
*/
class GenerateStudentResult
{
	private $data;
	public $registration;
	private $admission;
	public $errors;

	function __construct(array $data)
	{
		$this->data = $data;
		$this->department = $this->currentUserDepartment();
		$this->errors = $this->validateThisRequest();
		$this->verifyTheSearch();
	}

	public function validateThisRequest()
	{
		$errors = [];
		$this->admission = $this->getThisAdmission();
		if($this->admission){
			$this->registration = $this->getRegistration();
		}
		
		if(!$this->admission){
			$errors[] = 'Sorry this admission number does not exist in '.$this->department->name. 'department';
		}

		if(!$this->getRegistration()){
			$errors[] = 'Sorry we dont found any course registration of '.$this->data['admission_no'].' at '.Session::find($this->data['session'])->id;
		}
		return $errors;

	}

	public function verifyTheSearch()
	{
        if(!empty($this->errors)){
            session()->flash('error',$this->errors);
        }else{
        	foreach ($this->getRegistration() as $registration) {
        		$this->registration = $registration;
        	}
        }
	}

	public function getThisAdmission()
    {
        $admission = null;
        foreach (Admission::where(['department_id'=>$this->department->id,'admission_no'=>$this->data['admission_no']])->get() as $currentAdmission) {
        	$admission = $currentAdmission;
        }
        return $admission;
    }

    public function currentUserDepartment()
    {
    	$user = headOfDepartment();
    	if(!$user)
    		$user = examOfficer();
    	return $user->department;
    }

    public function getRegistration()
    {
    	if($this->admission)
            return $this->admission ->student->sessionRegistrations->where('session_id',$this->data['session']); 
    }

}