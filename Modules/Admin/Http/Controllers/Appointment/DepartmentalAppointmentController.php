<?php

namespace Modules\Admin\Http\Controllers\Appointment;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Staff\Entities\Staff;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class DepartmentalAppointmentController extends AdminBaseController
{  

    public function createHeadOfDepartment($staff_id)
    {
        $staff = Staff::find($staff_id);
        session()->flash('error',['Please note that','This staff of Biodata in the form bellow is going to be appointed as the Head of '.$staff->department->name.' Department','And after this registration the existed head of department is going to be revoke from been the head of the department','As such all of his previllages access to his HOD Account are going to be restricted','If you aggree insert the appointment date and click Confirm Appointment Or Click Back']);
        return view('admin::college.appointment.head_of_department',['staff'=>$staff]);
    }

    public function registerHeadOfDepartment(Request $request)
    {
        $errors = [];
        $request->validate([
            'appointment_date'=>'required'
        ]);
        $staff = Staff::find($request->staff_id);
        //check if the appointment date is valid base on employed date
        if(strtotime($request->appointment_date) - strtotime($staff->employed_at) < 63113904){
            $errors[] = 'Sorry this staff is too early to be appointed as Head Of Department please adjust appointment date';
        }
        if(strtotime($request->appointment_date) > time()){
            $errors[] = "Sorry you can't use feature date";
        }
        if($staff->headOfDepartment && $staff->headOfDepartment->is_active == 1){
            $errors[] = "Sorry this staff is already a head of the department you eather detele his appointment or appoint another staff";
        }
        if(empty($errors)){
            //revoke the previouse HOD previllages of the department activities
            if($staff->department->headOfDepartments->last()){
                $current_hod = $staff->department->headOfDepartments->last();
                $current_hod->is_active = 0;
                $current_hod->to=$request->appointment_date;
                $current_hod->save();
            }
            //create new head of the department
            $staff->department->headOfDepartments()->create([
                'email'=>$staff->email,
                'password'=>$staff->password,
                'admin_id'=>admin()->id,
                'department_id' => $staff->department->id,
                'staff_id' => $staff->id,
                'from'=> $request->appointment_date
            ]);
            //set success message
            session()->flash('message','Congratulation the Head of Department appointment is registered successfully and all previllages of the '.$staff->department->name.' are revoked from the former head of the department and now '.$staff->first_name.' '.$staff->last_name.' has access to them');
            return redirect()->route('admin.college.department.staff.show',[$staff->id]);
        }else{
            session()->flash('custom_errors',$errors);
        }
        return back()->withInput($request->all());
    }
}
