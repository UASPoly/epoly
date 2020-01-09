<?php

namespace Modules\Core\Http\Controllers\Lecturer;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class LecturerBaseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:lecturer');
        $this->middleware('active_lecturer');
    }
}
