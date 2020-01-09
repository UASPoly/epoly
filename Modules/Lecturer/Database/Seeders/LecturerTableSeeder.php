<?php

namespace Modules\Lecturer\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Staff\Entities\Staff;
use Illuminate\Database\Eloquent\Model;

class LecturerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        foreach(Staff::where('staff_category_id',1)->get() as $staff){
            $staff->update(['staff_type_id'=>1]);
            $staff->lecturer()->firstOrCreate([
                'email'=>$staff->email,
                'password'=>$staff->password,
                'admin_id'=>1,
                'from' =>'2019-10-03 18:52:00'
            ]);
        }
    }
}
