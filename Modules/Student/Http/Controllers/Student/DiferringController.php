<?php

namespace Modules\Student\Http\Controllers\Student;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Department\Entities\Semester;
use Modules\Core\Http\Controllers\Student\StudentBaseController;

class DiferringController extends StudentBaseController
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('student::diferring.index',['semesters'=>$this->getValidSemesters(),'sessions'=>$this->getValidSessions()]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function apply(Request $request)
    {
        $request->validate(['session'=>'required']);
        $requestOf = 'Semester';
        if($request->semester){
            student()->diferredSemesters()->firstOrCreate([
                'session_id' =>$request->session,
                'semester_id' =>$request->semester,
                'diferring_status_id' =>1,
                'department_id' =>student()->admission->department->id
            ]);
        }else{
            $requestOf = 'Session';
            student()->diferredSessions()->firstOrCreate([
                'session_id' =>$request->session,
                'diferring_status_id' =>1,
                'department_id' =>student()->admission->department->id
            ]);
        }
        session()->flash('message','Congratulation your '.$requestOf.' diferring application is successful at your end please check your dashboard for the approval from your head of department and the implementaion from your exam officer');
        return back();
    }

    public function getValidSessions()
    {
        $session = [];
        if(!student()->diferredSessions->where('session_id',currentSession()->id)){
            $session[] = currentSession();
        }
        return $session;
    }

    public function getDiferredSemesters()
    {
        $semesters = [];
        foreach(student()->diferredSemesters->where('session_id',currentSession()->id) as $diferredSemester){
            $semesters[] = $diferredSemester->semester;
        }
        return $semesters;
    }

    public function getValidSemesters()
    {
        if(empty($this->getValidSessions())){
            return [];
        }
        if(empty($this->getDiferredSemesters())){
            return Semester::all();
        }else{
            $diferredSemesterId = [];
            $validSemesters = [];
            foreach ($this->getDiferredSemesters as $diferredSemester) {
                $diferredSemesterId[] = $diferredSemester->id;
            }
            foreach (Semester::all() as $semester) {
                if(!in_array($semester->id, $diferredSemesterId)){
                    $validSemesters[] = $semester;
                }
            }
            return $validSemesters;
        }
    }
}
