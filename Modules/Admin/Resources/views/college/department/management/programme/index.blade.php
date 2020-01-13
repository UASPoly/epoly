@extends('admin::layouts.master')
@section('title')
    admin {{$department->name}} programme management page
@endsection
@section('page-content')
    <div class="col-md-12">
    	<br>
        <div class="card">
        	<div class="card-body">
        		<div class="row">
		    		<div class="col-md-8"></div>
		    		<div class="col-md-4">
		    			<button data-toggle="modal" data-target="#newProgramme" class="btn-block button-fullwidth cws-button bt-color-3">Create New Programme</button>
		    		</div>
		    	</div>
        		<table class="table">
        			<thead>
        				<tr>
        					<th>Programme</th>
        					<th>Code</th>
        					<th>Title</th>
        					<th>Status</th>
        					<th>Morning Schedule</th>
        					<th>Evening Schedule</th>
        					<th></th>
        				</tr>
        			</thead>
        			<tbody>
        				@foreach($department->programmes as $programme)
                        	<tr>
	        					<td>{{$programme->name}}</td>
	        					<td>{{$programme->code}}</td>
	        					<td>{{$programme->title}}</td>
	        					<td>
	        						@if($programme->status == 1)
	                                    <a href="{{route('admin.college.department.management.programme.deactivate',
								        [str_replace(' ','-',strtolower($department->name)),
								        $department->id,$programme->id])}}">
	                                        <button class="btn-block button-fullwidth cws-button bt-color-0">
			        							De-Activate
			        						</button>
			        					</a>
	        						@else
                                        <a href="{{route('admin.college.department.management.programme.activate',
								        [str_replace(' ','-',strtolower($department->name)),
								        $department->id,$programme->id])}}">
									        <button class="btn-block button-fullwidth cws-button bt-color-3">
			        							Activate
			        						</button>
			        					</a>
	        						@endif
	        					</td>
	        					<td>{{$programme->hasMorningSchedule() ? 'Active' : 'Not Active'}}</td>
	        					<td>{{$programme->hasEveningSchedule() ? 'Active' : 'Not Active'}}</td>
	        					<td>
	        						<div class="row">
	        							<div class="col-md-6">
	        								<button data-toggle="modal" data-target="#programme_{{$programme->id}}" class="btn-block button-fullwidth cws-button bt-color-3">
			        							Edit
			        						</button>
	        							</div>
	        							<div class="col-md-6">
	        								<a href="{{route('admin.college.department.management.programme.delete',
								                [str_replace(' ','-',strtolower($department->name)),
								                 $department->id,$programme->id])}}">
									            <button data-toggle="modal" data-target="#programme_{{$programme->id}}" class="btn-block button-fullwidth cws-button bt-color-3">
			        							Delete
			        						    </button>
			        						</a>
	        							</div>
	        						</div>
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