<?php
namespace Modules\Admin\Services\Calender;

use Modules\Admin\Entities\Session;
/**
* 
*/
class UpdateCalender
{
	public $data;
    public $session;

	function __construct(Session $session, array $data)
	{
		$this->session = $session;
		$this->data = $data;
		new UpdateSemesterCalenders($this->session,$this->data);
	}
}