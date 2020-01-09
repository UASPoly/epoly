@extends('admin::layouts.master')

@section('page-content')
	@foreach(admin()->colleges as $college)
    <div class="col-md-4">
        <!-- course item -->
        <div class="course-item">
            <div class="course-name clear-fix">
            <h3><a href="#">{{$college->name}}</a></h3>
                </div>
            <div class="course-date bg-color-1 clear-fix">
                <div class="time"><i class="fa fa-clock-o"></i>Established At {{$college->established_date}}</div>
                <div class="divider"></div>
                <div class="description">{{$college->description}}</div>
                <button class="btn btn-primary"><a href="{{route('admin.college.edit',[str_replace(' ','-',strtolower($college->name)),$college->id])}}"  style="color: white">Edit</a></button>
                <button class="btn btn-primary"><a href="{{route('admin.college.delete',[str_replace(' ','-',strtolower($college->name)),$college->id])}}" onclick="confirm('Are you sure you want delete this college')" style="color: white">Delete</a></button>
            </div>
        </div>
        <!-- / course item -->
    </div>
    @endforeach   
@endsection