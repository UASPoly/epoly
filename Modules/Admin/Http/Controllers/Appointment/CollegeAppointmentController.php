<?php

namespace Modules\Admin\Http\Controllers\Appointment;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Staff\Entities\Staff;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class CollegeAppointmentController extends AdminBaseController
{
    public function createCollegeDirecter($staff_id)
    {
        $staff = Staff::find($staff_id);
        session()->flash('error',['Please note that','This staff of Biodata in the form bellow is going to be appointed as the Directer '.$staff->department->college->name.' College','And after this registration the existed College Directer is going to be revoke from been the College Directer','Further more if this staff is a head of department his access to his HOD Accout are going to be revoke','As such all of his previllages access to his College Directer Account are going to be restricted','If you aggree insert the appointment date and click Confirm Appointment Or Click Back']);
        
        return view('admin::college.appointment.college_directer',['staff'=>$staff]);
    }

    public function registerCollegeDirecter(Request $request)
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
        if($staff->directer && $staff->directer->is_active == 1){
            $errors[] = "Sorry this staff is already a head of the department you eather detele his appointment or appoint another staff";
        }
        if(empty($errors)){
            //revoke the previouse HOD previllages of the department activities
            if($staff->department->college->directers->last()){
                $current_directer = $staff->department->college->directers->last();
                $current_directer->is_active = 0;
                $current_directer->to=$request->appointment_date;
                $current_directer->save();
            }
            //check if the staff is currently Hod and revoke the access
            if($staff->registerHeadOfDepartment && $staff->registerHeadOfDepartment->is_active == 1){
                $hod_account = $staff->registerHeadOfDepartment;
                $hod_account->is_active = 0;
                $hod_account->to=$request->appointment_date;
                $hod_account->save();
            }
            //create new head of the department
            $staff->department->college->directers()->create([
                'email'=>$staff->email,
                'password'=>$staff->password,
                'admin_id'=>admin()->id,
                'college_id' => $staff->department->college->id,
                'staff_id' => $staff->id,
                'from'=> $request->appointment_date
            ]);
            //set success message
            session()->flash('message','Congratulation the College Directer appointment is registered successfully and all previllages of the '.$staff->department->college->name.' are revoked from the former College Directer and now '.$staff->first_name.' '.$staff->last_name.' has access to them');
            return redirect()->route('admin.college.department.staff.show',[$staff->id]);
        }else{
            session()->flash('custom_errors',$errors);
        }
        return back()->withInput($request->all());
        
    }
}
