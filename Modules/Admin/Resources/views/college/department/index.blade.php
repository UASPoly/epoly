@extends('admin::layouts.master')

@section('page-content')
<div class="col-md-12">
	<br>
   <div class="card shadow">
   	    <div class="card-body">
   	    	
	        <div class="col-md-12">
	            <button data-toggle="modal" data-target="#newDepartment" class="btn-block button-fullwidth cws-button bt-color-3 shadow">Create Department</button>
	        </div>
	        @include('admin::college.department.newDepartment')
	        <div class="col-md-12"><br></div>
	    
   	    @if(count($college->departments)>0)
   	    <div class="row">
   	    	@foreach($college->departments as $department)
			    <div class="col-md-4">
			        <!-- course item -->
			        <div class="course-item shadow">
			            <div class="course-name clear-fix">
			            <h3><a href="#">{{$department->name}}</a></h3>
			                </div>
			            <div class="course-date bg-color-1 clear-fix">
			                <div class="time"><i class="fa fa-clock-o"></i>Established At {{$department->established_date}}</div>
			                <div class="divider"></div>
			                <div class="description">{{$department->description}}</div>
			                <button class="btn btn-primary"><a href="{{route('admin.college.department.edit',[$department->id])}}"  style="color: white">Edit</a></button>
			                <button class="btn btn-primary"><a href="{{route('admin.college.department.delete',[$department->id])}}" onclick="confirm('Are you sure you want delete this department')" style="color: white">Delete</a></button>
			                <button class="btn btn-primary"><a href="{{route('admin.college.department.management.index',[$department->id])}}" style="color: white">Management</a></button>
			            </div>
			        </div>
			        <!-- / course item -->
			    </div>
		    @endforeach
		    </div>
	    @else
	        <div class="alert alert-danger shadow">There are no avaialable departments in the college of {{$college->name}}</div>
	    @endif
   	    </div>
   </div>	
</div> 
@endsection