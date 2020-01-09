@extends('admin::layouts.master')

@section('page-content')
	@foreach(admin()->colleges as $college)
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
		            </div>
		        </div>
		        <!-- / course item -->
		    </div>
	    @endforeach
    @endforeach   
@endsection