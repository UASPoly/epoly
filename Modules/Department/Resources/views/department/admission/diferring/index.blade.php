@extends('department::layouts.master')

@section('title')
    department registered courses
@endsection

@section('page-content')
	@if(count(headOfDepartment()->department->diferredSessions->where('diferring_status_id',1))>0 || count(headOfDepartment()->department->diferredSemesters)>0)
	    <table class="table">
	     	<thead>
	     		<tr>
	     			<th>S/N</th>
	     			<th>Fisrt Name</th>
	     			<th>Last Name</th>
	     			<th>Admission No</th>
	     			<th>Session</th>
	     			<th>Request to difer</th>
	     			<th>E-mail</th>
	     			<th>Phone</th>
	     			<th></th>
	     		</tr>
	     	</thead>
	     	<tbody>
	     		@include('department::department.admission.diferring.diferredSemester')
	     		@include('department::department.admission.diferring.diferredSession')
	     	</tbody>
	    </table>
	@else
	<div class="col-md-2"></div>
	<div class="col-md-8">
		<div class="alert alert-danger">No differing Application found for this department</div>
	</div>
	@endif   
@endsection