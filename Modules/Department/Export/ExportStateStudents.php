<?php
namespace Modules\Department\Export;
/**
* this class will download the score sheet of the course at particular session
*/
use Maatwebsite\Excel\Facades\Excel;
use Modules\Admin\Entities\Session;

class ExportStateStudents
{
    protected $data;
    protected $session;
    protected $state;

	function __construct(array $data, $state, $session)
	{
        
		$this->data = $data;
        $this->session = $session;
        if($state){
            $this->state = $state->name;
        }else{
            $this->state = 'Other';
        }
	}
    
	public function getFileData()
	{
        return $this->data;
    }
    
	public function getFileName()
	{
        return strtolower(str_replace(' ','_',department()->name)
        .'_'.str_replace('/','_',$this->session->name).
        '_'.$this->state.'_state_registered_students.csv');
	}

	public function downloadFile()
	{
		return Excel::download(new DownloadRegisteredStudents($this->getFileData()), $this->getFileName(),'Csv',['Content-Type' => 'text/csv']);
	}
}