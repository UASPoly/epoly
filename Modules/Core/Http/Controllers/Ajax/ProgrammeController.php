<?php

namespace Modules\Core\Http\Controllers\Ajax;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Department\Entities\ProgrammeSchedule;

class ProgrammeController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function getProgrammeSchedules($programme_id)
    {
        $schedules = null;
        if($this->hasMorningSchedule($programme_id) && $this->hasEveningSchedule($programme_id)){
            $schedules = ['1'=>'MORNING','2'=>'EVENING'];
        }else if($this->hasMorningSchedule($programme_id)){
            $schedules = ['1'=>'MORNING'];
        }else if($this->hasMorningSchedule($programme_id)){
            $schedules = ['1'=>'EVENING'];
        }else{
            $schedules = [];
        }
        
        return response()->json(($schedules));
    }

    public function hasMorningSchedule($programme_id)
    {
        $flag = false;
        foreach (ProgrammeSchedule::where('programme_id', $programme_id)->get() as $programmeSchedule) {
            if($programmeSchedule->schedule_id == 1){
                $flag = true;
            }
        }
        return $flag;
    }

    public function hasEveningSchedule($programme_id)
    {
        $flag = false;
        foreach (ProgrammeSchedule::where('programme_id', $programme_id)->get() as $programmeSchedule) {
            if($programmeSchedule->schedule_id == 2){
                $flag = true;
            }
        }
        return $flag;
    }
}
