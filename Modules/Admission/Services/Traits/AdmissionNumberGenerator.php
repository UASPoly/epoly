<?php
namespace Modules\Admission\Services\Traits;

use Modules\Admin\Entities\Session;
use Modules\Student\Entities\Programme;
use Modules\Student\Entities\Schedule;
use Modules\Department\Entities\DepartmentSessionAdmission;
use Modules\Department\Entities\ReservedDepartmentSessionAdmission;

trait AdmissionNumberGenerator
{
	
	public function generateAdmissionNo(array $student)
	{
        
		$reservedAdmission = $this->getAdmissionFromTheReserved($student);
		  
		if($reservedAdmission){
			$admissionNo = $reservedAdmission->admission_no;
		}else{
			$admissionNo =  $this->yearExt($student).
					$this->college->code.
					$this->code.
					Schedule::find($student['schedule'])->code.
					Programme::find($student['programme'])->code.
					$this->getAdmissionSerialNo($student);
		}
		return $admissionNo;
	}

	public function yearExt($student)
	{
		return substr(currentSession()->name,2,2);
	}

    public function getAdmissionFromTheReserved($student)
    {
    	$admission = null;
    	foreach (ReservedDepartmentSessionAdmission::where([
            'department_id'=> department()->id,
            'session_id'=> currentSession()->id,
            'programme_id'=> $student['programme'],
            'schedule_id'=> $student['schedule']
    	])->get() as $reservedAdmission) {
    		if(!$admission){
                $admission = $reservedAdmission;
    		}
    	}
    	return $admission;
    }
    
	public function getAdmissionSerialNo($student)
	{
		$serialNo = $this->getAdmissionCounter($student);
		if(isset($student['serial_no'])){
			$serialNo = $student['serial_no'];
		}

		return $this->formatThisSerialNo($serialNo);
	}

    public function getAdmissionCounter($student)
    {
    	$counter = $this->departmentSessionAdmissions()->firstOrCreate([
            'session_id' => currentSession()->id,
            'schedule_id' => $student['schedule'],
            'programme_id' => $student['programme']
    	]);
        if($counter->count){
            return $counter->count;
        }  
    	return 1;
    }

	public function formatThisSerialNo($no)
	{
        
		if($no <= 9){
			$valid_no = '00'.$no;
		}elseif ($no < 100) {
			$valid_no = '0'.$no;
		}else{
			$valid_no = $no;
		}
		return $valid_no;
	}

}