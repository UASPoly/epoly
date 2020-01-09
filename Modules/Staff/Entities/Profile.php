<?php

namespace Modules\Staff\Entities;

use Modules\Core\Entities\BaseModel;

class Profile extends BaseModel
{
    public function gender()
    {
    	return $this->belongsTo(Gender::class);
    }

    public function profileDocuments()
    {
    	return $this->hasMnay(ProfileDocument::class);
    }

    public function staff()
    {
    	return $this->belongsTo(Staff::class);
    }

    public function tribe()
    {
        return $this->belongsTo(Tribe::class);
    }

    public function religion()
    {
        return $this->belongsTo(Religion::class);
    }

}
