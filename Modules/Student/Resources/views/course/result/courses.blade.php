@extends('student::layouts.master')

@section('page-content')
@php
$count = 1;
@endphp
<input type="checkbox" name="">
<div class="col-md-1"></div>
<div class="col-md-10">
	@foreach(student()->sessionRegistrations as $session_registration)
	<div class="card">
		<div class="card-header button-fullwidth cws-button bt-color-3">{{$session_registration->session->name}} {{$session_registration->level->name}} Registered Courses</div>
		<div class="card-body">
			<table class="table">
				<head>
					<tr>
						<td>S/N</td>
						<td>Course Title</td>
						<td>Course Code</td>
						<td>Course Unit</td>
						<td>Level</td>
						<td>Semester</td>
					</tr>
				</head>
				<tbody>
					@foreach($session_registration->semesterRegistrations as $semester_registration)
					    @foreach($semester_registration->courseRegistrations as $course_registration)
							<tr>
								<td>{{$count++}}</td>
								<td>{{$course_registration->course->title}}</td>
								<td>
									{{$course_registration->course->code}}
								</td>
								<td>
									{{$course_registration->course->unit}}
								</td>
								<td>
									{{$course_registration->semesterRegistration->sessionRegistration->level->name}}
								</td>
								<td>
									{{$course_registration->course->semester->name}}
								</td>
							</tr>
					    @endforeach
					@endforeach
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td class="strong h4">Registerd Units</td>
						<td class="strong h4">{{$session_registration->registeredUnits()}}</td>
					</tr>
				</tbody>
			</table>	
		</div>
	</div><br>
	@endforeach
</div> 
@endsection
