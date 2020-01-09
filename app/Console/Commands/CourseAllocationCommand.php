<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Modules\Lecturer\Entities\Lecturer;
use Modules\Department\Entities\Course;

class CourseAllocationCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sospoly:make-course-allocation';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command will make the course allocation of avaialable courses to available lecturers';

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
        $bar = $this->output->createProgressBar(10);

        $bar->setBarWidth(100);

        $bar->start();
        foreach (Lecturer::all() as $lecturer) {
            $courses = $this->getCoursesToAllocate($lecturer);
            foreach ($courses as $course) {
                $course->lecturerCourses()->firstOrCreate([
                    'lecturer_course_status_id'=>1,
                    'lecturer_id'=>$lecturer->id,
                    'department_id'=> $lecturer->staff->department->id,
                    'from' => '2019-10-03'
                ]);
                $course->lecturerCourses()->firstOrCreate([
                    'lecturer_course_status_id'=>2,
                    'lecturer_id'=>$lecturer->id,
                    'department_id'=> $lecturer->staff->department->id,
                    'from' => '2019-10-03'
                ]);
            }
            $bar->advance();
        }
        $bar->finish();
    }

    public function getCoursesToAllocate(Lecturer $lecturer)
    {
        $courses = [];
        foreach (Course::all() as $course) {
            if(substr($course->code, 5) == $lecturer->id){
                $courses[] = $course;
            }
        }
        return $courses;
    }
}
