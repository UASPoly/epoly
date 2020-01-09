<?php

namespace Modules\Staff\Entities;

use Modules\Core\Entities\BaseModel;

class ProfileDocument extends BaseModel
{
    public function profile()
    {
    	return $this->belongsTo(Profile::class);
    }
}
