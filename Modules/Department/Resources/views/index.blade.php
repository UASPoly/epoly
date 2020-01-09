@extends('department::layouts.master')

@section('page-content')
    @foreach(headOfDepartment()->department->unverifiedResults() as $result)
        <div class="col-md-4">
         	<div class="card">
         		<div class="card-header bt-color-3">
         			{{$result->session->name}} {{$result->lecturerCourse->course->code}} Results Uploaded at {{$result->created_at}}
         		</div>
         		<div class="card-body">
         			
     				<button class="button-fullwidth cws-button bt-color-3 btn-block"><a href="{{route('department.result.course.review',[$result->id])}}" style="color: white">Review This Result</a></button>
     			
     				<button class="button-fullwidth cws-button bt-color-3 btn-block"><a href="{{route('department.result.course.edit',[$result->id])}}" style="color: white">Edit This Result</a></button>
			         			
         		</div>
         	</div>
        </div>
    @endforeach
@endsection