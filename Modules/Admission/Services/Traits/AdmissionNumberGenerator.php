<?php
namespace Modules\Admission\Services\Traits;

use Modules\Admin\Entities\Session;
use Modules\Department\Entities\DepartmentProgramme;
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
			$reservedAdmission->delete();
		}else{
			$admissionNo =  $this->yearExt($student).
					$this->college->code.
					$this->code.
					$student['schedule'].
					DepartmentProgramme::find($student['programme'])->code.
					$this->getAdmissionSerialNo($student);
		}
		return $admissionNo;
	}

	public function yearExt($student)
	{
		return substr(currentSession()->name,7);
	}

    public function getAdmissionFromTheReserved($student)
    {
    	$admission = null;
    	foreach (ReservedDepartmentSessionAdmission::where([
            'department_id'=> 1,
            'session_id'=> currentSession()->id,
            'department_programme_id'=> $this->programmeId($student),
            'schedule_id'=> $this->scheduleId($student)
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
            'schedule_id' => $this->scheduleId($student),
            'department_programme_id' => $this->programmeId($student)
    	]);
        if($counter->count){
            return $counter->count;
        }
    	return 1;
    }

    public function updateTheAdmissionCounter($admissionNo)
    {

        foreach (DepartmentSessionAdmission::where([
            'department_id'=>department()->id,
            'session_id' => currentSession()->id,
            'schedule_id' => $this->scheduleId(['schedule'=>substr($admissionNo, 4,1)]),
            'programme_id' => $this->programmeId(['programme'=>substr($admissionNo, 5,1)])
        ])->get() as $admission) {
            $admission->update(['count'=>$admission->count += 1]);
        }
    }

    public function programmeId($student)
    {
    	$id = null;
    	foreach ($this->programmes() as $programme) {
    		if($programme->code == $student['programme']){
    			$id = $programme->id;
    		}
    	}
    	return $id;
    }

    public function scheduleId($student)
    {
    	$id = null;
    	foreach ($this->schedules() as $schedule) {
    		if($schedule->code == $student['schedule']){
    			$id = $schedule->id;
    		}
    	}
    	return $id;
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