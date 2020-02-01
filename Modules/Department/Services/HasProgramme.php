<?php
namespace Modules\Department\Services;

use Modules\Student\Entities\Programme;
use Modules\Department\Entities\ProgrammeSchedule;

trait HasProgramme
{
	public function addProgramme(array $data)
	{
		if($this->programmeExist($data)){
			session()->flash('error',['The programme already exist in the department']);
		}else{

			$this->Programmes()->create([
				'name'=>strtoupper($data['name']),
				'code'=>strtoupper($data['code']),
				'title'=>$data['title'],
				'programme_type_id'=>$data['type'],
			]);
			session()->flash('message', 'Department programme added successfully');
		}
		
	}

    public function programmeExist($data)
    {
    	$programme = $this->programmes->where([
    		'name'=>$data['name'],
    		'title'=>$data['title']
    	])->first();
    	if($programme){
    		return true;
    	}
    	return false;
    }

	public function updateProgramme(array $data)
	{
		$programme = Programme::find($data['programmeId']);
		$programme->update([
			'name'=>strtoupper($data['name']),
			'title'=>strtoupper($data['title']),
			'code'=>$data['code'],
			'programme_type_id'=>$data['type']
		]);
		
		if(isset($data['scheduleAdd'])){
			$programme->programmeSchedules()->create([
				'schedule_id'=>$data['scheduleAdd']
			]);
		}

		if(isset($data['scheduleRemove'])){
			$schedule = ProgrammeSchedule::where(['department_programme_id'=>$programme->id,'schedule_id'=> $data['scheduleRemove']])->first();
			$schedule->delete();
		}
	}

	public function activateProgramme($programmeId)
	{
		Programme::find($programmeId)->update([
			'status'=>1
		]);
	}

	public function deActivateProgramme($programmeId)
	{
		Programme::find($programmeId)->update([
			'status'=>0
		]);
	}

	public function deleteProgramme($programmeId)
	{
		$programme = Programme::find($programmeId);
		if(count($programme->admissions) == 0){
			$programme->delete();
		}else{
			session()->flash('error','Sorry this programme has admited students to delete it you must delete all the admissions under the the programme');
		}
	}
	
}