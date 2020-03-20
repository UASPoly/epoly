<?php
namespace Modules\Department\Export\Result;
/**
* this class will download the score sheet of the course at particular session
*/
use Maatwebsite\Excel\Facades\Excel;
use Modules\Admin\Entities\Session;
use Modules\Department\Entities\Semester;
use Modules\Department\Entities\ProgrammeLevel;
use Modules\Department\Export\Downloads\ABFormatDownload;
use Modules\Department\Services\Vetting\GenerateVettableResult;


class ExportABFormatResult
{
    protected $data;
    protected $session;
    protected $semester;
    protected $programmeLevel;

	function __construct(array $data)
	{
		$this->data = $data;
		$this->session = Session::find($data['session']);
		$this->programmeLevel = ProgrammeLevel::find($data['level']);
		$this->semester = Semester::find($data['semester']);
	}
    
	public function getFileData()
	{
		return department()
			->sessionRegistrations
			->where('session_id',$this->data['session'])
			->where('programme_level_id',$this->data['level']);

    }
    
	public function getFileName()
	{
        return str_replace('/','_',$this->session->name).' '.$this->programmeLevel->name.' '.$this->semester->name.' AB Format Result.csv';
	}

	public function downloadFile()
	{
		return Excel::download(new ABFormatDownload($this->getFileData(),$this->semester), $this->getFileName(),'Csv',['Content-Type' => 'text/csv']);
	}
}