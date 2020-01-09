<?php

namespace Modules\Department\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Student\Entities\Schedule;

class ScheduleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $schedules = [
            ['name'=>'MORNING','code'=>9],
            ['name'=>'EVENING','code'=>0]];
        foreach ($schedules as $schedule) {
            Schedule::firstOrCreate($schedule);
        }
    }
}
