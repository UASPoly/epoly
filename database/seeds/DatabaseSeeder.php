<?php

use Illuminate\Database\Seeder;
use Modules\Admin\Database\Seeders\AdminDatabaseSeeder;
use Modules\Staff\Database\Seeders\StaffDatabaseSeeder;
use Modules\College\Database\Seeders\CollegeDatabaseSeeder;
use Modules\Student\Database\Seeders\StudentDatabaseSeeder;
use Modules\Department\Database\Seeders\DepartmentDatabaseSeeder;
use Modules\Lecturer\Database\Seeders\LecturerDatabaseSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        $this->call(StaffDatabaseSeeder::class);
        $this->call(CollegeDatabaseSeeder::class);
        $this->call(DepartmentDatabaseSeeder::class);
        $this->call(StudentDatabaseSeeder::class);
        $this->call(LecturerDatabaseSeeder::class);
        $this->call(AdminDatabaseSeeder::class);

    }
}
