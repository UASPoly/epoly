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
use Modules\Department\Services\HasProgramme;
use Modules\Department\Services\Graduation\HasGraduatedStudent;
use Modules\Admission\Services\Traits\AdmissionNumberGenerator;
use Modules\Department\Services\Admission\CanAdmittStudent as Admittable;
class Department extends BaseModel
{
    use AdmissionNumberGenerator, HasGraduatedStudent, Admittable, HasProgramme;

    public function college()
    {
    	return $this->belongsTo('Modules\College\Entities\College');
    }

    public function programmes()
    {
        return $this->hasMany('Modules\Student\Entities\Programme');
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
    
    public function hasThisProgramme(Programme $programme)
    {
        $flag = false;
        foreach ($this->departmentProgrammes as $departmentProgramme) {
            if($departmentProgramme->programme_id == $programme->id){
                $flag = true;
            }
        }
        return $flag;
    }

    public function lecturers()
    {
        $lecturers = [];
        foreach($this->staffs as $staff){
            if($staff->lecturer){
                $lecturers[] = $staff->lecturer;
            }
        }
        return $lecturers;
    }

    public function unverifiedResults()
    {
        $results = [];
        foreach ($this->courses as $course) {
            if($course->courseLecturer() && $course->courseLecturer()->lecturerCourseResultUploads){
                foreach($course->courseLecturer()->lecturerCourseResultUploads->where('session_id',currentSession()->id) as $result){
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

    public function programmeLevels()
    {
        $levels = [];
        foreach ($this->programmes as $programme) {
            foreach ($programme->programmeLevels as $programmeLevel) {
                $levels[] = $programmeLevel;
            }
        }
        return $levels;
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
