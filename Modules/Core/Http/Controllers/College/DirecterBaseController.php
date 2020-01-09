<?php

namespace Modules\Core\Http\Controllers\College;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class DirecterBaseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:directer');
        $this->middleware('active_directer');
    }
}
