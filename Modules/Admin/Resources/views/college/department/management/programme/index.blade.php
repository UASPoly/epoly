@extends('admin::layouts.master')
@section('title')
    admin {{$department->name}} programme management page
@endsection
@section('page-content')
    <div class="col-md-12">
    	<br>
        <div class="card shadow">
        	<div class="card-body table-responsive">
        		<div class="row">
		    		<div class="col-md-12">
		    			<button data-toggle="modal" data-target="#newProgramme" class="btn-block button-fullwidth cws-button bt-color-3 shadow">Create New Programme</button><br>
		    		</div>
		    	</div>
        		<table class="table shadow">
        			<thead>
        				<tr>
        					<th>Programme</th>
        					<th>Code</th>
        					<th>Title</th>
        					<th>Type</th>
        					<th>Status</th>
        					<th>Admissions</th>
        					<th>Morning Schedule</th>
        					<th>Evening Schedule</th>
        					<th></th>
        					<th></th>
        				</tr>
        			</thead>
        			<tbody>
        				@foreach($department->programmes as $programme)
                        	<tr>
	        					<td>{{$programme->name}}</td>
	        					<td>{{$programme->code}}</td>
	        					<td>{{$programme->title}}</td>
	        					<td>{{optional($programme->programmeType)->name ?? null}}</td>
	        					<td>
	        						@if($programme->status == 1)
	                                    <a href="{{route('admin.college.department.management.programme.deactivate',
								        [$department->id,$programme->id])}}">
	                                        <button class="btn btn-warning">
			        							De-Activate
			        						</button>
			        					</a>
	        						@else
                                        <a href="{{route('admin.college.department.management.programme.activate',
								        [$department->id,$programme->id])}}">
									        <button class="btn btn-success">
			        							Activate
			        						</button>
			        					</a>
	        						@endif
	        					</td>
	        					<td>{{count($programme->admissions)}}</td>
	        					<td>{{$programme->hasMorningSchedule() ? 'Active' : 'Not Active'}}</td>
	        					<td>{{$programme->hasEveningSchedule() ? 'Active' : 'Not Active'}}</td>
	        					<td>
    								<button data-toggle="modal" data-target="#programme_{{$programme->id}}" class="btn btn-info">
	        							Edit
	        						</button>
	        						@include('admin::college.department.management.programme.edit')
    							</td>
    							<td>
    								<a href="{{route('admin.college.department.management.programme.delete',
						                [$department->id,$programme->id])}}">
							            <button class="btn btn-danger">
	        							Delete
	        						    </button>
	        						</a>
	        					</td>
	        				</tr>
        				@endforeach
        			</tbody>
        		</table>
        	</div>
        </div>
    </div>
    @include('admin::college.department.management.programme.programme')
@endsection