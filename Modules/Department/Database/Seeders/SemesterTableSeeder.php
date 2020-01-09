<?php

namespace Modules\Department\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Department\Entities\Semester;

class SemesterTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $semesters = ['First Semester','Second Semester'];
        foreach ($semesters as $semester) {
            Semester::firstOrCreate(['name'=>$semester]);
        }
    }
}
