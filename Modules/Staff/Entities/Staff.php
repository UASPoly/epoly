<?php

namespace Modules\Staff\Entities;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Staff extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'first_name',
        'last_name',
        'phone',
        'email',
        'password',
        'department_id',
        'admin_id',
        'staffID',
        'staff_type_id',
        'staff_category_id',
        'employed_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function admin()
    {
        return $this->belongsTo('Modules\Admin\Entities\Admin');
    }
    public function staffCategory()
    {
    	return $this->belongsTo(StaffCategory::class);
    }
    public function staffType()
    {
        return $this->belongsTo(StaffType::class);
    }
    public function profile()
    {
    	return $this->hasOne(Profile::class);
    }

    public function department()
    {
        return $this->belongsTo('Modules\Department\Entities\Department');
    }

    public function staffPositions()
    {
        return $this->hasMany(StaffPosition::class);
    }

    public function lecturer()
    {
        return $this->hasOne('Modules\Lecturer\Entities\Lecturer');
    }

    public function directer()
    {
        return $this->hasOne('Modules\College\Entities\Directer');
    }

    public function headOfDepartment()
    {
        return $this->hasOne('Modules\Department\Entities\HeadOfDepartment');
    }
}
