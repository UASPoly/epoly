@extends('layouts.result')

@section('page-content')
	<div class="table-responsive">
	    <div class="col-md-12 text-center"><br><br>
	    	UMARU ALI SHINKAFI POLYTECHNIC SOKOTO<br>
	    	COLLEGE OF {{strtoupper($registration->student->admission->department->college->name)}}<br>
	    	DEPARTMENT OF {{strtoupper($registration->student->admission->department->name)}}<br>
	    	{{strtoupper($registration->semesterRegistrations->where('semester_id',request()->route('semester_id'))->first()->semester->name ?? '')}} EXAMINATION RESULTS, {{$registration->session->name}} SESSION<br><br>
	    	NATIONAL DIPLOMA IN COMPUTER SCIENCE II ({{$registration->student->studentSession->name}})<br><br>
	    	NDCS II ({{substr($registration->student->studentSession->name,0,1)}})
	    </div>
		<table class="table table-bordered table-striped" >
            @include('department::department.course.result.student.table.header')
            @include('department::department.course.result.student.table.body')
		</table>
	</div>
@endsection