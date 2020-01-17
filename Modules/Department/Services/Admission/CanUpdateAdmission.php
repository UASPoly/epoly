<?php
namespace Modules\Department\Services\Admission;

use Illuminate\Support\Facades\Hash;
use Modules\Core\Services\Admission\FileUpload;
use Modules\Department\Entities\DepartmentProgramme;
use Modules\Department\Entities\DepartmentSessionAdmission;

trait CanUpdateAdmission

{
    use FileUpload;

    public function updateThisAdmission($data)
    {
       
    	if($this->needToGenerateAdmissionNo($data)){
    		$this->reservedThisAdmissionNo();
            $admissionNo = $this->generateAnotherAdmissionNo($data);
            $this->admission_no = $admissionNo;
    		$this->programme_id = $data['programme'];
    	    $this->save();

            $this->updateTheAdmissionCounter();
    	}
    	$this->updateStudendInformation($data);
    	$this->updateStudentAccount($data);
    }

    public function needToGenerateAdmissionNo($data)
    {
    	if($data['programme'] != $this->programme_id || $data['schedule'] != $this->student->schedule->id){
    		return true;
    	}
    }

    public function reservedThisAdmissionNo()
    {
    	department()->reservedDepartmentSessionAdmissions()->firstOrCreate([
            'session_id'=>currentSession()->id,
            'schedule_id'=>$this->student->schedule->id,
            'programme_id'=>$this->programme_id,
            'admission_no' => $this->admission_no
        ]);
    }

    public function generateAnotherAdmissionNo($data)
    {
    	return department()->generateAdmissionNo($data);
    }

    public function updateStudendInformation($data)
    {
    	$student = $this->student->update([
            'first_name'=>strtoupper($data['first_name']),
            'last_name'=>strtoupper($data['last_name']),
            'middle_name'=>strtoupper($data['middle_name']),
            'user_name'=>$this->admission_no,
            'phone'=>$data['phone'],
            'email'=>$this->admission_no.'@uaspoly.com',
            'password'=>Hash::make($this->admission_no),
            'programme_id' => $data['programme'],
            'schedule_id' => $data['schedule'],
        ]);
    }

    public function updateStudentAccount($data)
    {
    	$this->student->studentAccount->update([
            'gender_id'=>$data['gender'],
            'lga_id'=>$data['lga'],
            'religion_id'=>$data['religion'],
            'address'=>$data['address'],
            'date_of_birth'=>$data['date_of_birth'],
        ]);
        if(isset($data['picture'])){
            $this->updateFile($this->student->studentAccount, 'picture', $data['picture'], str_replace('/','-',department()->name).'/Admission/Profile');
        }
        session()->flash('message','Congratulation this admission is updated successfully and this student can logged in as student using '.$this->admission_no.' as his user name and '.$this->admission_no.' as his password');
    }

    public function updateTheAdmissionCounter()
    {

        foreach (DepartmentSessionAdmission::where([
            'department_id'=>department()->id,
            'session_id' => currentSession()->id,
            'schedule_id' => $this->scheduleId(),
            'programme_id' => $this->programmeId()
        ])->get() as $admission) {
            $admission->update(['count'=>$admission->count + 1]);
        }
    }

    public function programmeId()
    {
        $id = null;
        foreach ($this->department->programmes as $programme) {
            if($programme->code == substr($this->admission_no, 5,1)){
                $id = $programme->id;
            }
        }
        return $id;
    }

    public function scheduleId()
    {
        $id = null;
        foreach ($this->department->schedules() as $schedule) {
            if($schedule->code == $this->student->schedule->code){
                $id = $schedule->id;
            }
        }
        return $id;
    }
}


       
        
        