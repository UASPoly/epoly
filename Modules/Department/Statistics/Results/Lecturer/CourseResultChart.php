<?php

namespace Modules\Department\Statistics\Results\Lecturer;

use ConsoleTVs\Charts\Classes\Fusioncharts\Chart;

class CourseResultChart extends Chart
{
    /**
     * Initializes the chart.
     *
     * @return void
     */
    public function createChart()
    {
        $this->labels(['Pass','Fail']);
        $this->dataset(session('data')['course']->code.' Result of '.session('data')['session']->name.' Session Report', 'Pie',$this->dataSets())->color($this->colors());
        return $this;
    }

    public function colors()
    {
    	return ['#6da242','red'];
    }

    public function dataSets()
    {           
    	$pass = 890;
    	$fail = 210;
    	// foreach (session('data')['session']->sessionRegistrations as $session_registration) {
    	// 	foreach ($session_registration->sessionCourseRegistrations as $course_registration) {
    	// 		if($course_registration->course_id == session('data')['course']->id && $course_registration->result->remark->name == 'Pass'){
    	// 			$pass++;
    	// 		}else{
    	// 			$fail++;
    	// 		}
    	// 	}
    	// }
    	return [$pass,$fail];
    }
}
