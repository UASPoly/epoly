<?php
namespace Modules\Admin\Services\Calender;

use Modules\Admin\Entities\ExamCalendar;
use Modules\Admin\Entities\LectureCalendar;
use Modules\Admin\Entities\MarkingCalendar;
use Modules\Admin\Entities\UploadResultCalendar;
use Modules\Admin\Entities\CourseAllocationCalendar;

trait SubSemesterCalenders

{
	public function registerNewSemesterExamMarkingCalendar($semesterCalendar)
    {
    	$calendar = null;
        if($semesterCalendar->semester_id == 1){
            $calendar = $semesterCalendar->markingCalendar()->firstOrCreate([
            	'start'=>$this->data['first_semester_exam_marking_start'],
            	'end'=>$this->data['first_semester_exam_marking_end']
            ]);
    	}else{
            $calendar = $semesterCalendar->markingCalendar()->firstOrCreate([
            	'start'=>$this->data['second_semester_exam_marking_start'],
            	'end'=>$this->data['second_semester_exam_marking_end']
            ]);
    	}
    	return $calendar;
    }

    public function registerNewSemseterCourseAllocationCalendar($semesterCalendar)
    {
    	$calendar = null;
    	if($semesterCalendar->semester_id == 1){
            $calendar = $semesterCalendar->courseAllocationCalendar()->firstOrCreate([
            	'start'=>$this->data['first_semester_course_allocatiion_start'],
            	'end'=>$this->data['first_semester_course_allocatiion_end']
            ]);
    	}else{
            $calendar = $semesterCalendar->courseAllocationCalendar()->firstOrCreate([
            	'start'=>$this->data['second_semester_course_allocation_start'],
            	'end'=>$this->data['second_semester_course_allocation_end']
            ]);
    	}
    	return $calendar;
    }

    public function registerNewSemseterResultUploadCalendar($semesterCalendar)
    {
    	$calendar = null;
    	if($semesterCalendar->semester_id == 1){
            $calendar = $semesterCalendar->uploadResultCalendar()->firstOrCreate([
            	'start'=>$this->data['first_semester_result_upload_start'],
            	'end'=>$this->data['first_semester_result_upload_end']
            ]);
    	}else{
            $calendar = $semesterCalendar->uploadResultCalendar()->firstOrCreate([
            	'start'=>$this->data['second_semester_result_upload_start'],
            	'end'=>$this->data['second_semester_result_upload_end']
            ]);
    	}
    	return $calendar;
    }

    public function registerNewSemesterExamCalendar($semesterCalendar)
    {
    	$calendar = null;
    	if($semesterCalendar->semester_id == 1){
            $calendar = $semesterCalendar->examCalendar()->firstOrCreate([
            	'start'=>$this->data['first_semester_exam_start'],
            	'end'=>$this->data['first_semester_exam_end']
            ]);
    	}else{
            $calendar = $semesterCalendar->examCalendar()->firstOrCreate([
            	'start'=>$this->data['second_semester_exam_start'],
            	'end'=>$this->data['second_semester_exam_end']
            ]);
    	}
    	return $calendar;
    }
    public function registerNewSemesterLectureCalendar($semesterCalendar)
    {
    	$calendar = null;
    	if($semesterCalendar->semester_id == 1){
            $calendar = $semesterCalendar->lectureCalendar()->firstOrCreate([
            	'start'=>$this->data['first_semester_lecture_start'],
            	'end'=>$this->data['first_semester_lecture_end']
            ]);
    	}else{
            $calendar = $semesterCalendar->lectureCalendar()->firstOrCreate([
            	'start'=>$this->data['second_semester_lecture_start'],
            	'end'=>$this->data['second_semester_lecture_end']
            ]);
    	}
    	return $calendar;
    }
}