<?php
namespace Modules\Student\Services\Traits;

trait FreshCourseRegistration
{
    public function makeFreshCourseRegistration()
    {
        if(count($this->sessionRegistrations) > 0){
            $this->deleteCurrentCoursewsRegistration();
        }

        $level = $this->level();
        $session_registration = $this->sessionRegistrations()->firstOrCreate([
            'programme_level_id'=>$level->id,
            'department_id'=>$this->admission->department_id,
            'session_id'=> currentSession()->id
        ]);
        
        foreach($this->currentLevelCourses() as $course){
            $semester_registration = $session_registration->semesterRegistrations()->firstOrCreate(['semester_id'=>$course->semester->id]);
            $course_registration = $semester_registration->courseRegistrations()->firstOrCreate([
                'course_id'=>$course->id,
                'session_id'=> currentSession()->id,
                'department_id'=>$this->admission->department_id,
                'admission_id'=>$this->admission->id
            ]);
            $course_registration->result()->firstOrCreate([]);
        }
    }

    public function deleteCurrentCoursewsRegistration()
    {
        foreach($this->sessionRegistrations as $sessionRegistration){
            foreach($sessionRegistration->semesterRegistrations as $semesterRegistration){
                foreach($semesterRegistration->courseRegistrations as $courseRegistration){
                    $courseRegistration->result->delete();
                    $courseRegistration->delete();
                }
                $semesterRegistration->delete();
            }
            $sessionRegistration->delete();
        }
    }
}
