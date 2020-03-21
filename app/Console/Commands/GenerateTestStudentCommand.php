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
        $bar = $this->output->createProgressBar(1500);

        $bar->setBarWidth(100);

        $bar->start();

        $this->generateMorningNdStudent($bar);
        $this->generateEveningNdStudent($bar);
        $this->generateMorningHndStudent($bar);
        $this->generateEveningHndStudent($bar);
        $this->generateMorningConversionStudent($bar);
        $this->generateEveningConversionStudent($bar);

        $bar->finish();
    }
    public function getStudentData($admissionNo,$programmeId)
    {
        return [
            "programmeId" => $programmeId,
            "first_name" => "isah",
            "middle_name" => null,
            "last_name" => "labbo",
            "gender" => "1",
            "religion" => "1",
            "phone" => "08162463013",
            "date_of_birth" => "2019-12-12",
            "state" => "18",
            "lga" => "322",
            "admission_no" => $admissionNo,
            "address" => "gdhddh"
        ];
    }
    public function generateEveningNdStudent($bar)
    {
        for ($j=1; $j <= 250 ; $j++) { 
            //generate evening student
            $admissionNo = $this->department->generateAdmissionNo(['programme'=>1,'schedule'=>2]);
            $this->department->generateNewAdmission($this->getStudentData($admissionNo,1));
            $bar->advance();
        }
    }

    public function generateMorningNdStudent($bar)
    {
        $serial = [];
        for ($i=1; $i <= 250 ; $i++) { 
            //generate morning student
            $admissionNo = $this->department->generateAdmissionNo(['programme'=>1,'schedule'=>1]);
            $this->department->generateNewAdmission($this->getStudentData($admissionNo,1));
            $bar->advance();
        }
    }

    public function generateEveningHndStudent($bar)
    {
        for ($j=1; $j <= 250 ; $j++) { 
            //generate evening student
            $admissionNo = $this->department->generateAdmissionNo(['programme'=>2,'schedule'=>2]);
            $this->department->generateNewAdmission($this->getStudentData($admissionNo,2));
            $bar->advance();
        }
    }

    public function generateMorningHndStudent($bar)
    {
        for ($i=1; $i <= 250 ; $i++) { 
            //generate morning student
            $admissionNo = $this->department->generateAdmissionNo(['programme'=>2,'schedule'=>1]);
            $this->department->generateNewAdmission($this->getStudentData($admissionNo,2));
            $bar->advance();
        }
    }

    public function generateMorningConversionStudent($bar)
    {
        for ($i=1; $i <= 250 ; $i++) { 
            //generate morning student
            $admissionNo = $this->department->generateAdmissionNo(['programme'=>3,'schedule'=>1]);
            $this->department->generateNewAdmission($this->getStudentData($admissionNo,3));
            $bar->advance();
        }
    }

    public function generateEveningConversionStudent($bar)
    {
        for ($i=1; $i <= 250 ; $i++) { 
            //generate morning student
            $admissionNo = $this->department->generateAdmissionNo(['programme'=>3,'schedule'=>2]);
            $this->department->generateNewAdmission($this->getStudentData($admissionNo,3));
            $bar->advance();
        }
    }
}
