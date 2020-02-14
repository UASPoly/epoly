<?php

namespace Modules\ExamOfficer\Http\Controllers\Programme;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Student\Entities\Programme;
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
            'routes'=>[
                'courses'=>'exam.officer.department.programme.course.index',
                'admission'=>'exam.officer.department.programme.admissions',
                'register'=>'exam.officer.student.admission.register.generated.number.index',
                'serviceIn'=>'exam.officer.department.programme.course.service.in',
                'serviceOut'=>'exam.officer.department.programme.course.service.out'
            ]]);
    }

    public function currentSessionProgrammeAdmissions($programmeId)
    { 
        $admissions = [];
        foreach(Programme::find($programmeId)->admissions->where('session_id',currentSession()->id) as $admission){
            $admissions[] = $admission;
        }
        return view('examofficer::programme.admission.index',['admissions'=>$admissions,'session'=>currentSession(),'route'=>[
            'delete'=>'exam.officer.student.admission.delete',
            'view'=>'exam.officer.student.view.biodata',
            'revoke'=>'exam.officer.student.admission.revoke',
        ]]);
    }

    
}
