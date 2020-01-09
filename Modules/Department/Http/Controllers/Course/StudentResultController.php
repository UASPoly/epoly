<?php

namespace Modules\Department\Http\Controllers\Course;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Student\Entities\Result;
use Modules\Department\Entities\Admission;
use Modules\Core\Http\Controllers\Department\HodBaseController;
use Modules\Department\Services\Results\Student\GenerateStudentResult;

class StudentResultController extends HodBaseController
{
    
    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    
    public function edit($result_id)
    {
        return view('department::department.course.result.student.edit',['result'=>Result::find($result_id)]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $result_id)
    {
        $data = $request->all();
        if(!$data['marks']){
            $data['marks'] = 0;
        }
        $result = Result::find($result_id);
        $result->update(['amended_by'=>$data['marks']]);
        $result->computeGrade();
        session()->flash('message','Result amended successfully');
        return back();
    }

    public function index()
    {
        return view('department::department.course.result.student.index');
    }

    public function searchResult(Request $request)
    {
        $admission = $this->getThisAdmission($request->admission_no);
        if($admission){
            $registration = null;
            foreach ($admission->student->sessionRegistrations as $session_registration) {
                if($session_registration->session_id == $request->session){
                    $registration = $session_registration;
                }
            }
            if($registration){
                session(['registration'=>$registration]);
                return redirect()->route('department.student.result.view',[$request->semester]);
            }
            
            session()->flash('error',['Sorry there are not abailable result for '.$request->admission_no]);
        }
        session()->flash('error',['Sorry this admission number does not exist in our record '.$request->admission_no]);
        return back();
        
    }

    public function viewResult($semester_id)
    {
        if(session('registration')){
            return view('department::department.course.result.student.result',['registration'=>session('registration')]);
        }
        return back();
    }

    

}
