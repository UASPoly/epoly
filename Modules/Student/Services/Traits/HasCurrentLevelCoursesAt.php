<?php
namespace Modules\Student\Services\Traits;

use Illuminate\Support\Carbon;
use Modules\Department\Entities\Level;

trait HasCurrentLevelCoursesAt

{

    public function currentLevelReRegisterCoursesAt($session)
    {
        return array_merge(
            $this->getThisLevelRepeatCoursesAt($session),
            $this->getThisLevelDropCoursesAt($session),
            $this->getThisLevelReRegisterCoursesAt($session)
        );
    }

    public function getThisLevelReRegisterCoursesAt($session)
    {
        $courses = [];
        foreach ($this->reRegisterCourses->where('session_id',$session->id + 1) as $reRegister) {
            $courses[] = $reRegister->course;
        }
        return $courses;
    }

    public function getThisLevelDropCoursesAt($session)
    {
        $courses = [];
        foreach ($this->dropCourses->where('session_id',$session->id + 1) as $drop) {
            $courses[] = $drop->course;
        }
        return $courses;
    }

    public function getThisLevelRepeatCoursesAt($session)
    {
        $courses = [];
        foreach ($this->repeatCourses->where('session_id',$session->id + 1) as $repeat) {
            $courses[] = $repeat->course;
        }
        return $courses;
    }
    
}