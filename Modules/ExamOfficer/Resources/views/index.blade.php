@extends('examofficer::layouts.master')

@section('page-content')
    <!--     
        <div class="col-md-12"><br><br></div>
        
        <div class="col-md-4" style="font-size: 200px">
            <a href="{{route('exam.officer.student.admission.generate.number.index')}}"><i class="fa fa-pencil"></i></a>
        </div>
        <div class="col-md-4" style="font-size: 200px">
            <a href="{{route('exam.officer.student.student.index')}}"><i class="fa fa-users"></i></a>
        </div>
        <div class="col-md-4" style="font-size: 200px">
            <a href="{{route('exam.officer.graduation.graduate.index')}}"><i class="fa fa-graduation-cap"></i></a>
        </div> -->
    
    @foreach(examOfficer()->department->unverifiedResults() as $result)
        <div class="col-md-4">
         	<div class="card">
         		<div class="card-header bt-color-3">
         			{{$result->session->name}} {{$result->lecturerCourse->course->code}} Results Uploaded at {{$result->created_at}}
         		</div>
         		<div class="card-body">
         			
     				<button class="button-fullwidth cws-button bt-color-3 btn-block"><a href="{{route('exam.officer.result.course.review',[$result->id])}}" style="color: white">Review This Result</a></button>
     			
     				<button class="button-fullwidth cws-button bt-color-3 btn-block"><a href="{{route('exam.officer.result.course.edit',[$result->id])}}" style="color: white">Edit This Result</a></button>
			         			
         		</div>
         	</div>
        </div>
    @endforeach
@endsection
