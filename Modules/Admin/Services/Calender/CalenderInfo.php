<?php
namespace Modules\Admin\Services\Calender;

trait CalenderInfo
{
	public function newCalenderInfo($year)
	{
		return [
                  'session_start' => $year.'-01-01',
                  'session_end' => $year.'-12-30',
                  'first_semester_start' =>  $year.'-01-01',
                  'first_semester_end' =>  $year.'-06-01',
                  'first_semester_course_allocatiion_start' =>  $year.'-01-01',
                  'first_semester_course_allocatiion_end' =>  $year.'-01-14',
                  'first_semester_lecture_start' =>  $year.'-01-14',
                  'first_semester_lecture_end' =>  $year.'-04-14',
                  'first_semester_exam_start' =>  $year.'-04-21',
                  'first_semester_exam_end' =>  $year.'-05-14',
                  'first_semester_exam_marking_start' =>  $year.'-05-14',
                  'first_semester_exam_marking_end' => $year.'-05-21',
                  'first_semester_result_upload_start' => $year.'-05-21',
                  'first_semester_result_upload_end' => $year.'-05-30',
                  'second_semester_start' => $year.'-07-01',
                  'second_semester_end' => $year.'-07-01',
                  'second_semester_course_allocation_start' => $year.'-07-01',
                  'second_semester_course_allocation_end' => $year.'-07-14',
                  'second_semester_lecture_start' => $year.'-07-14',
                  'second_semester_lecture_end' => $year.'-10-14',
                  'second_semester_exam_start' => $year.'-10-21',
                  'second_semester_exam_end' => $year.'-11-14',
                  'second_semester_exam_marking_start' => $year.'-11-14',
                  'second_semester_exam_marking_end' => $year.'-11-21',
                  'second_semester_result_upload_start' => $year.'-11-21',
                  'second_semester_result_upload_end' => $year.'-11-28',
            ];
	}
}