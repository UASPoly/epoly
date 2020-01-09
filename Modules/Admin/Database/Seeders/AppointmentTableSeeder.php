<?php

namespace Modules\Admin\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Staff\Entities\Staff;
use Illuminate\Database\Eloquent\Model;

class AppointmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $staff = Staff::find(2);
        //create new head of the department
        $staff->department->headOfDepartments()->create([
            'email'=>$staff->email,
            'password'=>$staff->password,
            'admin_id'=>1,
            'department_id' => $staff->department->id,
            'staff_id' => $staff->id,
            'from'=> '2019-10-03'
        ]);
        $staff = Staff::find(1);
        $staff->department->college->directers()->create([
                'email'=>$staff->email,
                'password'=>$staff->password,
                'admin_id'=>1,
                'college_id' => $staff->department->college->id,
                'staff_id' => $staff->id,
                'from'=> '2019-10-03'
            ]);
        $staff = Staff::find(3);
        $staff->department->examOfficers()->create([
                'lecturer_id' => $staff->lecturer->id,
                'email'=>$staff->email,
                'password'=>$staff->password,
                'from'=> '2019-10-03'
            ]);
    }
}
