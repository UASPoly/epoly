@extends('department::layouts.master')

@section('title')
    department registered courses
@endsection

@section('page-content')
    <div class="col-md-3"></div>
    <div class="col-md-6">
    <form action="{{route('department.course.allocation.register')}}" method="post">
	@foreach(headOfDepartment()->department->courses as $course)
    	<div class="card">
        	<div class="card-body">
    			@csrf
    			<input type="hidden" name="{{$loop->index}}[allocation][course_id]]" value="{{$course->id}}">
    			<label>Course Title</label>
    			<select class="form-control" name="{{$loop->index}}[allocation][course_title]]">
    				<option value="{{$course->title}}">{{$course->title}}</option>
    			</select>
    			<label>Course Code</label>
    			<select class="form-control" name="{{$loop->index}}[allocation][course_code]]">
    				<option value="{{$course->code}}">{{$course->code}}</option>
    			</select>
    			<label>Department</label>
    			<select class="form-control" name="{{$loop->index}}[allocation][department_id]]">
    				<option value="{{$course->department->id}}">{{$course->department->name}}</option>
    			</select>
    			<label>Course Master</label>
    			<select class="form-control" name="{{$loop->index}}[allocation][course_master_lecturer_id]]">
    				<option value="{{$course->currentCourseMaster() ? $course->currentCourseMaster()->id : ''}}">{{$course->currentCourseMaster() ? $course->currentCourseMaster()->staff->first_name.' '.$course->currentCourseMaster()->staff->last_name.' '.$course->currentCourseMaster()->staff->staffID : 'Lecturer'}}</option>
    				@foreach(headOfDepartment()->department->staffs as $staff)
                        @if($staff->staffType->name == 'Lecturer')
                            @if(!$course->currentCourseMaster() || $course->currentCourseMaster() && $staff->lecturer->id != $course->currentCourseMaster()->id )
                                <option value="{{$staff->lecturer->id}}">{{$staff->first_name}} {{$staff->first_name}} {{$staff->staffID}}</option>
                            @endif
                        @endif
    				@endforeach
    			</select>
    			<label>Course Assistance</label>
    			<select class="form-control" name="{{$loop->index}}[allocation][course_assistance_lecturer_id]]">
    				<option value="{{$course->currentCourseAssistance() ? $course->currentCourseAssistance()->id : ''}}">{{$course->currentCourseAssistance() ? $course->currentCourseAssistance()->staff->first_name.' '.$course->currentCourseAssistance()->staff->last_name.' '.$course->currentCourseAssistance()->staff->staffID : 'Lecturer'}}</option>
    				@foreach(headOfDepartment()->department->staffs as $staff)
                        @if($staff->staffType->name == 'Lecturer')
                            @if(!$course->currentCourseAssistance() || $course->currentCourseAssistance() && $staff->lecturer->id != $course->currentCourseAssistance()->id )
                                <option value="{{$staff->lecturer->id}}">{{$staff->first_name}} {{$staff->first_name}} {{$staff->staffID}}</option>
                            @endif
                        @endif
    				@endforeach
    			</select><br>
        	</div>
        </div><br>
	@endforeach
	<button class="btn btn-info">Update Course Allocations</button>
    </form>
	</div> 
@endsection