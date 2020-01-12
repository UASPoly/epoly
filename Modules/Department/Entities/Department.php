<?php

namespace Modules\Department\Entities;

use Modules\Core\Entities\BaseModel;
use Modules\Admin\Entities\Session;
use Modules\Staff\Entities\Lga;
use Modules\Staff\Entities\State;
use Modules\Staff\Entities\Gender;
use Modules\Staff\Entities\Religion;
use Modules\Department\Entities\Level;
use Modules\Department\Entities\Semester;
use Modules\Student\Entities\Programme;
use Modules\Student\Entities\Schedule;
use Modules\Department\Services\Graduation\HasGraduatedStudent;
use Modules\Admission\Services\Traits\AdmissionNumberGenerator;
use Modules\Department\Services\Admission\CanAdmittStudent as Admittable;
class Department extends BaseModel
{
    use AdmissionNumberGenerator, HasGraduatedStudent, Admittable;

    public function college()
    {
    	return $this->belongsTo('Modules\College\Entities\College');
    }

    public function departmentProgrammes()
    {
        return $this->hasMany(DepartmentProgramme::class);
    }

    public function departmentalAppointments()
    {
        return $this->hasMany(DepartmentalAppointment::class);
    }

    public function staffPositions()
    {
    	return $this->hasMany('Modules\Staff\Entities\StaffPosition');
    }

    public function examOfficers()
    {
        return $this->hasMany('Modules\ExamOfficer\Entities\ExamOfficer');
    }

    public function courses()
    {
        return $this->hasMAny(Course::class);
    }
    
    public function staffs()
    {
    	return $this->hasMany('Modules\Staff\Entities\Staff');
    }
    
    public function headOfDepartments($value='')
    {
        return $this->hasMany(HeadOfDepartment::class);
    }

    public function departmentCourses()
    {
        return $this->hasMany(DepartmentCourse::class);
    }
    
    public function departmentSessionAdmissions()
    {
        return $this->hasMany(DepartmentSessionAdmission::class);
    }

    public function reservedDepartmentSessionAdmissions()
    {
        return $this->hasMany(ReservedDepartmentSessionAdmission::class);
    }

    public function lecturerCourseAllocations()
    {
        return $this->hasMany(LecturerCourseAllocation::class);
    }
 
    public function diferredSessions()
    {
        return $this->hasMany('Modules\Student\Entities\DiferredSession');
    }

    public function admissions()
    {
        return $this->hasMany('Modules\Department\Entities\Admission');
    }

    public function diferredSemesters()
    {
        return $this->hasMany('Modules\Student\Entities\DiferredSemester');
    }

    public function unverifiedResults()
    {
        $results = [];
        foreach ($this->departmentCourses as $department_course) {
            if($department_course->course->currentCourseLecturer() && $department_course->course->currentCourseLecturer()->lecturerCourseResultUploads){
                foreach($department_course->course->currentCourseLecturer()->lecturerCourseResultUploads->where('session_id',currentSession()->id) as $result){
                    if($result->verification_status == 0){
                        $results[] = $result;
                    }
                }
            }
        }
        return $results;
    }
    public function sessions()
    {
        return Session::all();
    }
    public function availableGraduationSessions()
    {
        $session = [];
        foreach($this->sessions() as $session){
            if(substr(currentSession()->name, 5) - substr($session->name, 5) <= 2){
                $sessions[] = $session;
            }
        }
        return $sessions;
    }
    public function levels()
    {
        return Level::all();
    }

    public function religions()
    {
        return Religion::all();
    }

    public function genders()
    {
        return Gender::all();
    }

    public function semesters()
    {
        return Semester::all();
    }

    public function programmes()
    {
        return Programme::all();
    }

    public function schedules()
    {
        return Schedule::all();
    }

    public function states()
    {
        return State::all();
    }

    public function lgas()
    {
        return Lga::all();
    }

}
