<?php

namespace Modules\Admin\Entities;

use Modules\Staff\Entities\Tribe;
use Modules\Staff\Entities\Gender;
use Modules\Staff\Entities\Religion;
use Modules\College\Entities\College;
use Modules\Student\Entities\Programme;
use Modules\Department\Entities\ProgrammeType;
use Modules\Staff\Entities\StaffCategory;
use Modules\Department\Entities\Level;
use Modules\Department\Entities\Semester;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Admin extends Authenticatable
{
	use Notifiable;
    protected $fillable = [
        'first_name',
        'last_name',
        'phone',
        'email',
        'password',
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

    public function colleges()
    {
        return College::all();
    }
    
    public function departments()
    {
        return $this->hasMany('Modules\Department\Entities\Department');
    }

    public function staffCategories()
    {
        return StaffCategory::all();
    }

    public function genders()
    {
        return Gender::all();
    }

    public function programmeTypes()
    {
        return ProgrammeType::all();
    }

    public function programmes()
    {
        return Programme::all();
    }

    public function religions()
    {
        return Religion::all();
    }

    public function levels()
    {
        return Level::all();
    }

    public function semesters()
    {
        return Semester::all();
    }

    public function staffs()
    {
        return $this->hasMany('Modules\Staff\Entities\Staff');
    }
}
