<?php

namespace Modules\Staff\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Staff\Entities\StaffCategory;

class StaffCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $categories = ['Academic','Non Academic'];
        foreach ($categories as $category) {
            StaffCategory::firstOrCreate(['name'=>$category]);
        }
    }
}
