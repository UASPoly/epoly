<?php

namespace Modules\Student\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Student\Entities\RemarkType;

class RemarkTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $types = ['Result','Exam Monitoring Committee'];
        foreach ($types as $type) {
            RemarkType::firstOrCreate(['name'=>$type]);
        }
    }
}
