<?php
namespace Modules\Department\Services\Admission;

use Modules\Student\Entities\Programme;

class SearchAvailableStudents
{
    protected $data;
    public $students;

    public function __construct(Array $data)
    {
        $this->data = $data;
        $this->availableStudents();
    }

    private function availableStudents()
    {   
        $students = [];
        if(isset($this->data['programme'])){
            $programme = Programme::find($this->data['programme']);
            if(!isset($this->data['schedule'])){
                $students = $this->programmeStudents($programme);
            }else{
                $students = $this->programmeScheduleStudents($programme);
            }
        }else{
            $students = $this->departmentSessionStudents();
        }

        $this->students = $students;
    }

    private function programmeStudents($programme)
    {
        $students = [];
        foreach($programme->admissions->where('session_id',$this->data['session']) as $admission){
            $students[] = $admission->student;
        }
        return $students;
    }

    private function programmeScheduleStudents($programme)
    {
        $students = [];
        foreach($programme->admissions->where('session_id',$this->data['session']) as $admission){
            if($admission->student->schedule->id == $this->data['schedule']){
                $students[] = $admission->student;
            }
        }
        return $students;
    }

    private function departmentSessionStudents()
    {
        $students = [];
        foreach(department()->programmes as $programme){
            foreach($programme->admissions->where('session_id',$this->data['session']) as $admission){
                $students[] = $admission->student;
            }
        }
        return $students;
    }
}