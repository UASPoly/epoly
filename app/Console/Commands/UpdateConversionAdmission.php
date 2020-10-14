<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Modules\Student\Entities\Programme;

class UpdateConversionAdmission extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'uaspoly:update-conversion-admission';

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
        $programme = Programme::find(3);
        $bar = $this->output->createProgressBar(count($programme->admissions));

        $bar->setBarWidth(100);

        $bar->start();
        $count = 199;
        foreach ($programme->admissions as $admission) {
            
            $oldAdmissionNo = $admission->admission_no;

            $begin = substr($oldAdmissionNo, 0,2);
            $other = substr($oldAdmissionNo, 2,3);
            $code = substr($oldAdmissionNo, 4,1);
            $end = substr($oldAdmissionNo, 6,3);
            if($begin < 19){
                $begin = 19;
            }
            if($code < 2){
                $code = 2;
            }
            $newBegin = $begin-1;
            $newCode = $code-1;

            $newAdmissionNo = $newBegin.$other.$newCode.$count;
            $admission->update(['admission_no'=>$newAdmissionNo]);
            $count ++;
            $bar->advance();
        }

        foreach (Programme::find(1)->departmentSessionAdmissions->where('schedule_id',1) as $sessionAdmission) {
            $sessionAdmission->update(['count'=>203]);
        }
        
        $bar->finish();
    }
}
