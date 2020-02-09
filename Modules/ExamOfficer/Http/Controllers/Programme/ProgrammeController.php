<?php

namespace Modules\ExamOfficer\Http\Controllers\Programme;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Core\Http\Controllers\Department\ExamOfficerBaseController;

class ProgrammeController extends ExamOfficerBaseController
{

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('examofficer::programme.index',[
            'route'=>[
                'courses'=>'exam.officer.department.programme.course.index',
            ]]);
    }

    public function prgrammeAdmissions($programmeId)
    { 
        $students = [];
        foreach(Programme::find($programmeId)->admissions->where('session_id',currentSession()->id) as $admission){
            $students[] = $admission->student;
        }
        return $students;
    }

    
}
