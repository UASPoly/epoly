<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Modules\Student\Entities\Programme;
use Modules\Department\Entities\Admission;
use Modules\Department\Entities\ReservedDepartmentSessionAdmission;

class ReservedMissingAdmissionNumberComand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sospoly:reserved-missing-admission';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $bar = $this->output->createProgressBar(count(Admission::all()));

        $bar->setBarWidth(100);

        $bar->start();
        $admission_no = '195491067';
        foreach (Admission::all() as $admission) {
            if($admission == $admission_no){
                $admission_no = null;
            }
            $bar->advance();
        }
        if($admission_no){
            // ReservedDepartmentSessionAdmission::firstOrCreate([
            //     'session_id' => currentSession()->id,
            //     'department_id' => 1,
            //     'programme_id' => 1,
            //     'schedule_id' => 1,
            //     'admission_no' => '195491067',
            // ]);
        }
        $bar->finish();
        Programme::find(1)->programmeSchedules()->firstOrCreate(['schedule_id'=>1]);
    }
}
