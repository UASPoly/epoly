<?php
namespace Modules\Admin\Services\Staff;
use Modules\College\Entities\College;
use Modules\Department\Entities\Department;

trait SearchStaff
{
    public function searchAvailableStaffs($data)
    {
    	$flag = null;
        $staffs = [];
        if($data['college']){
            $flag = 'college';
        }
        if($data['department']){
            $flag = 'department';
        }
        if($flag){
            switch ($flag) {
                case 'college':
                    $college = College::find($data['college']);
                    
                    foreach ($college->departments as $department) {
                        foreach ($department->staffs as $staff) {
                            $staffs[] = $staff;
                        }
                    }
                    $message = 'found in '.$college->name.' College';
                    break;
                default:
                    $department = Department::find($data['department']);
                    foreach ($department->staffs as $staff) {
                        $staffs[] = $staff;
                    }
                    $message = 'found in '.$department->name.' Department';
                    break;
            }
        }else{
            $message = 'found in the entire school';
            foreach (admin()->colleges as $college) {
                foreach ($college->departments as $department) {
                    foreach ($department->staffs as $staff) {
                        $staffs[] = $staff;
                    }
                }
            }
        }
        $result = 'Staff';
        if(count($staffs) > 1){
            $result = 'Staffs';
        }
        session()->flash('message',count($staffs).' '.$result.' '.$message);
        session(['staffs'=>$staffs]);
    }
}