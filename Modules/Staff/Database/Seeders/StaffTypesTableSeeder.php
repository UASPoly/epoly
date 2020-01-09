<?php

namespace Modules\Staff\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Staff\Entities\StaffType;

class StaffTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $academic = ['Lecturer','Lab Technician'];
        $non_academic = ['Admin','Registrar'];
        foreach ($academic as $staff) {
            StaffType::firstOrCreate(['staff_category_id'=>1,'name'=>$staff]);
        }
        foreach ($non_academic as $staff) {
            StaffType::firstOrCreate(['staff_category_id'=>2,'name'=>$staff]);
        }
    }
}
