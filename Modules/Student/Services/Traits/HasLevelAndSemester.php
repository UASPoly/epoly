<?php
namespace Modules\Student\Services\Traits;

use Illuminate\Support\Carbon;
use Modules\Department\Entities\Level;

trait HasLevelAndSemester

{
    use HasCurrentLevelCourses,HasRepeatCourses, HasCurrentLevelCoursesAt;
    
    public function level()
    {
        return Level::where('name',$this->currentLevel())->first();
    }

    protected function currentLevel()
    {
        $level = null;

        $prefix = $this->levelPrefix();

        switch ($this->yearsSinceAdmission()) {
            case 0:
                $level = $prefix.' I';
                break;
            case 1:
                $level = $prefix.' II';
                break;
            case 2:
                $level = 'FIRST SPILL';
                break;
            case 3:
                $level = 'SECOND SPILL';
                break;
            default:
                $level = 'WITH DRAW';
                break;
        }
        return $level;
    }

    public function admissionYearPrefix()
    {
        return substr(date($this->admission->created_at),0,2);
    }

    public function admissionYear()
    {
        return $this->admissionYearPrefix().substr($this->admission->admission_no,0,2)+1;
    }

    public function yearsSinceAdmission()
    {
        return substr(currentSession()->name, 5) - $this->admissionYear();
    }

    public function levelPrefix()
    {
        return $this->programme->programmeType->name;
    }

}