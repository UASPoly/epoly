<?php

namespace Modules\Admin\Http\Controllers\College\Department\Staff;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Staff\Entities\Staff;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Modules\Staff\Entities\StaffType;
use Modules\College\Entities\College;
use Modules\Department\Entities\Department;
use Modules\Staff\Http\Requests\NewStaffFormRequest;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;
use Modules\Admin\Services\Staff\SearchStaff as Searchable;
class StaffController extends AdminBaseController
{
    use Searchable;
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('admin::college.department.staff.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('admin::college.department.staff.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function register(NewStaffFormRequest $request)
    {
        $data = $request->all();
        $staff = admin()->staffs()->create([
           'first_name'=>$data['first_name'],
           'last_name'=>$data['last_name'],
           'phone'=>$data['phone'],
           'email'=>$data['email'],
           'staffID'=>$data['staffID'],
           'password'=>Hash::make($data['staffID']),
           'department_id' => $data['department'],
           'staff_category_id' => $data['category'],
           'employed_at' => $data['employed_at']
        ]);

        $staff->profile()->create([
            'gender_id' => $data['gender'],
            'religion_id' => $data['religion'],
            'tribe_id' => $data['tribe'],
            'address' => $data['address'],
            'date_of_birth' => $data['date_of_birth'],
            'biography' => 'staff biography',
        ]);

        session()->flash('message','Congratulation you have successfully completed first step of the staff registration please specify the type of staff to complete this registration');
        return redirect()->route('admin.college.department.staff.register.complete',[$staff->id]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($staff_id)
    {
        $staff = Staff::find($staff_id);
        if($staff->staffType){
            return view('admin::college.department.staff.edit',['staff'=>$staff]);
        }
        session()->flash('message','Sorry you cant edit or View this staff informations because his registration is on process please complete it here');
        return redirect()->route('admin.college.department.staff.register.complete',$staff->id);
    }
    public function registerComplete($staff_id)
    {
        return view('admin::college.department.staff.complete_registration',['staff'=>Staff::find($staff_id)]);
    }
    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(NewStaffFormRequest $request, $staff_id)
    {
        $staff = Staff::find($staff_id);
        $data = $request->all();
        $staff->update([
            'first_name'=>$data['first_name'],
            'last_name'=>$data['last_name'],
            'phone'=>$data['phone'],
            'email'=>$data['email'],
            'staffID'=>$data['staffID'],
            'password'=>Hash::make($data['staffID']),
            'department_id' => $data['department'],
            'staff_category_id' => $data['staff_category'],
            'staff_type_id' => $data['staff_type']
        ]);

        $staff->profile()->update([
            'gender_id' => $data['gender'],
            'religion_id' => $data['religion'],
            'tribe_id' => $data['tribe'],
            'address' => $data['address'],
            'biography' => 'staff biography',
        ]);

        session()->flash('message','Congratulation the staff information is updated successfully');
        return redirect()->route('admin.college.department.staff.show',[$staff->id]);

    }
    public function registerUpdate(Request $request, $staff_id)
    {
        $request->validate(['staff_type'=>'required']);
        $staff = Staff::find($staff_id);
        $staff->update(['staff_type_id'=>$request->staff_type]);
        if($staff->staffType->name == 'Lecturer'){
            $staff->lecturer()->firstOrCreate([
                'email'=>$staff->email,
                'password'=>$staff->password,
                'admin_id'=>admin()->id,
                'from' =>$staff->employed_at
            ]);
        }
        session()->flash('message','Congratulation the staff registration is comlpleted successfully the staff can login and update his documents and other information using '.$staff->email.' as email and '.$staff->staffID.' as password ');
        return redirect()->route('admin.college.department.staff.show',[$staff->id]);

    }
    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function delete($staff_id)
    {
        $errors = [];
        $staff = Staff::find($staff_id);
        if($staff->lecturer){
            $errors[] = 'Action denied because staff is lecturer you have to delete his lecturer record';
        }
        if($staff->directer){
            $errors[] = 'Action denied because staff is directer you have to delete his directer record';
        }
        if(empty($errors)){
            $staffs = [];
            foreach (session('staffs') as $staff_found) {
                if($staff_found->id != $staff->id){
                    $staffs[] = $staff_found;
                }
            }
            session(['staffs'=>$staffs]);
            $staff->profile->delete();
            $staff->delete();
            session()->flash('message','Congratulation staff is deleted successfully');
        }else{
            session()->flash('error',$errors);
        }
        return back();
    }

    public function show($staff_id)
    {
        $staff = Staff::find($staff_id);
        if($staff->staffType){
            return view('admin::college.department.staff.show',['staff'=>$staff]);
        }
        session()->flash('message','Sorry you cant edit or View this staff informations because his registration is on process please complete it here');
        return redirect()->route('admin.college.department.staff.register.complete',$staff->id);
    }

    public function search(Request $request)
    {
        $this->searchAvailableStaffs($request->all());
        return redirect()->route('admin.college.department.staff.staff');
    }

    public function staff()
    {
        if(!session('staffs')){
            session(['staff'=>[]]);
        }
        return view('admin::college.department.staff.staff');   
    }
    
}
