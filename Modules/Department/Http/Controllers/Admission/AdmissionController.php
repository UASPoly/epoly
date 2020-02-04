<?php

namespace Modules\Department\Http\Controllers\Admission;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Admin\Entities\Session;
use Illuminate\Support\Facades\Hash;
use Modules\Department\Entities\Admission;
use Modules\Core\Http\Controllers\Department\HodBaseController;
use Modules\Department\Http\Requests\Admission\AdmissionFormRequest;

class AdmissionController extends HodBaseController
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function search()
    {
        return view('department::department.admission.search',['sessions'=>Session::all()]);
    }

    public function index(Request $request)
    {
        $request->validate(['session'=>'required']);

        return view('department::department.admission.index',['session'=>Session::find($request->session),'route'=>[
            'delete'=>'department.student.admission.delete',
            'view'=>'department.student.view.biodata',
            'revoke'=>'department.student.admission.revoke',
        ]]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function generateNumberIndex()
    {
        return view('department::department.admission.create',['route'=>'department.student.admission.generate.number']);
    }

    public function generateNumber(Request $request)
    {
        $request->validate([
            'schedule'=>'required',
            'programme'=>'required',
        ]);

        $admissionNo = department()->generateAdmissionNo($request->all());
        return redirect()->route('department.student.admission.register.generated.number.index',[$admissionNo,$request->programme]);

    }
    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function generatedNumberRegistration()
    {       
        return view('department::department.admission.registration',[
            'admissionNo'=>request()->route('admissionNo'),
            'route'=>'department.student.admission.register.generated.number',
        ]);
    }

    public function registerGeneratedNumber(AdmissionFormRequest $request)
    {
        
        $admission = department()->generateNewAdmission($request->all());

        return redirect()->route('department.student.view.biodata',[$admission->student->id]);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function revokeAdmission($admission_id)
    {
        Admission::find($admission_id)->revokeThisAdmission();
        return redirect()->route('department.student.admission.index');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($admission_id)
    {
        return view('examofficer::admission.edit',[
            'route'=>'department.student.admission.update',
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
        return redirect()->route('department.student.admission.index');
    }
}
