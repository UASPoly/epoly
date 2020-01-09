<?php

namespace Modules\ExamOfficer\Http\Controllers\Results;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use  Modules\Department\Services\Results\Course\GenerateCourseResult;
use Modules\Core\Http\Controllers\Department\ExamOfficerBaseController;
use Modules\Lecturer\Entities\LecturerCourseResultUpload;

class CourseResultController extends ExamOfficerBaseController
{
    public function index()
    {
        return view('examofficer::result.course.index',['route'=>'exam.officer.result.course.search']);
    }

    public function search(Request $request)
    {
        $request->validate([
            'session'=>'required',
            'course'=>'required'
        ]);
        $result = new GenerateCourseResult($request->all());
        if(empty($result->errors)){
            session()->flash('message','The result of '.$result->course->code.' at '.$result->session->name);
            return redirect()->route('exam.officer.result.course.review',[$result->result->id]);
        }
        session()->flash('error',$result->errors);
        return back();
    }


    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function review($result_id)
    {

        $routes = [
            'approve' => 'exam.officer.result.course.approve',
            'edit' => 'exam.officer.result.course.edit',
            'amend' => 'exam.officer.result.course.amend',
        ];
        return view('examofficer::result.course.review',['routes'=>$routes,'result'=>LecturerCourseResultUpload::find($result_id)]);
    }
    public function editCourseResult($result_id)
    {
        return view('examofficer::result.course.edit',['route'=>'exam.officer.result.student.edit','upload'=>LecturerCourseResultUpload::find($result_id)]);
    }
    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function amend($result_id)
    {
        return view('examofficer::result.course.amend',['route'=>'exam.officer.result.course.amend.register','result'=>LecturerCourseResultUpload::find($result_id)]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function amendResult(Request $request,$result_id)
    {
        $request->validate(['marks'=>'required']);
        $upload = LecturerCourseResultUpload::find($result_id);
        
        foreach($upload->results as $result){
            $result->update(['amended_by'=>$request->marks]);
            $result->computeGrade();
        }
        session()->flash('message','All the result is updated successfully');
        return back();
        
    }

    public function approve($result_id)
    {
        $upload = LecturerCourseResultUpload::find($result_id);
        if($upload->verification_status == 1){
            //dis approve the result
            $upload->update(['verification_status'=>0]);
            $message = 'Result is dis approved successfully as such student will not be able to see this result in their account to make it available you need to approve the result again';
        }else{
            $upload->update(['verification_status'=>1]);
            $message = 'Result is approved successfully as such this result is now avaialable to all students that register the course '.$upload->session->name.'  session';
        }
        session()->flash('message',$message);
        return back();
    }
}
