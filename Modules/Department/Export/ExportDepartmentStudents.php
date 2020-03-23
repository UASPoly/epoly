<?php
namespace Modules\Department\Export;
/**
* this class will download the score sheet of the course at particular session
*/
use Maatwebsite\Excel\Facades\Excel;
use Modules\Admin\Entities\Session;
use Modules\Student\Entities\Schedule;
use Modules\Student\Entities\Programme;
use Modules\Department\Export\Downloads\RegisteredStudents;

class ExportDepartmentStudents
{
    protected $data = null;
    protected $session = null;
    protected $programme = null;
    protected $schedule = null;

	function __construct($data)
	{
        $this->data = $data;
        $this->session = Session::find($data['session']);
        if(isset($data['programme'])){
            $this->programme = Programme::find($data['programme']);
        }

        if(isset($data['schedule'])){
            $this->schedule = Schedule::find($data['schedule']);
        }
	}
    
	public function getFileData()
	{
        $students = [];
        if(!$this->programme){
            foreach(department()->programmes as $programme){
                foreach($programme->admissions->where('session_id',$this->session->id) as $admission){
                    $students[] = $admission->student;
                }
            }
        }else{
            if(!$this->schedule){
                foreach($this->programme->admissions
                ->where('session_id',$this->session->id) as $admission){
                    $students[] = $admission->student;
                }
            }else{
                foreach($this->programme->admissions
                ->where('session_id',$this->session->id) as $admission){
                    if($admission->student->schedule->id == $this->schedule->id){
                        $students[] = $admission->student;
                    }
                }
            }
        }
        
        return $students;
    }
    
	public function getFileName()
	{
        return strtolower(str_replace(' ','_',department()->name)
        .'_'.str_replace('/','_',$this->session->name).'_registered_students.csv');
	}

	public function downloadFile()
	{
		return Excel::download(new RegisteredStudents($this->getFileData()), $this->getFileName(),'Csv',['Content-Type' => 'text/csv']);
	}
}