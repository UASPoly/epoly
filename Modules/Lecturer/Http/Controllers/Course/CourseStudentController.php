<?php

namespace Modules\Lecturer\Http\Controllers\Course;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Student\Entities\Student;
use Modules\Department\Entities\Course;
use Modules\Core\Http\Controllers\Lecturer\LecturerBaseController;

class CourseStudentController extends LecturerBaseController
{
    public $students;

    public function index()
    {
        return view('lecturer::course.student.index');
    }
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function availableStudents()
    {
        return view('lecturer::course.student.available_student',['students'=>session('students')]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function registeredStudents()
    {
        return view('lecturer::course.student.registered_student',['student_courses'=>session('students')]);
    }

    public function search(Request $request)
    {
        $request->validate([
            'session'=>'required',
            'specification'=>'required',
            'course'=>'required'
        ]);
        $course = Course::find($request->course);
        $students = [];
        switch ($request->specification) {
            case '1':
                //get all the available students for this course
                foreach (Student::all() as $student) {
                    if($student->level()->name == $course->level->name){
                        $students[] = $student;
                    }
                }
                session(['students'=>$students]);
                $route = "lecturer.courses.students.available";
                $message = count($students).' Available Student Found for '.$course->code.' in '.currentSession()->name.' Session';
                break;
            
            default:
                //get all the registered students for this course
                foreach ($course->courseRegistrations->where('session_id',currentSession()->id) as $course_registration) {
                    $students[] = $course_registration;
                }
                
                $route = "lecturer.courses.students.registered";
                session(['students'=>$students]);
                $message = count($students).' Registered Student Found for '.$course->code.' in '.currentSession()->name.' Session';
                break;
        }
        session()->flash('message', $message);
        return redirect()->route($route);
    }
}
