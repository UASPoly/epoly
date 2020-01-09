<?php

namespace Modules\Department\Http\Controllers\Graduation;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Admin\Entities\Session;
use Modules\Core\Http\Controllers\Department\HodBaseController;

class GraduationController extends HodBaseController
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function graduationIndex()
    {
        return view('department::department.graduation.index',['message'=>'Search Graduated Students','department'=>department(),'route'=>'department.graduation.search.graduates']);
    }

    public function spillOverIndex()
    {
        return view('department::department.graduation.index',['message'=>'Search Spill Over Students','department'=>department(),'route'=>'department.graduation.search.spills']);
    }

    public function withDrawIndex()
    {
        return view('department::department.graduation.index',['message'=>'Search With Draw Students','department'=>department(),'route'=>'department.graduation.search.withdraws']);
    }

    
    public function searchGraduateStudents(Request $request)
    {
        $request->validate(['session'=>'required']);
        $session = Session::find($request->session);
        return view('department::department.graduation.graduates',['session'=>$session,'students'=>$session->graduatedStudents()]);
    }

    public function searchSpillingStudents(Request $request)
    {
        $request->validate(['session'=>'required']);
        $session = Session::find($request->session);
        return view('department::department.graduation.spilled',['session'=>$session,'students'=>$session->spilledStudents()]);
    }

    public function searchWithDrawedStudents(Request $request)
    {
        $request->validate(['session'=>'required']);
        $session = Session::find($request->session);
        return view('department::department.graduation.withDrawed',['session'=>$session,'students'=>$session->withDrawStudents()]);
    }
}
