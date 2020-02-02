<?php

namespace Modules\Department\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Department\Entities\ProgrammeType;

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
            ['name'=>'OD'],
            ['name'=>'ND'],
            ['name'=>'CONVERSION'],
            ['name'=>'HND']
        ];
        foreach ($programmes as $programme) {
            $programmeType = ProgrammeType::firstOrCreate($programme);
        }
    }
}
