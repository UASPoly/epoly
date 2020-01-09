<?php

namespace Modules\Student\Entities;

use Modules\Core\Entities\BaseModel;

class ResultRemark extends BaseModel
{

    public function remark()
    {
    	return $this->belongsTo(Remark::class);
    }

    public function result()
    {
    	return $this->belongsTo(Result::class);
    }
    
}
