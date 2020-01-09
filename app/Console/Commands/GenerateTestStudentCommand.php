<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Modules\Department\Entities\Admission;
use Modules\Department\Entities\Department;

class GenerateTestStudentCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sospoly:computer-generate-students';

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
        $this->department = Department::find(1);
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $bar = $this->output->createProgressBar(100);

        $bar->setBarWidth(100);

        $bar->start();

        $this->generateMorningNdStudent($bar);

        $this->generateEveningNdStudent($bar);

        $this->generateMorningHndStudent($bar);

        $this->generateEveningHndStudent($bar);

        $bar->finish();
    }

    public function generateEveningNdStudent($bar)
    {
        for ($j=1; $j <= 25 ; $j++) { 
            //generate evening student
            $number = $this->department->generateNewAdmission(['session'=>0,'type'=>1,'serial_no'=>$j]);
            $bar->advance();
        }
    }

    public function generateMorningNdStudent($bar)
    {
        $serial = [];
        for ($i=1; $i <= 25 ; $i++) { 
            //generate morning student
            $number = $this->department->generateNewAdmission(['session'=>9,'type'=>1,'serial_no'=>$i]);
            $bar->advance();
        }
    }

    public function generateEveningHndStudent($bar)
    {
        for ($j=1; $j <= 25 ; $j++) { 
            //generate evening student
            $number = $this->department->generateNewAdmission(['session'=>0,'type'=>3,'serial_no'=>$j]);
            $bar->advance();
        }
    }

    public function generateMorningHndStudent($bar)
    {
        for ($i=1; $i <= 25 ; $i++) { 
            //generate morning student
            $this->department->generateNewAdmission(['session'=>9,'type'=>3,'serial_no'=>$i]);
            $bar->advance();
        }
    }
}
