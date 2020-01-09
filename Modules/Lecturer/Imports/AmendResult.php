<?php
namespace Modules\Lecturer\Imports;

use Maatwebsite\Excel\Concerns\ToModel;
/**
* 
*/
class AmendResult implements ToModel
{
	public $upload;

	function __construct($upload,$data)
	{
		$this->upload = $upload;
		$this->data = $data;
		$this->amendResult();
	}

	public function amendResult()
    {
       foreach($this->upload->results as $result){
            $result->update(['amended_by'=>$this->data['marks']]);
            $result->computeGrade();
        }
    }
    public function model($value='')
    {

    }
}