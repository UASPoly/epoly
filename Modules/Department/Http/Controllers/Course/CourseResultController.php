<?php

namespace Modules\Department\Http\Controllers\Course;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Admin\Entities\Session;
use Modules\Department\Entities\Course;
use Modules\Lecturer\Entities\LecturerCourseResultUpload;
use Modules\Core\Http\Controllers\Department\HodBaseController;

class CourseResultController extends HodBaseController
{
    public function index()
    {
        return view('department::department.course.result.index');
    }

    public function search(Request $request)
    {
        $request->validate([
            'session'=>'required',
            'course'=>'required'
        ]);
        $course = Course::find($request->course);
        $session = Session::find($request->session);
        $uploaded_result = LecturerCourseResultUpload::where([
            'lecturer_course_id'=>$course->currentCourseLecturer()->id,
            'session_id'=>$request->session,
        ])->first();
        if(blank($uploaded_result)){
            session()->flash('error',['The result of '.$course->code.' at '.$session->name.' is not yet uploaded']);
            return back();
        }
        session()->flash('message','The result of '.$course->code.' at '.$session->name);
        return redirect()->route('department.result.course.review',[$uploaded_result->id]);
    }


    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function review($result_id)
    {
        return view('department::department.course.result.review',['result'=>LecturerCourseResultUpload::find($result_id)]);
    }
    public function editCourseResult($result_id)
    {
        return view('department::department.course.result.edit',['upload'=>LecturerCourseResultUpload::find($result_id)]);
    }
    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function amend($result_id)
    {
        return view('department::department.course.result.amend',['result'=>LecturerCourseResultUpload::find($result_id)]);
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
