<?php
namespace Modules\Student\Services\Traits\Student\Result;

trait UnWaveResult
{
    
	public function unWaveThisResult()
	{
		$this->update(['waved_by'=>0,'grade'=>'F','points'=>0.00]);
		$this->reRegisterthisToRepeatCourses();
        $this->reUpdateThisResultRemark();
	}
    
    public function reRegisterthisToRepeatCourses()
    {
      
        foreach($this->thisResultStudent()->repeatCourses->where(['session_id'=>currentSession()->id+1,'course_id'=>$this->courseRegistration->course->id]) as $repeatCourse){
            $repeatCourse->update(['status'=>1]);
        }
    }

    public function reUpdateThisResultRemark()
    {
        $this->update(['remark_id'=>5]);
    }

}