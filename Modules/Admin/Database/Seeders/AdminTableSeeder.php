<?php

namespace Modules\Admin\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Admin\Entities\Admin;
use Illuminate\Support\Facades\Hash;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        Admin::create([
            'first_name'=>'Isah',
            'last_name'=>'labbo',
            'email'=>'isahlabbo@poly.com',
            'phone'=>'08162463010',
            'password'=>Hash::make('isahlabbo'),
        ]);
    }
}
