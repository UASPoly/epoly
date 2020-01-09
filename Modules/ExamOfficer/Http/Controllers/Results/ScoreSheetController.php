<?php

namespace Modules\ExamOfficer\Http\Controllers\Results;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Admin\Entities\Session;
use Maatwebsite\Excel\Facades\Excel;
use Modules\Department\Entities\Course;
use Modules\Lecturer\Imports\UploadResult;
use Modules\Lecturer\Services\Result\DownloadScoreSheet;
use Modules\Lecturer\Services\Result\UploadScoreSheet;
use Modules\Lecturer\Services\Result\VerifyUploadFile;
use Modules\Core\Http\Controllers\Department\ExamOfficerBaseController;

class ScoreSheetController extends ExamOfficerBaseController
{
    use VerifyUploadFile;
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function downloadIndex()
    {
        return view('examofficer::result.scoreSheet.download.index',['route'=>'exam.officer.result.scoresheet.download']);
    }
    
    public function uploadIndex()
    {
        return view('examofficer::result.scoreSheet.upload.index',['route'=>'exam.officer.result.scoresheet.upload']);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function downloadScoreSheet(Request $request)
    {
        $request->validate([
            'session'=>'required',
            'course'=>'required'
        ]);
        $scoreSheet = new DownloadScoreSheet($request->all());
        return $scoreSheet->downloadFile();
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function uploadScoreSheet(Request $request)
    {
        $request->validate([
        'course' =>'required',
        'result'  => 'required',
        'session'  => 'required'
        ]);
        $errors = $this->verifyThisFile($request->all());
        if(empty($errors)){
            $session = Session::find($request->session);
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
