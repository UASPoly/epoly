<?php
namespace Modules\Department\Services;

use Modules\Student\Entities\Programme;
use Modules\Department\Entities\ProgrammeType;
use Modules\Department\Entities\ProgrammeSchedule;

trait HasProgramme
{
	public function addProgramme(array $data)
	{
		$errors = [];
		if($this->programmeExist($data)){
			$errors[] = 'The programme already exist in the department';
		}

		if($this->invalidTitle($data)){
			$errors[] = 'Invalid programme type and title note the first three letter in the title must match the selected programme type';
		}

		if(empty($errors)){

			$programme = $this->Programmes()->create([
				'name'=>strtoupper($data['name']),
				'code'=>strtoupper($data['code']),
				'title'=>$data['title'],
				'programme_type_id'=>$data['type'],
			]);
			foreach (['I','II'] as $level) {
				$programme->programmeLevels()->firstOrCreate(['name'=>$data['title'].' '.$level]);
			}
			session()->flash('message', 'Department programme added successfully');
		}else{
			session()->flash('error',$errors);
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

    public function invalidTitle($data)
    {
    	if(substr($data['title'], 0,2) != substr(ProgrammeType::find($data['type'])->name, 0,2)){
    		return true;
    	}
    	return false;
    }

	public function updateProgramme(array $data)
	{
		$errors = [];
		if($this->programmeExist($data)){
			$errors[] = 'The programme already exist in the department';
		}

		if($this->invalidTitle($data)){
			$errors[] = 'Invalid programme type and title note the first three letter in the title must match the selected programme type';
		}

		if(empty($errors)){
			$programme = Programme::find($data['programmeId']);
			
			foreach ($programme->programmeLevels as $programmeLevel) {
				$newLevel = str_replace($programme->title, $data['title'], $programmeLevel->name);
				$programmeLevel->update(['name'=>$newLevel]);
			}

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

	    }else{
			session()->flash('error',$errors);
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