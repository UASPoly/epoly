<?php
namespace Modules\Student\Services\Traits;

use Illuminate\Support\Carbon;
use Modules\Department\Entities\Level;

trait HasDropCourses

{

    public function dropCourseUnits()
    {
        $units = 0;
        foreach ($this->dropCourses as $dropCourse) {
            $units = $units + $dropCourse->course->unit;
        }
        return $units;
    }
    
}