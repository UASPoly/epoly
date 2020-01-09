<?php

namespace Modules\Lecturer\Http\Controllers\Result;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Department\Entities\Course;
use Modules\Core\Http\Controllers\Lecturer\LecturerBaseController;

class ResultController extends LecturerBaseController
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('lecturer::result.index');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function searchResult(Request $request)
    {
        $request->validate([
           'session'=>'required',
           'course'=>'required'
        ]); 
        $results = [];
        $course = Course::find($request->course);
        foreach ($course->courseRegistrations as $course_registration) {
            if(substr($course_registration->created_at,0,4) == substr($request->session, 0,4) || substr($course_registration->created_at,0,4) == substr($request->session, 5,4)){
                $results[] = $course_registration->result;
            }
        }
        session(['results'=>$results]);
        return redirect()->route('lecturer.result.show');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function showResult()
    {
        return view('lecturer::result.show');
    }


}
