<?php

namespace Modules\Staff\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Staff\Entities\Position;

class PositionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $academic = ['Head Of Department','College Directer'];
        $non_academic = ['Chairman Of Admission','Chairman of verification'];
        foreach ($academic as $position) {
            Position::firstOrCreate(['staff_category_id'=>1,'name'=>$position]);
        }
        foreach ($non_academic as $position) {
            Position::firstOrCreate(['staff_category_id'=>2,'name'=>$position]);
        }
    }
}
