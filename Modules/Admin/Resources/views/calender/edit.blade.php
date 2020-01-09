@extends('admin::layouts.master')
@section('title')
    admin edit calender page
@endsection
@section('page-content')

<div class="col-md-3"></div>
<div class="col-md-6">
	<form action="{{route('admin.calender.update',[$session->id])}}" method="post">
		@csrf
		<div class="card">
			<div class="card-header button-fullwidth cws-button bt-color-3">Session Calender </div>
		 	<div class="card-body">
		 	    <label>Session</label><input type="text" name="session" class="form-control" value="{{date('Y')}}/{{date('Y')+1}}" disabled="">
		 	    <label>session start at</label><input type="date" name="session_start" class="form-control" value="{{$session->start}}">
		 	    <label>session end at</label><input type="date" name="session_end" class="form-control" value="{{$session->end}}">
		 	</div>
		</div><br>
		@foreach($session->calenders as $calender)
		@if($calender->semester->id == 1)
		<div class="card">
			<div class="card-header button-fullwidth cws-button bt-color-3">First Semester Calender </div>
		 	<div class="card-body">
		 		<label>Semester</label><input type="text" name="first_semester" class="form-control" value="First Semester" disabled="">
		 	    <label>first semester start at</label><input type="date" name="first_semester_start" class="form-control" value="{{$calender->start}}">
		 	    <label>first semester end at</label><input type="date" name="first_semester_end" class="form-control" value="{{$calender->end}}">
		 	</div>
		</div><br>
		<div class="card">
			<div class="card-header button-fullwidth cws-button bt-color-3">First Semester Course Allocation Calender</div>
		 	<div class="card-body">
		 	    <label>course allocation start at</label><input type="date" name="first_semester_course_allocatiion_start" class="form-control" value="{{$calender->courseAllocationCalender->start}}">
		 	    <label>course allocation end at</label><input type="date" name="first_semester_course_allocatiion_end" class="form-control" value="{{$calender->courseAllocationCalender->end}}">
		 	</div>
		</div><br>
		<div class="card">
			<div class="card-header button-fullwidth cws-button bt-color-3">First Semester Lecture Calender</div>
		 	<div class="card-body">
		 	    <label>first semester lecture start at</label><input type="date" name="first_semester_lecture_start" class="form-control" value="{{$calender->lectureCalender->start}}">
		 	    <label>first semester lecture end at</label><input type="date" name="first_semester_lecture_end" class="form-control" value="{{$calender->lectureCalender->end}}">
		 	</div>
		</div><br>
		<div class="card">
			<div class="card-header button-fullwidth cws-button bt-color-3">First Semester Exam Calender</div>
		 	<div class="card-body">
		 	    <label>first semester exam start at</label><input type="date" name="first_semester_exam_start" class="form-control" value="{{$calender->examCalender->start}}">
		 	    <label>first semester exam end at</label><input type="date" name="first_semester_exam_end" class="form-control" value="{{$calender->examCalender->end}}">
		 	</div>
		</div><br>
		<div class="card">
			<div class="card-header button-fullwidth cws-button bt-color-3">First Semester Exam Marking Calender</div>
		 	<div class="card-body">
		 	    <label>first semester exam marking start at</label><input type="date" name="first_semester_exam_marking_start" class="form-control" value="{{$calender->markingCalender->start}}">
		 	    <label>first semester exam marking end at</label><input type="date" name="first_semester_exam_marking_end" class="form-control" value="{{$calender->markingCalender->end}}">
		 	</div>
		</div><br>
		<div class="card">
			<div class="card-header button-fullwidth cws-button bt-color-3">First Semester Result Upload Calender</div>
		 	<div class="card-body">
		 	    <label>first semester result upload start at</label><input type="date" name="first_semester_result_upload_start" class="form-control" value="{{$calender->uploadResultCalender->start}}">
		 	    <label>first semester result upload end at</label><input type="date" name="first_semester_result_upload_end" class="form-control" value="{{$calender->uploadResultCalender->end}}">
		 	</div>
		</div><br>
		@else
		<div class="card">
			<div class="card-header button-fullwidth cws-button bt-color-3">Second Semester Calender </div>
		 	<div class="card-body">
		 		<label>Semester</label><input type="text" name="second_semester" class="form-control" value="Second Semester" disabled="">
		 	    <label>second semester start at</label><input type="date" name="second_semester_start" class="form-control" value="{{$calender->start}}">
		 	    <label>second semester end at</label><input type="date" name="second_semester_end" class="form-control" value="{{$calender->end}}">
		 	</div>
		</div><br>
		<div class="card">
			<div class="card-header button-fullwidth cws-button bt-color-3">Second Semester Course Allocation Calender </div>
		 	<div class="card-body">
		 	    <label>second semester course allocation start at</label><input type="date" name="second_semester_course_allocation_start" class="form-control" value="{{$calender->courseAllocationCalender->start}}">
		 	    <label>second semester course allocation end at</label><input type="date" name="second_semester_course_allocation_end" class="form-control" value="{{$calender->courseAllocationCalender->end}}">
		 	</div>
		</div><br>
		<div class="card">
			<div class="card-header button-fullwidth cws-button bt-color-3">Second Semester Lecture Calender </div>
		 	<div class="card-body">
		 	    <label>second semester lecture start at</label><input type="date" name="second_semester_lecture_start" class="form-control" value="{{$calender->lectureCalender->start}}">
		 	    <label>second semester lecture end at</label><input type="date" name="second_semester_lecture_end" class="form-control" value="{{$calender->lectureCalender->start}}">
		 	</div>
		</div><br>
		<div class="card">
			<div class="card-header button-fullwidth cws-button bt-color-3">Second Semester Exam Calender </div>
		 	<div class="card-body">
		 	    <label>second semester exam start at</label><input type="date" name="second_semester_exam_start" class="form-control" value="{{$calender->examCalender->start}}">
		 	    <label>second semester exam end at</label><input type="date" name="second_semester_exam_end" class="form-control" value="{{$calender->examCalender->end}}">
		 	</div>
		</div><br>
		<div class="card">
			<div class="card-header button-fullwidth cws-button bt-color-3">Second Semester Exam Marking Calender </div>
		 	<div class="card-body">
		 	    <label>second semester exam marking start at</label><input type="date" name="second_semester_exam_marking_start" class="form-control" value="{{$calender->markingCalender->start}}">
		 	    <label>second semester exam marking end at</label><input type="date" name="second_semester_exam_marking_end" class="form-control" value="{{$calender->markingCalender->end}}">
		 	</div>
		</div><br>
		<div class="card">
			<div class="card-header button-fullwidth cws-button bt-color-3">Second Semester Result Upload Calender </div>
		 	<div class="card-body">
		 	    <label>second semester result upload start at</label><input type="date" name="second_semester_result_upload_start" class="form-control" value="{{$calender->uploadResultCalender->start}}">
		 	    <label>second semester result upload end at</label><input type="date" name="second_semester_result_upload_end" class="form-control" value="{{$calender->uploadResultCalender->end}}">
		 	</div>
		</div><br>
		@endif
		@endforeach
		<button class=" btn-block button-fullwidth cws-button bt-color-3">Save {{date('Y')}}/{{date('Y')+1}} Calender Changes</button>
		<br><br>
    </form>
</div>
@endsection