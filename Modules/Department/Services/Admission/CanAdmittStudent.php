<?php
namespace Modules\Department\Services\Admission;

use Illuminate\Support\Facades\Hash;
use Modules\Core\Services\Admission\FileUpload;
use Modules\Department\Entities\DepartmentSessionAdmission;
use Modules\Department\Entities\ReservedDepartmentSessionAdmission;

trait CanAdmittStudent

{
    use FileUpload;

	public function generateNewAdmission(array $data)
	{
		return $this->registerStudentAdmission($data);
	}

	public function registerStudentAdmission($data)
	{
		$admission = $this->admissions()->firstOrCreate([
            'admission_no'=>$data['admission_no'],
            'head_of_department_id'=>1,
            'programme_id'=>$data['programmeId'],
            'session_id'=>currentSession()->id,
            'year'=> substr(currentSession()->name, 5)
        ]);
        
        if($this->findFromReservedNo($data['admission_no'])){
            $admission->clearThisNumberReservation();
        }else{
            $this->updateThisAdmissionCounter($data['admission_no']);
        }
        $this->registerStudent($admission,$data);
        return $admission;
	}

    public function findFromReservedNo($admission_no)
    {
        return ReservedDepartmentSessionAdmission::where(['session_id'=>currentSession()->id,'admission_no'=>$admission_no])->first();

    }

	public function registerStudent($admission,$data)
	{
        //filter admission sesstion and admission type and put the in the array of data
        $data['schedule'] = substr($data['admission_no'], 4,1);
        $data['programme'] = substr($data['admission_no'], 5,1);

		$student = $admission->student()->firstOrCreate([
            'first_name'=> strtoupper($data['first_name']),
            'last_name'=> strtoupper($data['last_name']),
            'middle_name'=> strtoupper($data['middle_name']),
            'user_name'=>$data['admission_no'],
            'email'=> $data['admission_no'].'@uaspoly.com',
            'phone'=>$data['phone'],
            'schedule_id'=> $this->scheduleId($data['admission_no']),
            'programme_id'=>  $this->programmeId($data['admission_no']),
            'password'=> Hash::make($admission->admission_no),
        ]);

        $this->registerStudentAccount($student,$data);
	}

	public function registerStudentAccount($student, $data)
	{
		$account =$student->studentAccount()->firstOrCreate([
            'gender_id'=>$data['gender'],
            'religion_id'=>$data['religion'],
            'lga_id'=>$data['lga'],
            'address'=>$data['address'],
            'date_of_birth'=>$data['date_of_birth'],
        ]);

        $image = $this->storeFile($data['picture'],str_replace('/','-',department()->name).'/Admission/Profile');
        $account->update(['picture'=>$image]);
	}

    public function updateThisAdmissionCounter($admission_no)
    {
        foreach (DepartmentSessionAdmission::where([
            'department_id'=>$this->id,
            'session_id' => currentSession()->id,
            'schedule_id' => $this->scheduleId($admission_no),
            'programme_id' => $this->programmeId($admission_no)
        ])->get() as $admission) {
            $admission->update(['count'=>$admission->count += 1]);
        }
    }

    public function programmeId($admission_no)
    {
        $id = null;
        foreach ($this->programmes as $programme) {
            if($programme->code == substr($admission_no, 5,1)){
                $id = $programme->id;
            }
        }
        return $id;
    }

    public function scheduleId($admission_no)
    {
        $id = null;
        foreach ($this->schedules() as $schedule) {
            if($schedule->code == substr($admission_no, 4,1)){
                $id = $schedule->id;
            }
        }
        return $id;
    }

}