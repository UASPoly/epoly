<?php

namespace Modules\ExamOfficer\Http\Controllers\Admission;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Modules\Admin\Entities\Session;
use Modules\Department\Entities\Admission;
use Modules\Department\Export\ExportDepartmentStudents;
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
        return view('examofficer::admission.search',[
            'route'=>'exam.officer.student.admission.search.admission','sessions'=>Session::all()]);
    }

    public function searchAdmissions(Request $request)
    {
        $request->validate(['session'=>'required']);
        if(isset($request->export)){
            $download = new ExportDepartmentStudents($request->all());
            return $download->downloadFile();
        }

        return redirect()->route('exam.officer.student.admission.session.available',[$request->session]);
    }

    public function index($sessionId)
    {
        return view('examofficer::admission.index',['session'=>Session::find($sessionId),'route'=>[
            'delete'=>'exam.officer.student.admission.delete',
            'view'=>'exam.officer.student.view.biodata',
            'revoke'=>'exam.officer.student.admission.revoke',
        ]]);
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

        return redirect()->route('exam.officer.student.view.biodata',[$admission->student->id])->with('success',$admission->admission_no.' Registered successfully');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function revokeAdmission($admission_id)
    {
        $message = Admission::find($admission_id)->revokeThisAdmission();
        return back()->with('success',$message);
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
        $message = Admission::find($admission_id)->deleteThisAdmission();
        return back()->with('success',$message);
    }
}
