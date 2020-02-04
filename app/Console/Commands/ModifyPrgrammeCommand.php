<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Modules\Student\Entities\Programme;

class ModifyPrgrammeCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sospoly:modify-programme';

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
        $bar = $this->output->createProgressBar(count(Programme::all()));

        $bar->setBarWidth(100);

        $bar->start();
        foreach (Programme::all() as $programme) {
            foreach (['I','II'] as $level) {
                $programme->programmeLevels()->firstOrcreate(['name'=> $programme->title.' '.$level]);
            }
            $bar->advance();
        }
        $bar->finish();
    }
}
