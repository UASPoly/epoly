<?php

namespace Modules\ExamOfficer\Http\Controllers\Calendar;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Core\Http\Controllers\Department\ExamOfficerBaseController;

class CalendarController extends ExamOfficerBaseController
{
    
    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function view()
    {
        return view('examofficer::calendar.view');
    }

    
}
