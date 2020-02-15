@extends('department::layouts.master')

@section('title')
head of department dashboard
@endsection

@section('breadcrumbs')
{{Breadcrumbs::render('department.dashboard')}}
@endsection

@section('page-content')
<div class="col-md-12">
    <br>
    <div class="card shadow">
        <div class="card-header shadow">
            <b class="text text-danger" >Notification !!!</b> 
        </div>
        <div class="card-body">
            
        </div>
    </div>
    <br>
    <div class="card shadow">
        <div class="card-header shadow">
            <b class="text text-danger" >{{currentSession()->name}} {{currentSemester()->name}} Un Approved Results</b> 
        </div>
        <div class="card-body">
            @foreach(headOfDepartment()->department->unverifiedResults() as $result)
                <div class="col-md-4">
                    <div class="card shadow">
                        <div class="card-header bt-color-3">
                            {{$result->session->name}} {{$result->lecturerCourse->course->code}} Results Uploaded at {{$result->created_at}}
                        </div>
                        <div class="card-body">
                            
                            <button class="btn btn-success btn-block shadow"><a href="{{route('department.result.course.review',[$result->id])}}" style="color: white">Review This Result</a></button>
                        
                            <button class="btn btn-success btn-block shadow"><a href="{{route('department.result.course.edit',[$result->id])}}" style="color: white">Edit This Result</a></button>
                                        
                        </div>
                    </div>
                </div>
            @endforeach
            @if(count(headOfDepartment()->department->unverifiedResults()) == 0)
                <div class="alert alert-danger shadow">There is no result uploaded for {{currentSemester()->name}} in {{currentSession()->name}}</div>
            @endif
        </div>
    </div>
</div>    
@endsection