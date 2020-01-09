<?php

namespace Modules\Staff\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Staff\Entities\Gender;

class GenderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $genders = ['Male','Female','Others'];
        foreach ($genders as $gender) {
            Gender::firstOrCreate(['name'=>$gender]);
        }
    }
}
