<?php
namespace Modules\Department\Services;

use Modules\Department\Entities\DepartmentProgramme;
use Modules\Department\Entities\DepartmentProgrammeSchedule;

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

	public function updateProgramme(array $data)
	{
		$departmentProgramme = DepartmentProgramme::find($data['departmentProgrammeId']);
		$departmentProgramme->update([
			'programme_id'=>$data['programmeId'],
			'code'=>$data['code']
		]);
		if(isset($data['scheduleAdd'])){
			$departmentProgramme->departmentProgrammeSchedules()->create([
				'schedule_id'=>$data['scheduleAdd']
			]);
		}

		if(isset($data['scheduleRemove'])){
			$schedule = DepartmentProgrammeSchedule::where(['department_programme_id'=>$departmentProgramme->id,'schedule_id'=> $data['scheduleRemove']])->first();
			$schedule->delete();
		}

	}

	public function activateProgramme($departmentProgrammeId)
	{
		DepartmentProgramme::find($departmentProgrammeId)->update([
			'status'=>1
		]);
	}

	public function deActivateProgramme($departmentProgrammeId)
	{
		DepartmentProgramme::find($departmentProgrammeId)->update([
			'status'=>0
		]);
	}

	public function deleteProgramme($departmentProgrammeId)
	{
		$departmentProgramme = DepartmentProgramme::find($departmentProgrammeId);
		if(count($departmentProgramme->admissions) == 0){
			$departmentProgramme->delete();
		}else{
			session()->flash('error','Sorry this programme has admited students to delete it you must delete all the admissions under the the programme');
		}
	}
}