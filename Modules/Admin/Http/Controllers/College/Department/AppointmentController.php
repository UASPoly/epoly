<?php

namespace Modules\Admin\Http\Controllers\College\Department;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Staff\Entities\Staff;
use Modules\Lecturer\Entities\Lecturer;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class AppointmentController extends AdminBaseController
{  

    public function createHeadOfDepartment($lecturerId)
    {

        $lecturer = Lecturer::find($lecturerId);

        session()->flash('error',['Please note that','This staff of Biodata in the form bellow is going to be appointed as the Head of '.$lecturer->staff->department->name.' Department','And after this registration the existed head of department is going to be revoke from been the head of the department','As such all of his previllages access to his HOD Account are going to be restricted','If you aggree insert the appointment date and click Confirm Appointment Or Click Back']);
        return view('admin::college.department.management.appointment.hod.create',['lecturer'=>$lecturer]);
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
            return redirect()->route('admin.college.department.management.hod.index',[$staff->department->id]);
        }else{
            session()->flash('custom_errors',$errors);
        }
        return back();
    }


    public function editHeadOfDepartment($lecturerId)
    {
        return view('admin::college.department.management.appointment.hod.edit',['lecturer'=>Lecturer::find($lecturerId)]);
    }
    
    public function updateHeadOfDepartment(Request $request,$lecturerId)
    {

        $lecturer = Lecturer::find($lecturerId);
        $lecturer->staff->headOfDepartment->update(['email'=>$request->email,'from'=>$request->appointment_date]);
        return redirect()->route('admin.college.department.management.hod.index',[$lecturer->staff->department->id])->with('success','Head of Department Appointment updated successfully');
    }

    public function revokeHeadOfDepartment($lecturerId)
    {
        $lecturer = Lecturer::find($lecturerId);
        $lecturer->staff->headOfDepartment->update(['is_active'=>0,'to'=>date('M/D/Y',time())]);
        return redirect()->route('admin.college.department.management.hod.index',[$lecturer->staff->department->id])->with('success','Head of Department Appointment has been revoked successfully');
    }

    public function deleteHeadOfDepartment($lecturerId)
    {
        $lecturer = Lecturer::find($lecturerId);
        $lecturer->staff->headOfDepartment->delete();
        return redirect()->route('admin.college.department.management.hod.index',[$lecturer->staff->department->id])->with('success','Head of Department Appointment has been deleted successfully');
    }
}
