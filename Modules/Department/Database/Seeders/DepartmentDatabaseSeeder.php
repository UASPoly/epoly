<?php

namespace Modules\Department\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DepartmentDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $this->call(SemesterTableSeeder::class);
        $this->call(ProgrammeTableSeeder::class);
        $this->call(ScheduleTableSeeder::class);
        $this->call(DepartmentTableSeeder::class);
        $this->call(CourseTableSeeder::class);
    }
}
