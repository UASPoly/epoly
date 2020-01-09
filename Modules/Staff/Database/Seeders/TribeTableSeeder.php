<?php

namespace Modules\Staff\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Staff\Entities\Tribe;

class TribeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $tribes = ['Hausa','Fulani','Yoruba','Igbo','Others'];
        foreach ($tribes as $tribe) {
            Tribe::firstOrCreate(['name'=>$tribe]);
        }
    }
}
