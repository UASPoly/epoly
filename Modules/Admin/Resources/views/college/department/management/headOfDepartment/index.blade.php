@extends('admin::layouts.master')
@section('title')
    admin {{$department->name}} head of deaprtment management page
@endsection
@section('page-content')
    <div class="col-md-12">
    	<br>
        <div class="card shadow">
        	<div class="card-body">
        		<div class="row">
		    		
		    		<div class="col-md-12">
		    			<button data-toggle="modal" data-target="#newHeadOfDepartment" class="btn-block button-fullwidth cws-button bt-color-3 shadow">New Appointment</button>
		    		</div>
		    		<div class="col-md-12"><br></div>
		    	</div>
        		<table class="table shadow">
        			<thead>
        				<tr>
        					<th>S/N</th>
        					<th>Name</th>
        					<th>E-Mail Address</th>
        					<th>Phone</th>
        					<th>From</th>
        					<th>To</th>
        					<th>Status</th>
        					<th></th>
        				</tr>
        			</thead>
        			<tbody>
        				@foreach($department->headOfDepartments as $headOfDepartment)
                        	<tr>
	        					<td>{{$loop->index+1}}</td>
	        					<td>{{$headOfDepartment->staff->first_name}} {{$headOfDepartment->staff->last_name}}</td>
	        					<td>{{$headOfDepartment->email}}</td>
	        					<td>{{$headOfDepartment->staff->phone}}</td>
	        					<td>{{$headOfDepartment->from}}</td>
	        					<td>{{$headOfDepartment->to}}</td>
	        					<td>{{$headOfDepartment->is_active==1 ? 'Active' : 'Not Active'}}</td>
	        					<td>
	        						@if($headOfDepartment->is_active == 1)
                                        <a href="{{route('admin.college.department.appointment.hod.revoke',[$headOfDepartment->staff->lecturer->id])}}"><button class="btn btn-warning shadow">Revoke Appointment</button></a>
	        						@endif
	        					</td>
	        				</tr>
        				@endforeach
        			</tbody>
        		</table>
        	</div>
        </div>
    </div>
    @include('admin::college.department.management.headOfDepartment.create')
@endsection