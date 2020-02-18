<?php
namespace Modules\Student\Services\Traits\Student\Result;

use Modules\Department\Entities\ProgrammeLevel;

trait HasResult
{
    public function getThisCourseResult($courseId)
    {
    	$result = null;
    	foreach ($this->sessionRegistrations as $sessionRegistration) {
    		foreach ($sessionRegistration->semesterRegistrations as $semesterRegistration) {
    			foreach ($semesterRegistration->courseRegistrations->where('course_id',$courseId) as $courseRegistration) {
    				if($courseRegistration->result->point > 0){
    					$result = $courseRegistration->result;
    				}
    			}
    		}
    	}
    	return $result;
    }

    public function getThisCourseAttempts($courseId)
    {
    	$result = [];
    	foreach ($this->sessionRegistrations as $sessionRegistration) {
    		foreach ($sessionRegistration->semesterRegistrations as $semesterRegistration) {
    			foreach ($semesterRegistration->courseRegistrations->where('course_id',$courseId) as $courseRegistration) {
    				if(in_array($courseRegistration->result->grade,['A','AB','B','BC','C','CD','D','E','F'])){
    					$result[] = $courseRegistration->id;
    				}
    			}
    		}
    	}
    	return count($result);
    }

    public function getThisSemesterGradePointsAverage(ProgrammeLevel $programmeLevel,$semesterId)
    {
    	$units = 0;
    	$points = 0;
        
    	foreach ($programmeLevel->levelCourses() as $course) {
    		if($course->semester->id == $semesterId){
	    		$studentResultOfThisCourse = $this->getThisCourseResult($course->id);
	    		if($studentResultOfThisCourse){
					$points += $courseRegistration->points;
					$units += $courseRegistration->course->unit;
	    		}
	    	}
    	}
    	if($units == 0){
    		$units ++ ;
    	}
    	return number_format($points/$units,2);
    }

    public function getCumulativeGradePointAverage()
    {
    	$gradePoints = 0;
    	$counts = 0;
    	foreach($this->admission->programme->programmeLevels as $programmeLevel){
            foreach ([1,2] as $semesterId) {
            	$counts++;
            	$gradePoints += $this->getThisSemesterGradePointsAverage($programmeLevel,$semesterId);
            }
    	}
        if($counts==0){
        	$counts++;
        }

        return number_format($gradePoints/$counts,2);
    }

}