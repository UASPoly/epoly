<?php
namespace Modules\Student\Services\Traits;

use Illuminate\Support\Carbon;
use Modules\Department\Entities\Level;

trait HasCurrentLevelCourses

{

    public function currentLevelCourses()
    {
        return $this->level()->courses ?? [];
    }

    public function currentLevelCourseUnits()
    {
        $units = 0;
        foreach ($this->currentLevelCourses() as $course) {
            $units = $units + $course->unit;
        }
        return $units;
    }

    public function currentLevelReRegisterCourses()
    {
        return array_merge($this->getThisLevelRepeatCourses(),$this->getThisLevelDropCourses(),$this->getThisLevelReRegisterCourses());
    }

    public function getThisLevelReRegisterCourses()
    {
        $courses = [];
        foreach ($this->reRegisterCourses->where('status',1) as $reRegister) {
            $courses[] = $reRegister->course;
        }
        return $courses;
    }

    public function getThisLevelDropCourses()
    {
        $courses = [];
        foreach ($this->dropCourses->where('status',1) as $drop) {
            $courses[] = $drop->course;
        }
        return $courses;
    }

    public function getThisLevelRepeatCourses()
    {
        $courses = [];
        foreach ($this->repeatCourses->where('status',1) as $repeat) {
            $courses[] = $repeat->course;
        }
        return $courses;
    }
    
}