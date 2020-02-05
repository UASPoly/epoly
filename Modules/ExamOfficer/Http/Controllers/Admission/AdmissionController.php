<?php

namespace Modules\ExamOfficer\Http\Controllers\Admission;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Modules\Admin\Entities\Session;
use Modules\Department\Entities\Admission;
use Modules\Department\Http\Requests\Admission\AdmissionFormRequest;
use Modules\Core\Http\Controllers\Department\ExamOfficerBaseController;

class AdmissionController extends ExamOfficerBaseController
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function search()
    {
        return view('examofficer::admission.search',['route'=>'exam.officer.student.admission.index','sessions'=>Session::all()]);
    }

    public function index(Request $request)
    {
        $request->validate(['session'=>'required']);

        return view('examofficer::admission.index',['session'=>Session::find($request->session),'route'=>[
            'delete'=>'exam.officer.student.admission.delete',
            'view'=>'exam.officer.student.view.biodata',
            'revoke'=>'exam.officer.student.admission.revoke',
        ]]);
    }
    public function getAdmissionData()
    {
        $admission = Admission::select(['id', 'admission_no']);

        return Datatables::of($admission)
            ->addColumn('Name', function ($admission) {
                return $admissiion->student->first_name.' '.$admission->student->middle_name.' '.$admisiion->student->last_name;
            })
            ->addColumn('Schedule', function ($admission) {
                return $admissiion->student->schedule->name;
            })
            ->addColumn('Programme', function ($admission) {
                return $admissiion->programme->title;
            })
            ->addColumn('PHone', function ($admission) {
                return $admissiion->student->phone;
            })
            
            ->make(true);
    }
    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function generateNumberIndex()
    {
        return view('examofficer::admission.create',['route'=>'exam.officer.student.admission.generate.number']);
    }

    public function generateNumber(Request $request)
    {
        $request->validate([
            'schedule'=>'required',
            'programme'=>'required',
        ]);

        $admissionNo = department()->generateAdmissionNo($request->all());
        return redirect()->route('exam.officer.student.admission.register.generated.number.index',[$admissionNo,$request->programme]);

    }
    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function generatedNumberRegistration()
    {       
        return view('examofficer::admission.registration',[
            'admissionNo'=>request()->route('admissionNo'),
            'route'=>'exam.officer.student.admission.register.generated.number',
        ]);
    }

    public function registerGeneratedNumber(AdmissionFormRequest $request)
    {
        
        $admission = department()->generateNewAdmission($request->all());

        return redirect()->route('exam.officer.student.view.biodata',[$admission->student->id]);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function revokeAdmission($admission_id)
    {
        Admission::find($admission_id)->revokeThisAdmission();
        return redirect()->route('exam.officer.student.admission.index');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($admission_id)
    {
        return view('examofficer::admission.edit',[
            'route'=>'exam.officer.student.admission.update',
            'admission'=>Admission::find($admission_id)
        ]);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function delete($admission_id)
    {
        Admission::find($admission_id)->deleteThisAdmission();
        return redirect()->route('exam.officer.student.admission.index');
    }
}
