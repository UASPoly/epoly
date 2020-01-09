<?php

namespace Modules\Department\Http\Controllers\Result;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Admin\Entities\Session;
use Modules\Student\Entities\Result;
use Modules\Department\Entities\Level;
use Modules\Department\Services\Vetting\GenerateVettableResult;
use Modules\Core\Http\Controllers\Department\HodBaseController;

class WaveResultController extends HodBaseController
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('department::department.result.wave.index',['route'=>'department.students.results.wave.search','levels'=>Level::all(),'sessions'=>Session::all()]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function search(Request $request)
    {
        $request->validate([
            'session'=>'required',
            'level'=>'required',
            'semester'=>'required',
            'paginate'=>'required'
        ]);

        session(['course_registrations'=>$request->all()]);
        return redirect()->route('department.students.results.wave.view',[$request->semester]);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function view()
    {
        if(session('course_registrations')){
        
            $vetting = new GenerateVettableResult(session('course_registrations'));

            return view('department::department.course.result.student.wave',['route'=>'department.students.results.wave.register','registrations'=>$vetting->results]);
        }
        return redirect()->route('department.students.results.wave.index');
    }

    public function waveResult($result_id)
    {
        $result = Result::find($result_id);
        if($result->waved()){
            $message = 'The result waving has been cancelled successfully';
            $result->unWaveThisResult();
        }else{
            $result->waveThisResult();
            $message = 'THe result waving has been register successfully';
        }
        
        session()->flash('message', $message);
        
        return back();
    }
}
