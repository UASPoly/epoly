<?php

namespace Modules\Staff\Entities;

use Modules\Core\Entities\BaseModel;

class Position extends BaseModel
{
    public function staffPositions()
    {
    	return $this->hasMany(StaffPosition::class);
    }
}
