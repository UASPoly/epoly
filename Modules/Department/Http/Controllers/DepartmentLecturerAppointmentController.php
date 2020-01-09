<?php

namespace Modules\Department\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Lecturer\Entities\Lecturer;
use Modules\Core\Http\Controllers\Department\HodBaseController;

class DepartmentLecturerAppointmentController extends HodBaseController
{
    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function register(Request $request)
    {
        $staff = Lecturer::find($request->lecturer_id)->staff;
        $request->validate(['appointment'=>'required']);
        headOfDepartment()->department->examOfficers()->create(
            [
                'email'=>$staff->email,
                'password'=>$staff->password,
                'head_of_department_id'=>headOfDepartment()->id,
                'from'=> $request->appointment_date,
                'lecturer_id'=>$request->lecturer_id
            ]);
        session()->flash('message','The appointment is registered successfully');
        return redirect()->route('department.exam.officer.index');
    }
}
