@extends('admin::layouts.master')
@section('title')
{{$college->name}} management page
@endsection
@section('page-content')
<div class="col-md-12">
	<br>
    <div class="card">
    	<div class="card-body">
    		@foreach($college->departments as $department)
			    <div class="col-md-4">
			        <!-- course item -->
			        <div class="course-item">
			            <div class="course-name clear-fix">
			            <h3><a href="#">{{$department->name}}</a></h3>
			                </div>
			            <div class="course-date bg-color-1 clear-fix">
			                <div class="time"><i class="fa fa-clock-o"></i>Established At {{$department->established_date}}</div>
			                <div class="divider"></div>
			                <div class="description">{{$department->description}}</div>
			                <button class="btn btn-primary"><a href="{{route('admin.college.department.edit',[str_replace(' ','-',strtolower($department->name)),$department->id])}}"  style="color: white">Edit</a></button>
			                <button class="btn btn-primary"><a href="{{route('admin.college.department.delete',[str_replace(' ','-',strtolower($department->name)),$department->id])}}" onclick="confirm('Are you sure you want delete this department')" style="color: white">Delete</a></button>
			                <button class="btn btn-primary"><a href="{{route('admin.college.department.management.index',[str_replace(' ','-',strtolower($department->name)),$department->id])}}" style="color: white">Management</a></button>
			            </div>
			        </div>
			        <!-- / course item -->
			    </div>
		    @endforeach
		    @if(count($college->departments) == 0)
		        <div class="alert alert-danger">There is no available department in the College of {{$college->name}} <a href="{{route('admin.college.department.create',[$college->id])}}">Create New department</a></div>
		    @endif
    	</div>
    </div>
</div>
@endsection