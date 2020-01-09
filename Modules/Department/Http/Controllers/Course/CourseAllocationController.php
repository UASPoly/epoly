<?php

namespace Modules\Department\Http\Controllers\Course;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Lecturer\Entities\Lecturer;
use Modules\Department\Entities\LecturerCourse;
use Modules\Department\Entities\LecturerCourseAllocation;
use Modules\Core\Http\Controllers\Department\HodBaseController;

class CourseAllocationController extends HodBaseController
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('department::department.course.courseAllocation.index');
    }

    public function register(Request $request)
    {
        foreach ($this->preparedAllocationDatas($request->all()) as $data) {
            //check if the data has course lecturer allocation
            if($data['allocation']['course_master_lecturer_id']){
                $lecturer = Lecturer::find($data['allocation']['course_master_lecturer_id']);
                
                LecturerCourseAllocation::updateOrCreate([
                    'course_id'=>$data['allocation']['course_id'],
                    'department_id'=>$data['allocation']['department_id'],
                ],
                [
                    'lecturer_id'=>$lecturer->id,
                    'course_id'=>$data['allocation']['course_id'],
                    'department_id'=>$data['allocation']['department_id'],
                ]);

                $course_lecturer = LecturerCourse::where(['course_id'=>$data['allocation']['course_id'],'is_active'=>1,'lecturer_course_status_id'=>1,])->first();

                if($course_lecturer && $course_lecturer->is_active == 1){
                    $course_lecturer->is_active = 0;
                    $course_lecturer->to = time();
                    $course_lecturer->save();
                }

                LecturerCourse::updateOrCreate([
                    'lecturer_id'=>$lecturer->id,
                    'course_id'=> $data['allocation']['course_id'],
                    'department_id'=> $data['allocation']['department_id']
                ],
                [
                    'lecturer_course_status_id'=>1,
                    'course_id'=> $data['allocation']['course_id'],
                    'department_id'=> $data['allocation']['department_id'],
                    'from' => time()
                ]);
            }

            //check if the course has lecturer assistance
            if($data['allocation']['course_assistance_lecturer_id']){
                $lecturer = Lecturer::find($data['allocation']['course_assistance_lecturer_id']);

                LecturerCourseAllocation::updateOrCreate([
                    'course_id'=>$data['allocation']['course_id'],
                    'department_id'=>$data['allocation']['department_id']
                ],[
                    'lecturer_id'=>$lecturer->id,
                    'course_id'=>$data['allocation']['course_id'],
                    'department_id'=>$data['allocation']['department_id']
                ]);

                $course_lecturer = LecturerCourse::where(['course_id'=>$data['allocation']['course_id'],'is_active'=>1,'lecturer_course_status_id'=>2])->first();

                if($course_lecturer && $course_lecturer->is_active == 1){
                    $course_lecturer->is_active = 0;
                    $course_lecturer->to = time();
                    $course_lecturer->save();
                }

                LecturerCourse::updateOrCreate([
                    'lecturer_id'=>$lecturer->id,
                    'course_id'=> $data['allocation']['course_id'],
                    'department_id'=> $data['allocation']['department_id']
                ],
                [
                    'lecturer_course_status_id'=>2,
                    'course_id'=> $data['allocation']['course_id'],
                    'department_id'=> $data['allocation']['department_id'],
                    'from' => time()
                ]);
            }
        }
        session()->flash('message','The course allocation is updated successfully');
        return redirect()->route('department.course.allocation.index');
    }
    
    public function preparedAllocationDatas(array $inputs)
    {
        $datas = [];
        $number_of_allocation_data = count($inputs) / 2;
        for ($i=0; $i < $number_of_allocation_data; $i++) { 
            $datas[] = $inputs[$i];
        }
        return $datas;
    }
    
}
