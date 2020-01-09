<?php

namespace Modules\Lecturer\Entities;

use Modules\Core\Entities\BaseModel;

class LecturerCourseResultUpload extends BaseModel
{
    public function lecturerCourse()
    {
    	return $this->belongsTo('Modules\Department\Entities\LecturerCourse');
    }

    public function session()
    {
    	return $this->belongsTo('Modules\Admin\Entities\Session');
    }
    public function results()
    {
    	return $this->hasMany('Modules\Student\Entities\Result');
    }

    public function numberOfAs()
    {
    	return count($this->results->where('grade','A'));
    }

    public function numberOfABs()
    {
    	return count($this->results->where('grade','AB'));
    }

    public function numberOfBs()
    {
    	return count($this->results->where('grade','B'));
    }

    public function numberOfBCs()
    {
    	return count($this->results->where('grade','BC'));
    }

    public function numberOfCs()
    {
    	return count($this->results->where('grade','C'));
    }

    public function numberOfCDs()
    {
    	return count($this->results->where('grade','CD'));
    }

    public function numberOfDs()
    {
    	return count($this->results->where('grade','D'));
    }

    public function numberOfEs()
    {
    	return count($this->results->where('grade','E'));
    }

    public function numberOfFs()
    {
    	return count($this->results->where('grade','F'));
    }

    public function numberOfSs()
    {
    	return count($this->results->where('grade','S'));
    }

    public function numberOfXs()
    {
    	return count($this->results->where('grade','X'));
    }

    public function numberOfIs()
    {
    	return count($this->results->where('grade','I'));
    }
}
