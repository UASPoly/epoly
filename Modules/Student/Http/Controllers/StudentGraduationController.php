<?php

namespace Modules\Student\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class StudentGraduationController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function graduation()
    {
        return view('student::status.graduation');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function withDraw()
    {
        return view('student::status.withDraw');
    }

    
}
