<?php

namespace Modules\Staff\Entities;

use Modules\Core\Entities\BaseModel;

class Religion extends BaseModel
{
    public function profiles()
    {
    	return $this->hasMany(Profile::class);
    }
}
