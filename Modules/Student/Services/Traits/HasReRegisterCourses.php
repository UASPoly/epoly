<?php
namespace Modules\Student\Services\Traits;

trait HasReRegisterCourses

{

    public function reRegisterCourseUnits()
    {
        $units = 0;
        foreach ($this->reRegisterCourses as $reRegisterCourse) {
            $units = $units + $reRegisterCourse->course->unit;
        }
        return $units;
    }
    
}