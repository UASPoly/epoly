<?php

namespace Modules\Department\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Department\Entities\Level;

class LevelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $levels = [
            ['name'=>'OD I'],
            ['name'=>'OD II'],
            ['name'=>'ND I'],
            ['name'=>'ND II'],
            ['name'=>'CONVERSION'],
            ['name'=>'HND I'],
            ['name'=>'HND II'],
            
        ];
        foreach ($levels as $level) {
            Level::firstOrCreate($level);
        }
    }
}
