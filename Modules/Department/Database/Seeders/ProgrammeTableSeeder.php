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
            switch ($programmeType->id) {
                case '1':
                    foreach([1,2] as $level_id){
                        $programmeType->programmeTypeLevels()->firstOrCreate(['level_id'=>$level_id]);
                    }
                    break;
                case '2':
                    foreach([3,4] as $level_id){
                        $programmeType->programmeTypeLevels()->firstOrCreate(['level_id'=>$level_id]);
                    }
                    break;    
                case '4':
                    foreach([5,6] as $level_id){
                        $programmeType->programmeTypeLevels()->firstOrCreate(['level_id'=>$level_id]);
                    }
                    break; 
                default:
                    # code...
                    break;
            }
        }
    }
}
