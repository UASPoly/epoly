<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Modules\Student\Entities\Student;

class UpdateStudentEmailCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sospoly:update-student-email';

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
        $bar = $this->output->createProgressBar(count(Student::all()));

        $bar->setBarWidth(100);

        $bar->start();
        foreach (Student::all() as $student) {
            $student->update(['email'=>$student->admission->admission_no.'@uaspoly.edu.ng']);
            $bar->advance();
        }
        $bar->finish();
    }
}
