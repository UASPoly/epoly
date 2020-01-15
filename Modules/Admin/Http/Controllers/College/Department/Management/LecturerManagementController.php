<?php

namespace Modules\Admin\Http\Controllers\College\Department\Management;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Modules\Lecturer\Entities\Lecturer;
use Modules\Department\Entities\Department;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;
use Modules\Admin\Http\Requests\College\Department\Management\LecturerFormRequest;
use Modules\Admin\Http\Requests\College\Department\Management\UpdateLecturerFormRequest;

class LecturerManagementController extends AdminBaseController
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index($department, $departmentId)
    {
        return view('admin::college.department.management.lecturer.index',['department'=>Department::find($departmentId)]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create($department, $departmentId)
    {
        return view('admin::college.department.management.lecturer.create',['department'=>Department::find($departmentId)]);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function register(LecturerFormRequest $request)
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
           'staff_category_id' => 1,
           'staff_type_id' => 1,
           'employed_at' => $data['employed_at']
        ]);

        $staff->lecturer()->create([
            'email'=>$staff->email,
            'password'=>$staff->password,
            'admin_id'=>admin()->id,
            'from' =>$staff->employed_at
        ]);

        $staff->profile()->create([
            'gender_id' => $data['gender'],
            'religion_id' => $data['religion'],
            'address' => $data['address'],
            'date_of_birth' => $data['date_of_birth'],
            'biography' => 'staff biography',
        ]);

        session()->flash('message','Lecturer is registered successfully');

        return back();
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    
    public function edit($department,$departmentId,$lecturerId)
    {
        return view('admin::college.department.management.lecturer.edit',['lecturer'=>Lecturer::find($lecturerId)]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(UpdateLecturerFormRequest $request, $department,$departmentId, $lecturerId)
    {
        $data = $request->all();
        $lecturer = Lecturer::find($lecturerId);
        $lecturer->staff->update([
           'first_name'=>$data['first_name'],
           'last_name'=>$data['last_name'],
           'phone'=>$data['phone'],
           'email'=>$data['email'],
           'staffID'=>$data['staffID'],
           'password'=>Hash::make($data['staffID']),
           'employed_at' => $data['employed_at']
        ]);

        $lecturer->update([
            'email'=>$lecturer->staff->email,
            'password'=>$lecturer->staff->password,
            'admin_id'=>admin()->id,
            'from' =>$lecturer->staff->employed_at
        ]);

        $lecturer->staff->profile->update([
            'gender_id' => $data['gender'],
            'religion_id' => $data['religion'],
            'address' => $data['address'],
            'date_of_birth' => $data['date_of_birth'],
            'biography' => 'staff biography',
        ]);

        session()->flash('message','Lecturer information updated successfully');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
