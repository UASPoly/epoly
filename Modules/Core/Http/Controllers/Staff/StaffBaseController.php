<?php

namespace Modules\Core\Http\Controllers\Staff;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class StaffBaseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:staff');
        $this->middleware('valid_staff');
    }
}
