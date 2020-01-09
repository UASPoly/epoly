<?php

namespace Modules\Staff\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class StaffDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $this->call(GenderTableSeeder::class);
        $this->call(ReligionTableSeeder::class);
        $this->call(StaffCategoriesTableSeeder::class);
        $this->call(PositionsTableSeeder::class);
        $this->call(StaffTypesTableSeeder::class);
        $this->call(TribeTableSeeder::class);
        $this->call(AcademicStaffTableSeeder::class);
    }
}
