<?php

namespace Modules\Lecturer\Http\Controllers\Result;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use Modules\Department\Entities\Course;
use Modules\Department\Entities\Department;
use Modules\Department\Entities\LecturerCourse;
use Modules\Lecturer\Services\Result\VerifyUploadFile;
use Modules\Lecturer\Imports\UploadResult;
use Modules\Lecturer\Services\Result\UploadScoreSheet;
use Modules\Lecturer\Entities\LecturerCourseResultUpload;
use Modules\Core\Http\Controllers\Lecturer\LecturerBaseController;

class ResultUploadController extends LecturerBaseController
{
    use VerifyUploadFile;
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('lecturer::result.upload.index');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function upload(Request $request)
    {
        $request->validate([
        'course' =>'required',
        'result'  => 'required',
        'session'  => 'required'
        ]);
        $data = $request->all();
        if(!isset($data['department'])){
            $data['course'] = LecturerCourse::find($request->course)->course->id;
            $data['department'] = LecturerCourse::find($request->course)->department->id;
        }

        $errors = $this->verifyThisFile($data);
        if(empty($errors)){
            $course = Course::find($data['course']);
            $result = new UploadScoreSheet($data);
            Excel::import(new UploadResult($result->uploadedBy(),$data), $request->file('result'));
            if(!session('error')){
                session();
            }
        }else{
            session()->flash('error',$errors);
            return back();
        }
        return back()->with('success','Congratulation '.currentSession()->name.' result of '.$course->code.' for '.Department::find($data['department'])->name.' is successfully uploaded');
    }

    
}
