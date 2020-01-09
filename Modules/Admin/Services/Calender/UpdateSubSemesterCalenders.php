<?php
namespace Modules\Admin\Services\Calender;

use Modules\Admin\Entities\Calender;

trait UpdateSubSemesterCalenders

{
	public function updateNewSemesterExamMarkingCalender(Calender $calender)
    {
    	
    	if($calender->semester->id == 1){
            $calender->markingCalender->update([
            	'start'=>$this->data['first_semester_exam_marking_start'],
            	'end'=>$this->data['first_semester_exam_marking_end']
            ]);
    	}else{
            $calender->markingCalender->update([
            	'start'=>$this->data['second_semester_exam_marking_start'],
            	'end'=>$this->data['second_semester_exam_marking_end']
            ]);
    	}
    	return $calender->markingCalender;
    }

    public function updateNewSemseterCourseAllocationCalender(Calender $calender)
    {
    	
    	if($calender->semester->id == 1){
            $calender->courseAllocationCalender->update([
            	'start'=>$this->data['first_semester_course_allocatiion_start'],
            	'end'=>$this->data['first_semester_course_allocatiion_end']
            ]);
    	}else{
            $calender->courseAllocationCalender->update([
            	'start'=>$this->data['second_semester_course_allocation_start'],
            	'end'=>$this->data['second_semester_course_allocation_end']
            ]);
    	}
    	return $calender->courseAllocationCalender;
    }

    public function updateNewSemseterResultUploadCalender(Calender $calender)
    {
    	if($calender->semester->id == 1){
            $calender->uploadResultCalender->update([
            	'start'=>$this->data['first_semester_result_upload_start'],
            	'end'=>$this->data['first_semester_result_upload_end']
            ]);
    	}else{
            $calender->uploadResultCalender->update([
            	'start'=>$this->data['second_semester_result_upload_start'],
            	'end'=>$this->data['second_semester_result_upload_end']
            ]);
    	}
    	return $calender->uploadResultCalender;
    }
    public function updateNewSemesterExamCalender(Calender $calender)
    {
    	if($calender->semester->id == 1){
            $calender->examCalender->update([
            	'start'=>$this->data['first_semester_exam_start'],
            	'end'=>$this->data['first_semester_exam_end']
            ]);
    	}else{
            $calender->examCalender->update([
            	'start'=>$this->data['second_semester_exam_start'],
            	'end'=>$this->data['second_semester_exam_end']
            ]);
    	}
    	return $calender->examCalender;
    }
    public function updateNewSemesterLectureCalender(Calender $calender)
    {
    	if($calender->semester->id == 1){
            $calender->lectureCalender->update([
            	'start'=>$this->data['first_semester_lecture_start'],
            	'end'=>$this->data['first_semester_lecture_end']
            ]);
    	}else{
            $calender->lectureCalender->update([
            	'start'=>$this->data['second_semester_lecture_start'],
            	'end'=>$this->data['second_semester_lecture_end']
            ]);
    	}
    	return $calender->lectureCalender;
    }
}