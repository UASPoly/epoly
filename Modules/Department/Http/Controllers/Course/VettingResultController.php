<?php

namespace Modules\Department\Http\Controllers\Course;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Admin\Entities\Session;
use Modules\Department\Entities\Level;
use Modules\Department\Services\Vetting\GenerateVettableResult;
use Modules\Core\Http\Controllers\Department\HodBaseController;

class VettingResultController extends HodBaseController
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('department::department.course.result.vetting.index',['sessions'=>Session::all(),'levels'=>Level::all()]);
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
        return redirect()->route('department.result.course.vetting.view',[$request->semester]);
        
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $registration_id)
    {
        //
    }

    public function edit($registration_id)
    {
        # code...
    }

    public function view()
    {
        if(session('course_registrations')){
        
            $vetting = new GenerateVettableResult(session('course_registrations'));

            return view('department::department.course.result.vetting.print',['registrations'=>$vetting->results]);
        }
        return redirect()->route('department.result.course.vetting.index');
        
    }
}
