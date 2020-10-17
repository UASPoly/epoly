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
		$this->programme = Programme::find($student['programme']);
		
		$this->schedule = Schedule::find($student['schedule']);
		
		$reservedAdmission = $this->getAdmissionFromTheReserved($student);
		  
		if($reservedAdmission) {
			$admissionNo = $reservedAdmission->admission_no;
		} elseif (count($this->programme->hasCurrentSessionAdmissionNumbers($this->schedule)) > 0){
			
			$numbers = $this->programme->hasCurrentSessionAdmissionNumbers($this->schedule);
			// sort the numbers
			sort($numbers);
			// get the pick admission number and add one to it as new admission no
			$admissionNo = last($numbers)+1;

		}else{
			$admissionNo =  $this->yearExt($student).
					$this->college->code.
					$this->code.
					$this->schedule->code.
					$this->programme->code.
					$this->getAdmissionSerialNo($student);
		}
		return $admissionNo;
	}

	public function yearExt($student)
	{
		$ext = substr(currentSession()->name,2,2);
		if(Programme::find($student['programme'])->programmeType->id == 3){
			$ext = $ext-1;
		}
		return $ext;
	}

    public function getAdmissionFromTheReserved($student)
    {
		$admission = null;
		if(auth()->check()){
			$department_id = department()->id;
		}else{
			$department_id = 1;
		}
    	foreach (ReservedDepartmentSessionAdmission::where([
            'department_id'=> $department_id,
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
		$serialNo = 1;
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