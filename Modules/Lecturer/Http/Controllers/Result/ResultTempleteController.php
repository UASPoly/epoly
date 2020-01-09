<?php

namespace Modules\Lecturer\Http\Controllers\Result;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Lecturer\Services\Result\DownloadScoreSheet;
use Modules\Core\Http\Controllers\Lecturer\LecturerBaseController;

class ResultTempleteController extends LecturerBaseController
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('lecturer::result.templete.index');
    }

    public function downloadTemplete(Request $request) 
    {
        $request->validate(['course'=>'required']);
        $scoreSheet = new DownloadScoreSheet($request->all());
        return $scoreSheet->downloadFile();
    }
}
