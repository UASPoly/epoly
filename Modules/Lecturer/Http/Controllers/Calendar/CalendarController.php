<?php

namespace Modules\Lecturer\Http\Controllers\Calendar;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Core\Http\Controllers\Lecturer\LecturerBaseController;

class CalendarController extends LecturerBaseController
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function view()
    {
        return view('lecturer::calendar.view');
    }

    
}
