<?php

namespace Modules\Core\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class AdminBaseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
}
