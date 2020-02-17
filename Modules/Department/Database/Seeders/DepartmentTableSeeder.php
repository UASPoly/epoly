<?php

namespace Modules\Department\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Department\Entities\Department;
use Illuminate\Database\Eloquent\Model;

class DepartmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $departments = [
            [
                'name'=>'Computer Science',
                'description'=>'college description',
                'established_date'=>'2019-10-03',
                'college_id'=>1,
                'admin_id'=>1,
                'code'=>4
            ],
            [
                'name'=>'Mathematics',
                'description'=>'college description',
                'established_date'=>'2019-10-03',
                'admin_id'=>1,
                'college_id'=>1,
                'code'=>5
            ],
            [
                'name'=>'Statistics',
                'description'=>'college description',
                'established_date'=>'2019-10-03',
                'college_id'=>1,
                'admin_id'=>1,
                'code'=>6
            ],
            [
                'name'=>'Physics',
                'description'=>'college description',
                'established_date'=>'2019-10-03',
                'college_id'=>1,
                'admin_id'=>1,
                'code'=>7
            ],
            [
                'name'=>'General Studies',
                'description'=>'college description',
                'established_date'=>'2019-10-03',
                'college_id'=>1,
                'admin_id'=>1,
                'code'=>8
            ],
            [
                'name'=>'Accounting',
                'description'=>'college description',
                'established_date'=>'2019-10-03',
                'college_id'=>1,
                'admin_id'=>1,
                'code'=>8
            ],
        ];
        foreach($departments as $department){
            $department = Department::firstOrCreate($department);
        }
    }
}
