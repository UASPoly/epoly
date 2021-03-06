<?php

namespace Modules\ExamOfficer\Http\Controllers\Student;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Staff\Entities\State;
use Modules\Admin\Entities\Session;
use Modules\Student\Entities\Student;
use Modules\Student\Entities\Programme;
use Modules\Department\Entities\Admission;
use Modules\Department\Export\ExportStateStudents;
use Modules\Core\Http\Controllers\Department\ExamOfficerBaseController;
use Modules\Department\Http\Requests\Admission\UpdateAdmissionFormRequest;

class StudentController extends ExamOfficerBaseController
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function viewBiodata($studentID)
    {
        return view('examofficer::student.biodata',['student'=>Student::find($studentID)]);
    }

    public function editBiodata($studentID)
    {
        return view('examofficer::student.edit',[
            'student'=>Student::find($studentID),
            'route'=>'exam.officer.student.biodata.update'
        ]);
    }

    public function updateBiodata(UpdateAdmissionFormRequest $request)
    {
        $admission = Admission::find($request->admission_id);
        $admission->updateThisAdmission($request->all());
        return back()->with('success', $admission->admission_no.' biodata updated successfully');
    }

    public function student()
    {
        return view('examofficer::student.index',['route'=>'exam.officer.student.student.search']);
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
            $request->validate([
                'session'=>'required',
                'state'=>'required',
                'programme'=>'required',
                ]);
            $state = State::find($request->state);
            
            $session = Session::find($request->session);

            $programme = Programme::find($request->programme);
            
            if($state){
                $students = $state->students($session,$programme);
            }else{
                $students = [];
                foreach(State::all() as $studentState){
                    if($studentState->catchment == 0){
                        $students = array_merge($students,$studentState->students($session,$programme));
                    }
                }
            }
        }

        if(isset($request->export)){
            $download = new ExportStateStudents($students,$state,$session);
            return $download->downloadFile();
        }else{
            session(['students'=>$students]);
            return redirect()->route('exam.officer.student.student.available',[
            'state'=>strtolower(str_replace(' ','-',$state->name ?? 'state')),'session'=>strtolower(str_replace('/','-',$session->name ?? currentSession()->name))])->withSuccess(count($students).' Student found for this search');
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
        return view('examofficer::student.student',['students'=>session('students')]);
    }

}
