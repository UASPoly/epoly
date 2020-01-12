<?php
namespace Modules\Department\Services;

trait HasProgramme
{
	public function addProgramme(array $data)
	{
		$departmentProgramme = $this->departmentProgrammes()->create([
			'programme_id'=>$data['programmeId'],
			'code'=>$data['code']
		]);
		$departmentProgramme->departmentProgrammeSchedules()->create(['schedule_id'=>1]);
	}
}