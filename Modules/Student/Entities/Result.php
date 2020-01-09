<?php

namespace Modules\Student\Entities;

use Modules\Core\Entities\BaseModel;
use Modules\Student\Services\Traits\Student\Result\CanWaveResult;
use Modules\Student\Services\Traits\Student\Result\CanComputeGrade;
use Modules\Student\Services\Traits\Student\Result\AfterGradingEvent;

class Result extends BaseModel
{
	use CanComputeGrade, AfterGradingEvent, CanWaveResult;

    public function courseRegistration()
    {
    	return $this->belongsTo(CourseRegistration::class);
    }

    public function remark()
    {
    	return $this->belongsTo(Remark::class);
    }

    public function lecturerCourseResultUpload()
    {
        return $this->belongsTo('Modules\Lecturer\Entities\LecturerCourseResultUpload');
    }
}
