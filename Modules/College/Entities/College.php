<?php

namespace Modules\College\Entities;

use Modules\Core\Entities\BaseModel;

class College extends BaseModel
{
    public function admin()
    {
    	return $this->belongsTo('Modules\Admin\Entities\Admin');
    }

    public function staffPositions()
    {
    	return $this->hasMany('Modules\Staff\Entities\StaffPosition');
    }

    public function departments()
    {
    	return $this->hasMany('Modules\Department\Entities\Department');
    }

    public function directers()
    {
        return $this->hasMany(Directer::class);
    }
    
}
