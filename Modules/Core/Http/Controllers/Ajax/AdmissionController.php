<?php

namespace Modules\Core\Http\Controllers\Ajax;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use MOdules\Staff\Entities\State;

class AdmissionController extends Controller
{
    public function fetchStateAdmissionNumbers($session, $state)
    {
        $admissions = [];
        if($state){
            foreach(State::find($state)->lgas as $lga){
                foreach($lga->getAdmissions($session) as $admission){
                    $admissions[] = $admission->admission_no;
                }
            }
        }else{
            //get all the admission number form other states
            foreach (State::where('catchment',0)->get() as $state) {
                foreach($state->lgas as $lga){
                    foreach($lga->getAdmissions($session) as $admission){
                        $admissions[] = $admission->admission_no;
                    }
                }
            }
            
        }

        return response()->json($admissions);
    }
}
