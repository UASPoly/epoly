<?php

namespace Modules\Department\Http\Controllers\Programme;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Core\Http\Controllers\Department\HodBaseController;

class ProgrammeController extends HodBaseController
{
     /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('department::department.programme.index');
    }

    public function currentSessionProgrammeAdmissions($programmeId)
    { 
        $admissions = [];
        foreach(Programme::find($programmeId)->admissions->where('session_id',currentSession()->id) as $admission){
            $admissions[] = $admission;
        }
        return view('department::programme.admission.index',['admissions'=>$admissions,'session'=>currentSession()]);
    }
}
