<?php

namespace Modules\Lecturer\Http\Controllers\Result;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use Modules\Department\Entities\Course;
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
        $errors = $this->verifyThisFile($request->all());
        if(empty($errors)){
            $course = Course::find($request->course);
            $result = new UploadScoreSheet($request->all());
            Excel::import(new UploadResult($result->uploadedBy(),$request->all()), $request->file('result'));
            if(!session('error')){
                session()->flash('message','Congratulation '.currentSession()->name.' result of '.$course->code.' is successfully uploaded to all registered students');
            }
        }else{
            session()->flash('error',$errors);
        }
        return back();
    }

    
}
