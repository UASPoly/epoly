<?php

namespace Modules\Department\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Student\Entities\Programme;

class ProgrammeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $programmes = [
            ['name'=>'ND','code'=>1],
            ['name'=>'HND','code'=>3]
        ];
        foreach ($programmes as $programme) {
            Programme::firstOrCreate($programme);
        }
    }
}
