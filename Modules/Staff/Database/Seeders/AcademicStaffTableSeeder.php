<?php

namespace Modules\Staff\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Staff\Entities\Staff;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Model;

class AcademicStaffTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        for ($i=1; $i <=10 ; $i++) { 
            $this->registerThisStaff($this->getStaffSerialNumber($i));
        }
        
    }

    public function registerThisStaff($number)
    {
        $staff = Staff::firstOrCreate([
           'first_name'=>'first name',
           'last_name'=>'last name',
           'phone'=>'phone number',
           'email' => $number.'@sospoly.com',
           'staffID' => $number,
           'password'=>Hash::make($number),
           'department_id' => 1,
           'staff_category_id' => 1,
           'employed_at' => '2019-10-03 18:52:00'
        ]);

        $staff->profile()->create([
            'gender_id' => 1,
            'religion_id' => 1,
            'tribe_id' => 1,
            'address' => 'umaru ali shinkafi sokoto state poly technic',
            'date_of_birth' => '1980-10-03 18:52:00',
            'biography' => 'staff biography',
        ]);
    }

    public function getStaffSerialNumber($number)
    {
        if($number < 10){
            $staff_number = '00'.$number;
        }elseif($number > 10 && $number < 100){
            $staff_number = '0'.$number;
        }else{
            $staff_number = $number;
        }
        return 'staff'.$staff_number;
    }
}
