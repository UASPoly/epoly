@extends('admin::layouts.master')

@section('title')
    Admin colleges management
@endsection

@section('breadcrumbs')
{{Breadcrumbs::render('admin.colleges.index')}}
@endsection

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
                        <div class="course-name clear-fix shadow">
                        <h3><a href="#">College Of {{$college->name}}</a></h3>
                            </div>
                        <div class="course-date bg-color-8 clear-fix shadow" style="color: black">
                            <div class="time"><i class="fa fa-clock-o"></i>Established At {{$college->established_date}}</div>
                            <div class="divider"></div>
                            <div class="description" >{{$college->description}}</div>
                            <button class="btn btn-success"><a href="{{route('admin.college.edit',[$college->id])}}">Edit</a></button>
                            <button class="btn btn-success"><a href="{{route('admin.college.delete',[$college->id])}}" onclick="return confirm('Are you sure you want delete this college')" style="color: white">Delete</a></button>
                            <a href="{{route('admin.college.management.index',[$college->id])}}" style="color: white">
                                <button class="btn btn-success">Managements</button>
                            </a><br>
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