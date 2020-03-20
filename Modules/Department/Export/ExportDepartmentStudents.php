<?php
namespace Modules\Department\Export;
/**
* this class will download the score sheet of the course at particular session
*/
use Maatwebsite\Excel\Facades\Excel;
use Modules\Admin\Entities\Session;
use Modules\Department\Export\Downloads\RegisteredStudents;

class ExportDepartmentStudents
{
    protected $data;
    protected $session;
    protected $state;

	function __construct($session)
	{
        $this->session = $session;
	}
    
	public function getFileData()
	{
        $students = [];
        foreach(department()->admissions->where('session_id',$this->session->id) as $admission){
            $students[] = $admission->student;
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