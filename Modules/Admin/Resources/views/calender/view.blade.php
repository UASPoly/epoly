
@extends('admin::layouts.master')
@section('title')
    admin view calendar page
@endsection
@section('page-content')
<div class="col-md-3">
</div>
<div class="col-md-6">
	@if(admin())
	<button class="card-header button-fullwidth cws-button bt-color-3"><a href="{{route('admin.calendar.edit',[currentSession()->id])}}" style="color: white">{{currentSession()->name}} Edit Calendar</a></button>
    <button class="card-header button-fullwidth cws-button bt-color-3"><a href="{{route('admin.calendar.delete',[currentSession()->id])}}" style="color: white" onclick="confirm('Are you sure you want to delete this school calendar')">{{currentSession()->name}} Delete Calendar</a></button><br>
    @endif
    <br>
	<div class="card">
		<div class="card-header button-fullwidth cws-button bt-color-3">
		    {{currentSession()->name}} Session Calendar 
	    </div>
		<div class="card-body">
			<table>
				<tr>
					<td>Session Start Date</td>
					<td>{{currentSession()->sessionCalendar->start}}</td>
				</tr>
				<tr>
					<td>Session End Date</td>
					<td>{{currentSession()->sessionCalendar->end}}</td>
				</tr>
				<tr>
					<td>Session Count Down</td>
					<td>{{currentSession()->sessionCalendar->countDown()}}</td>
				</tr>
			</table>
		</div>
	</div><br>
	@foreach(currentSession()->sessionCalendar->semesterCalendars as $semesterCalendar)
	    <div class="card">
			<div class="card-header button-fullwidth cws-button bt-color-3">
			    {{$semesterCalendar->semester->name}} Calendar 
		    </div>
			<div class="card-body">
				<table>
					<tr>
						<td>{{$semesterCalendar->semester->name}} Start Date</td>
						<td>{{$semesterCalendar->start}}</td>
					</tr>
					<tr>
						<td>{{$semesterCalendar->semester->name}} End Date</td>
						<td>{{$semesterCalendar->end}}</td>
					</tr>
					<tr>
						<td>{{$semesterCalendar->semester->name}} Count Down</td>
						<td>{{$semesterCalendar->countDown()}}</td>
					</tr>
				</table>
			</div>
		</div>
		<br>
		<!-- lecturer course allocation -->
		<div class="card">
			<div class="card-header button-fullwidth cws-button bt-color-3">
			    {{$semesterCalendar->semester->name}} Lecturer Course Allocation Calendar 
		    </div>
			<div class="card-body">
				<table>
					<tr>
						<td>{{$semesterCalendar->semester->name}} Course Allocation Start Date</td>
						<td>{{$semesterCalendar->courseAllocationCalendar->start}}</td>
					</tr>
					<tr>
						<td>{{$semesterCalendar->semester->name}} Course Allocation End Date</td>
						<td>{{$semesterCalendar->courseAllocationCalendar->end}}</td>
					</tr>
					<tr>
						<td>{{$semesterCalendar->semester->name}} Course Allocation Count Down</td>
						<td>{{$semesterCalendar->courseAllocationCalendar->countDown()}}</td>
					</tr>
				</table>
			</div>
		</div>
		<br>
		<!-- lecture calendar -->
		<div class="card">
			<div class="card-header button-fullwidth cws-button bt-color-3">
			    {{$semesterCalendar->semester->name}} Lecture  Calendar 
		    </div>
			<div class="card-body">
				<table>
					<tr>
						<td>{{$semesterCalendar->semester->name}} Lecture Start Date</td>
						<td>{{$semesterCalendar->lectureCalendar->start}}</td>
					</tr>
					<tr>
						<td>{{$semesterCalendar->semester->name}} Lecture End Date</td>
						<td>{{$semesterCalendar->lectureCalendar->end}}</td>
					</tr>
					<tr>
						<td>{{$semesterCalendar->semester->name}} Lecture Count Down</td>
						<td>{{$semesterCalendar->lectureCalendar->countDown()}}</td>
					</tr>
				</table>
			</div>
		</div>
		<br>

		<!-- examination calendar -->
		<div class="card">
			<div class="card-header button-fullwidth cws-button bt-color-3">
			    {{$semesterCalendar->semester->name}} Examination  Calendar 
		    </div>
			<div class="card-body">
				<table>
					<tr>
						<td>{{$semesterCalendar->semester->name}} Examination Start Date</td>
						<td>{{$semesterCalendar->examCalendar->start}}</td>
					</tr>
					<tr>
						<td>{{$semesterCalendar->semester->name}} Examination End Date</td>
						<td>{{$semesterCalendar->examCalendar->end}}</td>
					</tr>
					<tr>
						<td>{{$semesterCalendar->semester->name}} Examination Count Down</td>
						<td>{{$semesterCalendar->examCalendar->countDown()}}</td>
					</tr>
				</table>
			</div>
		</div>
		<br>

		<!-- exam marking calendar -->
		<div class="card">
			<div class="card-header button-fullwidth cws-button bt-color-3">
			    {{$semesterCalendar->semester->name}} Exam Marking  Calendar 
		    </div>
			<div class="card-body">
				<table>
					<tr>
						<td>{{$semesterCalendar->semester->name}} Exam Marking Start Date</td>
						<td>{{$semesterCalendar->markingCalendar->start}}</td>
					</tr>
					<tr>
						<td>{{$semesterCalendar->semester->name}} Exam Marking End Date</td>
						<td>{{$semesterCalendar->markingCalendar->end}}</td>
					</tr>
					<tr>
						<td>{{$semesterCalendar->semester->name}} Exam Marking Count Down</td>
						<td>{{$semesterCalendar->markingCalendar->countDown()}}</td>
					</tr>
				</table>
			</div>
		</div>
		<br>
		<!-- result upload calendar -->
		<div class="card">
			<div class="card-header button-fullwidth cws-button bt-color-3">
			    {{$semesterCalendar->semester->name}} Result Upload  Calendar 
		    </div>
			<div class="card-body">
				<table>
					<tr>
						<td>{{$semesterCalendar->semester->name}} Result Upload Start Date</td>
						<td>{{$semesterCalendar->uploadResultCalendar->start}}</td>
					</tr>
					<tr>
						<td>{{$semesterCalendar->semester->name}} Result Upload End Date</td>
						<td>{{$semesterCalendar->uploadResultCalendar->end}}</td>
					</tr>
					<tr>
						<td>{{$semesterCalendar->semester->name}} Result Upload Count Down</td>
						<td>{{$semesterCalendar->uploadResultCalendar->countDown()}}</td>
					</tr>
				</table>
			</div>
		</div>
		<br>
	@endforeach
</div>
@endsection