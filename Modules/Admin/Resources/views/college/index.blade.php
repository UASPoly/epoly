@extends('admin::layouts.master')

@section('page-content')
<div class="col-md-12">
    <br>
    <div class="card shadow">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <button data-toggle="modal" data-target="#newCollege" class="btn-block button-fullwidth cws-button bt-color-3 shadow">Create College</button>
                </div>
                <div class="col-md-12"><br></div>
            </div>
            @include('admin::college.newCollege')
            <div class="row"> 
                @foreach(admin()->colleges() as $college)
                <div class="col-md-4">
                    <!-- course item -->
                    <div class="course-item shadow">
                        <div class="course-name clear-fix">
                        <h3><a href="#">College Of {{$college->name}}</a></h3>
                            </div>
                        <div class="course-date bg-color-1 clear-fix">
                            <div class="time"><i class="fa fa-clock-o"></i>Established At {{$college->established_date}}</div>
                            <div class="divider"></div>
                            <div class="description">{{$college->description}}</div>
                            <button class="btn btn-primary"><a href="{{route('admin.college.edit',[$college->id])}}"  style="color: white">Edit</a></button>
                            <button class="btn btn-primary"><a href="{{route('admin.college.delete',[$college->id])}}" onclick="confirm('Are you sure you want delete this college')" style="color: white">Delete</a></button>
                            <button class="btn btn-primary"><a href="{{route('admin.college.management.index',[$college->id])}}" style="color: white">Management</a></button>
                        </div>
                    </div>
                    <!-- / course item -->
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>	   
@endsection