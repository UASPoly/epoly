<?php
namespace Modules\Department\Export;
/**
* this class will download the score sheet of the course at particular session
*/
use Maatwebsite\Excel\Facades\Excel;
use Modules\Admin\Entities\Session;
use Modules\Department\Entities\Semester;
use Modules\Department\Entities\Admission;
use Modules\Department\Export\Downloads\StudentSemesterResultDownload;

class StudentSemesterResultExport
{
    protected $student;
    protected $semester;
    protected $session;
    protected $programmeLevel;

	function __construct(array $data)
	{
       
		$this->student = $this->getThisStudent($data['admission_no']);
        $this->session = Session::find($data['session']);
        $this->semester = Semester::find($data['semester']);

	}
    
	public function getFileData()
	{
        foreach($this->student->sessionRegistrations->where('session_id',$this->session->id) as $sessionRegistration){
            return $sessionRegistration->semesterRegistrations->where('semester_id',$this->semester->id);
        }
    }
    
	public function getFileName()
	{
        return str_replace('/','_',$this->session->name).' '
        .$this->student->admission->admission_no.' '
        .$this->semester->name.' Results.csv';
	}
    
    public function getThisStudent($admissionNo)
    {
        $admission = Admission::where('admission_no',$admissionNo)->first();
        return $admission->student;
        
    }

	public function downloadFile()
	{
		return Excel::download(new StudentSemesterResultDownload($this->getFileData()), $this->getFileName(),'Csv',['Content-Type' => 'text/csv']);
	}
}