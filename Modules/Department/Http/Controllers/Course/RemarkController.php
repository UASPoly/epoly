<?php

namespace Modules\Department\Http\Controllers\Course;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Student\Entities\SessionRegistration;
use Modules\Core\Http\Controllers\Department\HodBaseController;
use Modules\Department\Services\Results\Student\MakeStudentRemark;

class RemarkController extends HodBaseController
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('department::department.course.result.remark.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('department::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function register(Request $request)
    {
        
        $request->validate(['remark'=>'required']);
        new MakeStudentRemark($request->all());
        session()->flash('message','The Exam Monitoring Committee Verdict is registered successfully');
        return back();
    }

    /**
     * Search available rcourse registration in storage.
     * @param Request $request
     * @return Response
     */
    public function searchRegistration(Request $request)
    {
        $request->validate([
            'session'=>'required',
            'level'=>'required',
            'semester'=>'required'
        ]);
        $course_registrations = [];
        foreach(SessionRegistration::where(['department_id'=>headOfDepartment()->department->id,'session_id'=>$request->session,'level_id'=>$request->level])->get() as $session_registration){
            $course_registrations[] = $session_registration;
        }
        session(['course_registrations'=>$course_registrations]);
        return redirect()->route('department.result.remark.registration.view',[$request->semester]);
    }
    
    public function viewRegistration()
    {
        if(session('course_registrations')){
            return view('department::department.course.result.remark.registration',['registrations'=>session('course_registrations')]);
        }
        return redirect()->route('department.result.remark.index');
        
    }
    
}
