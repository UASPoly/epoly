<?php

namespace Modules\Student\Entities;

use Modules\Core\Entities\BaseModel;

class RemarkType extends BaseModel
{
    public function remarks()
    {
    	return $this->hasMany(Remark::class);
    }
}
