@extends('department::layouts.master')

@section('title')
    department registered courses
@endsection

@section('page-content')
<div class="col-md-12">
    <div class="card shadow">
        <div class="card-body">
            <table class="table shadow">
                <thead>
                    <tr>
                        <th>S/N</th>
                        <th>Course Title</th>
                        <th>Course Code</th>
                        <th>Department</th>
                        <th>Lecturer</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td colspan=""><b>Internal Courses</b></td>
                    </tr>

                    @foreach($programme->courses as $course)
                        <tr>
                            <td>{{$loop->index+1}}</td>
                            <td>{{$course->title}}</td>
                            <td>{{$course->code}}</td>
                            <td>{{$course->courseLecturer() ? $course->courseLecturer()->staff->department->name : 'Department'}}</td>
                            <td>
                                {{$course->courseLecturer() ? $course->courseLecturer()->staff->first_name.' '.$course->courseLecturer()->staff->last_name : 'Not Allocated'}}
                            </td>
                            <td>
                                <button class="btn btn-primary" data-toggle="modal" data-target="#allocation_{{$course->id}}">Amend Allocation</button>
                                @include('department::department.programme.course.courseAllocation.allocation')
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan=""><b>Service in Courses</b></td>
                    </tr>
                    
                    @foreach($programme->serviceInCourses() as $departmentCourse)
                        <tr>
                            <td>{{$loop->index+1}}</td>
                            <td>{{$departmentCourse->course->title}}</td>
                            <td>{{$departmentCourse->course->code}}</td>
                            <td>
                                {{$departmentCourse->department->name}}
                            </td>
                            <td>
                                {{$departmentCourse->courseLecturer() ? $departmentCourse->courseLecturer()->staff->first_name.' '.$departmentCourse->courseLecturer()->staff->last_name : 'Not Allocated'}}
                            </td>
                            <td>
                                
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan=""><b>Service Out Courses</b></td>
                    </tr>
                    @foreach($programme->serviceOutCourses() as $departmentCourse)
                        <tr>
                            <td>{{$loop->index+1}}</td>
                            <td>{{$departmentCourse->course->title}}</td>
                            <td>{{$departmentCourse->course->code}}</td>
                            <td>
                                {{$departmentCourse->department->name}}
                            </td>
                            <td>
                                {{$departmentCourse->courseLecturer() ? $departmentCourse->courseLecturer()->staff->first_name.' '.$departmentCourse->courseLecturer()->staff->last_name : 'Not Allocated'}}
                            </td>
                            <td>
                                <button class="btn btn-primary" data-toggle="modal" data-target="#allocation_{{$departmentCourse->id}}">Amend Allocation</button>
                                @include('department::department.programme.course.pertials.allocation')
                            </td>
                        </tr>
                    @endforeach 
                </tbody>
            </table>
        </div>
	</div> 
</div>
@endsection