<?php

namespace Modules\Department\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\ExamOfficer\Entities\ExamOfficer;
use Modules\Core\Http\Controllers\Department\HodBaseController;

class DepartmentExamOfficerController extends HodBaseController
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('department::department.examOfficer.index',
            ['examOfficers'=>headOfDepartment()->department->examOfficers]
        );
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function revokeExamOfficer($exam_officer_id)
    {
        $examOfficer = ExamOfficer::find($exam_officer_id);
        $active_value = 0;
        $flag = 'revoke';
        if($examOfficer->is_active == 0){
            $active_value = 1;
            $flag = 're activated';
        }
        $examOfficer->is_active = $active_value;
        $examOfficer->save();
        session()->flash('message','The exam officer is '.$flag.' successfully');
        return back();
    }

}
