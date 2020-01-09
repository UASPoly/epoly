<?php

namespace Modules\Student\Http\Controllers\Course;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Admin\Entities\Session;
use Modules\Department\Entities\Course;
use Modules\Student\Entities\SessionRegistration;
use Modules\Core\Http\Controllers\Student\StudentBaseController;

class AddAndDropCourseController extends StudentBaseController
{
    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function register(Request $request)
    {
        //register all the add courses
        foreach ($request->add ?? [] as $course_id) {
            $course = Course::find($course_id);
            $semester_registration = $this->getStudentCurrentSessionRegistration()
            ->semesterRegistrations()
            ->firstOrCreate(['semester_id'=>$course->semester->id]);
            $course_registration = $semester_registration->courseRegistrations()->firstOrCreate([
                'course_id'=>$course_id,
                'session_id'=> currentSession()->id,
            ]);
            $course_registration->result()->firstOrCreate([]);

            //check if the added course is from the carry over courses
            $carryOver = $this->getThisCourseFromStudentCarryOverCourses($course_id);
            if($carryOver){
                $carryOver->update(['status'=>0]);
            }
            //check if the added course is from the drop courses
            $dropCourse = $this->getThisCourseFromStudentDropCourses($course_id);
            if($dropCourse){
                $dropCourse->update(['status'=>0]);
            }
            //check if the added course is from the reregister courses
            $reRegisterCourse = $this->getThisCourseFromStudentReRegisterCourses($course_id);
            if($reRegisterCourse){
                $reRegisterCourse->update(['status'=>0]);
            }
        }
        
        //drop all the drop courses and delete them from the

        foreach ($this->getThisStudentCurrentCourseRegistration() as $courseRegistration) {
            if(!in_array($courseRegistration->course->id, $request->remove ?? [])){
                //add course to the dropped courses
                student()->dropCourses()->firstOrCreate(['session_id'=>currentSession()->id,'course_id'=>$courseRegistration->course_id,'status'=>1]);
                //delete course registration result templete
                $courseRegistration->result->delete();
                //delete the course registrations
                $courseRegistration->update('drop_status',1);
            }
        }

        session()->flash('message', 'Congratulation all courses has been added and dropped success fully');
        return redirect()->route('student.course.registration.courses.register.show');
    }

    public function getThisCourseFromStudentDropCourses($course_id)
    {
        $dropCourse = null;
        foreach(student()->dropCourses->where('course_id',$course_id) as $dropCourse){
            $dropCourse = $dropCourse;
        }
        return $dropCourse;
    }

    public function getThisCourseFromStudentReRegisterCourses($course_id)
    {
        $reRegisterCourse = null;
        foreach(student()->reRegisterCourses->where('course_id',$course_id) as $reRegisterCourse){
            $reRegisterCourse = $reRegisterCourse;
        }
        return $reRegisterCourse;
    }

    public function getThisCourseFromStudentCarryOverCourses($course_id)
    {
        $carryOverCourse = null;
        foreach(student()->repeatCourses->where('course_id',$course_id) as $carryOverCourse){
            $carryOverCourse = $carryOverCourse;
        }
        return $carryOverCourse;
    }
    public function getStudentCurrentSessionRegistration()
    {
        $registration = null;
        foreach (SessionRegistration::where(['session_id'=>currentSession()->id,'student_id'=>student()->id])->get() as $sessionRegistration) {
            $registration = $sessionRegistration;
        }
        return $registration;
    }
    public function getThisStudentCurrentCourseRegistration()
    {
        $courseRegistrations = [];
        foreach (student()->sessionRegistrations->where('session_id',currentSession()->id) as $sessionRegistration) {
            foreach ($sessionRegistration->semesterRegistrations as $semesterRegistration) {
                foreach ($semesterRegistration->courseRegistrations as $courseRegistration) {
                    $courseRegistrations[] = $courseRegistration;
                }
            }
        }
        return $courseRegistrations;
    }
    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */

    public function showRegisredAndCarryOverCourses()
    {
        return view('student::course.registration.add_or_drop_course',['registrations'=>student()->sessionRegistrations->where('session_id',currentSession()->id)]);
    }
}
