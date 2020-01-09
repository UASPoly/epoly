<?php

namespace Modules\ExamOfficer\Http\Controllers\Results;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Student\Entities\Result;
use Modules\Department\Entities\Admission;
use Modules\Core\Http\Controllers\Department\ExamOfficerBaseController;
use Modules\Department\Services\Results\Student\GenerateStudentResult;

class StudentResultController extends ExamOfficerBaseController
{
    public function edit($result_id)
    {
        return view('examofficer::result.student.edit',['route'=>'exam.officer.result.student.update','result'=>Result::find($result_id)]);
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
        return view('examofficer::result.student.index',['route'=>'exam.officer.result.student.search']);
    }

    public function searchResult(Request $request)
    {
        $result = new GenerateStudentResult($request->all());
        if(empty($result->errors)){
            session(['registration'=>$result->registration]);
            return redirect()->route('exam.officer.result.student.view',[$request->semester]);
        }
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
