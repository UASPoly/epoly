<?php
namespace Modules\Admin\Services\Calender;

/**
* 
*/
class NewCalender
{
	public $data;
    public $session;

	function __construct(array $data)
	{

		$this->data = $data;
		new RegisterSemesterCalenders([1,2],$this->data);
	}

}