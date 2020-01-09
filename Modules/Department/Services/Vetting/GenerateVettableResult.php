<?php

namespace Modules\Department\Services\Vetting;

use Modules\Department\Entities\Department;
use Modules\Student\Entities\SessionRegistration;

/**
* this class will search for the vetting result using semester level and session
*/

class GenerateVettableResult
{
	private $data;
    private $department;
	function __construct(array $data)
	{
		$this->data = $data;
		$this->currentUserDepartment();
		$this->results = $this->searchVettableResult();
	}

	public function searchVettableResult()
	{
        return SessionRegistration::where(['department_id'=>$this->department->id,'session_id'=>$this->data['session'],'level_id'=>$this->data['level']])->paginate($this->data['paginate']);
	}

	public function currentUserDepartment()
	{
		if(headOfDepartment()){
            $this->department = headOfDepartment()->department;
		}else{
            $this->department = Department::find(examOfficer()->department_id);
		}
	}

}