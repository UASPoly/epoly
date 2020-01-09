<?php

namespace Modules\Lecturer\Jobs\Result;

use Illuminate\Bus\Queueable;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Queue\SerializesModels;
use Modules\Department\Entities\Course;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Modules\Lecturer\Exports\ResultTemplete;

class DownloadResultSheetJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $course;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Course $course)
    {
         $this->course = $course;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $datas = [];
        $headers = [
            'S/N',
            'NAME',
            'ADMISSION NO',
            'REGISTRATION KEY',
            'CA SCORE',
            'EXAM SCORE'
        ];
        $datas[] = [
            'S/N',
            'NAME',
            'ADMISSION NO',
            'REGISTRATION KEY',
            'CA SCORE',
            'EXAM SCORE'
        ];
        foreach ($this->course->sessionCourseRegistrations as $course_registration) {
            $counter = 0;
            //lets compare student department and lecturer allocated department
            if($course_registration->course->department->id == $this->course->department->id){
                $datas[] = [
                    'serial_no' => $counter++,
                    'name'=>$course_registration->sessionRegistration->student->first_name.' '.$course_registration->sessionRegistration->student->last_name,
                    'admission_no' => $course_registration->sessionRegistration->student->admission->admission_no,
                    'registration_id' => $course_registration->id,
                    'contenue_accessment'=> '--',
                    'examination'=> '--',
                ];
            }
        }
        return Excel::download(new ResultTemplete($datas), $this->course->code.'_Result_Sheet_Templete.xlsx','Xlsx',$headers);
    }
}


