<?php

namespace Modules\Lecturer\Http\Controllers\Course;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Admin\Entities\Session;
use Modules\Department\Entities\Course;
use Modules\Core\Http\Controllers\Lecturer\LecturerBaseController;
use Modules\Department\Statistics\Results\Lecturer\CourseResultChart;

class ResultChartController extends LecturerBaseController
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('lecturer::statistics.index');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */

    public function search(Request $request)
    {
        session([
            'data' => [
                    'course'=>Course::find($request->course),
                    'session'=>Session::where('name',$request->session)->first()
                ]]);

        return redirect()->route('lecturer.courses.results.statistics.chart.view');
    }

    public function view()
    {
        $chart = new CourseResultChart;
        if(session('data')){
            return view('lecturer::statistics.chart',['chart'=>$chart->createChart()]);
        }
        return back();
    }
}
