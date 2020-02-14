<?php

namespace Modules\Student\Http\Controllers\Course;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Department\Entities\Course;
use Modules\Department\Entities\Level;
use Modules\Admin\Entities\Session;
use Modules\Core\Http\Controllers\Student\StudentBaseController;

class CourseRegistrationController extends StudentBaseController
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function availableCourses()
    {
    
        return view('student::course.registration.create',['courses'=>student()->currentLevelCourses()]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('student::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function registerCourses(Request $request)
    {
        $request->validate(['course'=>'required']);

        $courses = array_merge($request->course,$request->add ?? []);
        $dropCourses = $this->getCurrentSessionDropCourses($request->course);
        $session_registration = student()->sessionRegistrations()->firstOrCreate([
            'programme_level_id'=>student()->level()->id,
            'session_id'=> currentSession()->id,
            'department_id'=> student()->admission->department->id
        ]);
        foreach ($courses as $course_id) {
            $course = Course::find($course_id);
            $semester_registration = $session_registration
            ->semesterRegistrations()
            ->firstOrCreate(['semester_id'=>$course->semester->id]);
            $course_registration = $semester_registration->courseRegistrations()->firstOrCreate([
                'course_id' => $course_id,
                'session_id' => currentSession()->id,
                'admission_id' => student()->admission->id
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
        if(!empty($dropCourses)){
            foreach ($dropCourses as $course_id) {
                student()->dropCourses()->firstOrCreate([
                    'session_id'=>currentSession()->id,
                    'course_id'=>$course_id,
                    'status'=>1,
                ]);
            }
        }
        session()->flash('message', 'Congratulation all courses has been registered success fully');
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
    
    public function getThisStudentCurrentCourseRegistration($course_id)
    {
        $courseRegistrations = [];
        foreach (student()->sessionRegistrations->where('session_id',currentSession()->id) as $sessionRegistration) {
            foreach ($sessionRegistration->semesterRegistration as $semesterRegistration) {
                foreach ($sessionRegistration->courseRegistrations as $courseRegistration) {
                    $courseRegistrations[] = $courseRegistration;
                }
            }
        }
        return $courseRegistrations;
    }
    public function getCurrentSessionDropCourses($courses)
    {
        $availableCourses = [];
        $dropCourses = [];
        foreach (student()->level()->courses as $course) {
            if(!in_array($course->id, $courses)){
                $dropCourses[] = $course->id;
            }
        }

    }
    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('student::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function showCourses()
    {

        return view('student::course.registration.show',['courses'=>student()->currentRegisteredCourses()]);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function results()
    {
        return view('student::course.result.result');
    }

    public function registeredCourses()
    {
        return view('student::course.result.courses');
    }
}
