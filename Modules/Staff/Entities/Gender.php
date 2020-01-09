<?php

namespace Modules\Staff\Entities;

use Modules\Core\Entities\BaseModel;

class Gender extends BaseModel
{
    public function profiles($value='')
    {
    	return $this->hasMany(Profile::class);
    }
}
