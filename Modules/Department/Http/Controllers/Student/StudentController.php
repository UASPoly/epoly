<?php

namespace Modules\Department\Http\Controllers\Student;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Admin\Entities\Session;
use Modules\Staff\Entities\State;
use Modules\Student\Entities\Student;
use Modules\Department\Entities\Admission;
use Modules\Core\Http\Controllers\Department\HodBaseController;
use Modules\Department\Http\Requests\Admission\UpdateAdmissionFormRequest;

class StudentController extends HodBaseController
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function viewBiodata($studentID)
    {
        return view('department::department.student.biodata',['route'=>'department.student.biodata.edit','student'=>Student::find($studentID)]);
    }

    public function editBiodata($studentID)
    {
        return view('department::department.student.edit',[
            'student'=>Student::find($studentID),
            'route'=>'department.student.biodata.update'
        ]);
    }

    public function updateBiodata(UpdateAdmissionFormRequest $request)
    {
        $admission = Admission::find($request->admission_id)->updateThisAdmission($request->all());
        return back()->with('toast_success','Congratulation this admission is updated successfully and this student can logged in as student using '.$this->admission_no.' as his user name and password');
    }

    public function student()
    {
        return view('department::department.student.index',['route'=>'department.student.student.search']);
    }

    public function searchStudent(Request $request)
    {
        
        $students = null;
        if($request->admission_no){
            $students = [$this->getThisStudent($request->admission_no)];
            if(empty($students)){
                session()->flash('error','Invalid admission number');
                return back();
            }
        }else{
            $request->validate(['session'=>'required','state'=>'required']);
            $state = State::find($request->state);
            $session = Session::find($request->session);
            if($state){
                $students = $state->students($session);
            }else{
                $students = [];
                foreach(State::all() as $state){
                    if($state->catchment == 0){
                        $students = array_merge($students,$state->students($session));
                    }
                }
            }
        }
        if(isset($request->export)){
            new ExportStudents($students,$state,$session);
        }else{
            session(['students'=>$students]);
            return redirect()->route('department.student.student.available',[
            'state'=>strtolower(str_replace(' ','-',$state->name ?? 'state')),'session'=>strtolower(str_replace('/','-',$session->name ?? currentSession()->name))])->withToastInfo(count($students).' Students fount from the search');
        }
    }
    public function getThisStudent($admission_no)
    {
        $student = null;
        foreach(Admission::where('admission_no',$admission_no)->get() as $admission){
            $student = $admission->student;
        }
        return $student;
    }
    public function availableStudent()
    {
        return view('department::student.student',['students'=>session('students')]);
        
    }
}
