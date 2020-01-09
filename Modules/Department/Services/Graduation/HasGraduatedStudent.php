<?php
namespace Modules\Department\Services\Graduation;

trait HasGraduatedStudent
{
	public function graduuates()
	{
		$graduates = [];
		foreach ($this->availableAdmissions() as $admission) {
			if($admission->student->graduated()){
				$graduates[] = $admission->stduent;
			}
		}
		$graduates;
	}

	public function availableAdmissions(Session $session)
	{
		return $this->admissions->where('session_id',$session->id);
	}




}