<?php
namespace Modules\Student\Services\Traits;

use Illuminate\Support\Carbon;
use Modules\Department\Entities\Level;

trait HasRepeatCourses

{
    use HasReRegisterCourses,HasDropCourses;

    public function currentSessionCarryOverCourseUnits()
    {
        $units = 0;
        foreach ($this->repeatCourses as $repeatCourse) {
            $units = $units + $repeatCourse->course->unit;
        }
        return $units + $this->dropCourseUnits() + $this->reRegisterCourseUnits();
    }
    
}