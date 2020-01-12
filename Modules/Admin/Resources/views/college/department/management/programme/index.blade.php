@extends('admin::layouts.master')
@section('title')
    admin {{$department->name}} programme management page
@endsection
@section('page-content')
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <button data-toggle="modal" data-target="#newProgramme" class="btn-block button-fullwidth cws-button bt-color-3">New Programme</button>
        <div class="card">
        	<div class="card-body">
        		<table class="table">
        			<thead>
        				<tr>
        					<th>Programme</th>
        					<th>Code</th>
        					<th>Status</th>
        					<th>Morning Schedule</th>
        					<th>Evening Schedule</th>
        					<th></th>
        				</tr>
        			</thead>
        			<tbody>
        				@foreach($department->departmentProgrammes as $departmentProgramme)
                        	<tr>
	        					<td>{{$departmentProgramme->programme->name}}</td>
	        					<td>{{$departmentProgramme->code}}</td>
	        					<td>{{$departmentProgramme->hasMorningSchedule() ? 'Active' : 'Not Active'}}</td>
	        					<td>{{$departmentProgramme->hasEveningSchedule() ? 'Active' : 'Not Active'}}</td>
	        					<td>
	        						<button data-toggle="modal" data-target="#programme_{{$departmentProgramme->id}}" class="btn-block button-fullwidth cws-button bt-color-3">
	        							Edit
	        						</button>
	        					</td>
	        				</tr>
                            @include('admin::college.department.management.programme.edit')
        				@endforeach
        			</tbody>
        		</table>
        	</div>
        </div>
    </div>
    @include('admin::college.department.management.programme.programme')
@endsection