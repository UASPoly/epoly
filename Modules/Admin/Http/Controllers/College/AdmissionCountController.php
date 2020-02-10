<?php

namespace Modules\Admin\Http\Controllers\College;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Admin\Entities\Session;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class AdmissionCountController extends AdminBaseController
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('admin::college.admission.index',['sessions'=>Session::all()]);
    }

    public function getDepartmentalAdmissions(Request $request)
    {
        $request->validate(['session'=>'required']);
        return view('admin::college.admission.admission',['session'=>Session::find($request->session)]);
    }

}
