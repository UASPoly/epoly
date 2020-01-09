<?php

namespace Modules\College\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\College\Entities\College;
use Illuminate\Database\Eloquent\Model;

class CollegeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $colleges = [
            [
                'name'=>'Science And Technology',
                'code'=>5,
                'admin_id'=>1,
                'description'=>'college description',
                'established_date'=>'2019-10-03'
            ],
            [
                'name'=>'Engeneering',
                'code'=>7,
                'admin_id'=>1,
                'description'=>'college description',
                'established_date'=>'2019-10-03'
            ],
            [
                'name'=>'Agriculture',
                'code'=>4,
                'admin_id'=>1,
                'description'=>'college description',
                'established_date'=>'2019-10-03'
            ],
        ];
        foreach($colleges as $college){
            College::firstOrCreate($college);
        }
    }
}
