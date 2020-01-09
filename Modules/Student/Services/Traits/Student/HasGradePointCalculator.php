<?php
namespace Modules\Student\Services\Traits\Student;

trait HasGradePointCalculator

{
	/*
      this method return the number of units student passed
      at the current semester
	*/
	public function currentUnits()
    {  
    	$units = 0;
    	foreach ($this->courseRegistrations->where('cancelation_status',0) as $courseRegistration) {
    		if($courseRegistration->result->lecturerCourseResultUpload && $courseRegistration->result->points > 0){
                $units = $courseRegistration->course->unit + $units;
    		}
    	}
    	return $units;
    }
    /*
      this method return the number of units student registered
      at the current semester
	*/
    public function registeredUnits()
    {  
    	$units = 0;
    	foreach ($this->courseRegistrations->where('cancelation_status',0) as $courseRegistration) {
            if($courseRegistration->result->uploaded()){
                $units = $courseRegistration->course->unit + $units;
            }
    	}
    	return $units;
    }
    /*
      this method return the number of previous semesters units student passed
      before the current semester
	*/
    public function previousUnits()
    {
    	$units = 0;
    	$student = $this->sessionRegistration->student;
    	foreach ($student->sessionRegistrations->where('cancelation_status',0) as $sessionRegistration){
    		foreach($sessionRegistration->semesterRegistrations->where('cancelation_status',0) as $semesterRegistration) {
	    		if($this->id > $semesterRegistration->id){
	    			$units = $units + $this->getThisSemesterUnits($semesterRegistration);
	    		}
	    	}
    	}
    	return $units;
    }
    /*
      this method return the number of previous semesters units student registered
      before the current semester
	*/
    public function previousRegisteredUnits()
    {
    	$units = 0;
    	$student = $this->sessionRegistration->student;
    	foreach ($student->sessionRegistrations->where('cancelation_status',0) as $sessionRegistration) {
	    	foreach ($sessionRegistration->semesterRegistrations->where('cancelation_status',0) as $semesterRegistration) {
	    		if($this->id > $semesterRegistration->id){
	    			foreach ($semesterRegistration->courseRegistrations->where('cancelation_status',0) as $courseRegistration) {
                        if($courseRegistration->result->uploaded()){
                            $units = $courseRegistration->course->unit + $units;
                        }
			        }
	    		}
	    	}
	    }
    	return $units;
    }
    /*
      this method return the number of units student passed
      at the current semester
	*/
    public function getThisSemesterUnits($semester)
    {
    	$units = 0;
    	foreach ($semester->courseRegistrations->where('cancelation_status',0) as $courseRegistration) {
    		if($courseRegistration->result->lecturerCourseResultUpload && $courseRegistration->result->points > 0){
                $units = $courseRegistration->course->unit + $units;
    		}
    	}
    	return $units;
    }
    /*
      this method return the number of passed units 
      available from his first semester 
      in the school to date
	*/
    public function cummulativeUnits()
    {
    	return $this->previousUnits() + $this->currentUnits();
    }
    /*
      this method return the number of registered units 
      available from his first semester 
      in the school to date
	*/
    public function cummulativeRegisteredUnits()
    {
    	return $this->previousRegisteredUnits() + $this->registeredUnits();
    }
    /*
      this method return the grade points of the current semester;
	*/
    public function currentSemesterGradePoints()
    {
    	$points = 0;
    	foreach ($this->courseRegistrations->where('cancelation_status',0) as $course_registration) {
            if($course_registration->result->lecturerCourseResultUpload){
                $course_unit = $course_registration->course->unit;
                $points = ($course_registration->result->points * $course_unit) + $points;
            }
        }
        return $points;
    }
    /*
      this method return the grade points of the student first semester in the school to the semester before current semester;
	*/
    public function gradePointAsAtLastSemester()
    {
    	$points = 0;
    	$student = $this->sessionRegistration->student;
    	foreach ($student->sessionRegistrations->where('cancelation_status',0) as $sessionRegistration) {
	    	foreach ($sessionRegistration->semesterRegistrations->where('cancelation_status',0) as $semesterRegistration) {
	    		if($this->id > $semesterRegistration->id){
	    			$points = $points + $semesterRegistration->currentSemesterGradePoints();
	    		}
	    	}
	    }
    	return $points;
    }
    /*
      this method return the cummulative grade points 
      of the student from all of his pass courses;
	*/
    public function cummulativeGradePoints()
    {
    	return $this->gradePointAsAtLastSemester() + $this->currentSemesterGradePoints();
    }
    /*
      this method return the cummulative grade points average
      of the current semester of the student;
	*/
    public function currentSemesterCummulativeGradePointsAverage()
    {
    	$units = $this->registeredUnits();
    	if($units < 1){
    		$units = 1;
    	}
    	return $this->currentSemesterGradePoints() / $units;
    }
    /*
      this method return the cummulative grade points average
      of the student;
	*/
    public function cummulativeGradePointsAverage()
    {
    	$units = $this->cummulativeRegisteredUnits();
    	if($units < 1){
    		$units = 1;
    	}
    	return $this->cummulativeGradePoints() / $units;
    }
    /*
      this method check if all the courses of this semester was uploaded;
	*/
    public function allCoursesUploaded()
    {
        $upload = true;
        foreach ($this->courseRegistrations as $course_registration) {
            if(!$course_registration->result->lecturerCourseResultUpload){
                $upload = false;
            }
        }
        return $upload;
    }
    /*
      this method return the all courses failed by the student at this semester;
	*/
    public function failedResults()
    {
        $courses = [];
        if($this->cancelation_status == 0){
	    	foreach ($this->courseRegistrations->where('cancelation_status',0) as $course_registration) {
	            if($course_registration->result->lecturerCourseResultUpload && $course_registration->result->grade == 'F'){
	                $courses[] = $course_registration->course;
	            }
	        }
        }
        return $courses;
    }
    /*
      this method return the all courses passed by the student at this semester;
	*/
    public function passedResults()
    {
        $course = 0;
        if($this->cancelation_status == 0){
            foreach ($this->courseRegistrations->where('ancelation_status',0) as $course_registration) {
	            if($course_registration->result->lecturerCourseResultUpload && $course_registration->result->points > 2){
	                $course++;
	            }
	        }
        }
        
        return $course;
    }
}