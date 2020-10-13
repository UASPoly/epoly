@extends('examofficer::layouts.master')

@section('title')
 Exam officer dashboard
@endsection

@section('breadcrumbs')
{{Breadcrumbs::render('examofficer.dashboard')}}
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
            <b class="text text-danger" >Uploaded results</b> 
        </div>
        <div class="card-body">
            @foreach(examOfficer()->department->unverifiedResults() as $result)
                <div class="col-md-4">
                    <div class="card shadow">
                        <div class="card-header bt-color-3">
                            {{$result->session->name}} {{$result->lecturerCourse->course->code}} Results Uploaded at {{$result->created_at}}
                        </div>
                        <div class="card-body">
                            
                            <button class="button-fullwidth cws-button bt-color-3 btn-block shadow"><a href="{{route('exam.officer.result.course.review',[$result->id])}}" style="color: white">Review This Result</a></button>
                        
                            <button class="button-fullwidth cws-button bt-color-3 btn-block shadow"><a href="{{route('exam.officer.result.course.edit',[$result->id])}}" style="color: white">Edit This Result</a></button>
                                        
                        </div>
                    </div>
                </div>
            @endforeach
            @if(count(examOfficer()->department->unverifiedResults()) == 0)
                <div class="alert alert-danger shadow">There is no result uploaded for {{currentSemester()->name ?? ' '}} in {{currentSession()->name}}</div>
            @endif
        </div>
    </div>
</div>
@endsection
