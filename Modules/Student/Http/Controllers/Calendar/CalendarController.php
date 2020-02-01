<?php

namespace Modules\Student\Http\Controllers\Calendar;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Core\Http\Controllers\Student\StudentBaseController;

class CalendarController extends StudentBaseController
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function view()
    {
        return view('student::calendar.view');
    }

}
