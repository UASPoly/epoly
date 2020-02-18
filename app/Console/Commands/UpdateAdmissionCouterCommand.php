<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Modules\Department\Entities\DepartmentSessionAdmission;

class UpdateAdmissionCouterCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'uaspoly:update-admission-counter';

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
        foreach (DepartmentSessionAdmission::where([
            'department_id'=>1,
            'session_id' => 3,
            'schedule_id' => 1,
            'programme_id' => 1
        ])->get() as $admission) {
            $admission->update(['count'=>$admission->count += 1]);
        }
    }
}
