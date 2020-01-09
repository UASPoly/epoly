<?php

namespace Modules\Staff\Entities;

use Modules\Core\Entities\BaseModel;

class StaffPosition extends BaseModel
{
    public function department()
    {
    	return $this->belongsTo('Modules\Department\Entities\Department');
    }

    public function college()
    {
    	return $this->belongsTo('Modules\College\Entities\College');
    }

    public function staff()
    {
    	return $this->belongsTo('Modules\Staff\Entities\Staff');
    }

    public function position()
    {
    	return $this->belongsTo(Position::class);
    }
}
