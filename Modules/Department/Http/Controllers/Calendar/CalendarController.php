<?php

namespace Modules\Department\Http\Controllers\Calendar;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Core\Http\Controllers\Department\HodBaseController;


class CalendarController extends HodBaseController
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function view()
    {
        return view('department::calendar.view');
    }

}
