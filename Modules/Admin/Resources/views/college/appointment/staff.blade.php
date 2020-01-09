@extends('admin::layouts.master')

@section('title')
    search available appointment staffs
@endsection

@section('page-content')
	@if(count(session('staffs'))>0)
	    <table class="table">
	     	<thead>
	     		<tr>
	     			<th>S/N</th>
	     			<th>Name</th>
	     			<th>Email</th>
	     			<th>Phone</th>
	     			<th>College</th>
	     			<th>Department</th>
	     			<th>Appointment</th>
	     			<th>Appointment Status</th>
	     			<th>From</th>
	     			<th>To</th>
	     			<th></th>
	     		</tr>
	     	</thead>
	     	<tbody>
	     		@foreach(session('staffs') as $staff)
		     		@if($staff->staffCategory->id == 1)
		     		<tr>
		     			<td>{{$loop->index+1}}</td>
		     			<td>{{$staff->first_name.' '.$staff->last_name}}</td>
		     			<td>{{$staff->email}}</td>
		     			<td>{{$staff->phone}}</td>
		     			<td>{{$staff->department->college->name}}</td>
		     			<td>{{$staff->department->name}}</td>
		     			<td>
		     				@if($staff->headOfDepartment)
	                            {{'Head Of Department'}}
		     				@elseif($staff->directer)
		     				    {{'College Directer'}}
		     				@else
		     				    {{'Un Define'}}    
		     				@endif
		     			</td>
		     			<td>
		     				@if($staff->headOfDepartment)
	                            {{$staff->headOfDepartment->is_active == 1 ? 'Active' : 'Not Active' }}
		     				@elseif($staff->directer)
		     				    {{$staff->directer->is_active == 1 ? 'Active' : 'Not Active' }}
		     				@else
		     				    {{'Un Define'}}    
		     				@endif
		     			</td>
		     			<td>
		     				@if($staff->headOfDepartment)
	                            {{$staff->headOfDepartment->from}}
		     				@elseif($staff->directer)
		     				    {{$staff->directer->from}}
		     				@else
		     				        
		     				@endif
		     			</td>
		     			<td>
		     				@if($staff->headOfDepartment)
	                            {{$staff->headOfDepartment->to}}
		     				@elseif($staff->directer)
		     				    {{$staff->directer->from}}
		     				@else
		     				        
		     				@endif
		     			</td>
		     			<td>
			     			<button class="btn btn-info" data-toggle="modal" data-target="#staff_{{$staff->id}}_appointment">Make Appointment</button>
			     			@include('admin::college.appointment.appointment')
		     			</td>
		     		</tr>
		     		@endif
	     		@endforeach
	     	</tbody>
	    </table>
	@else
		<div class="alert alert-danger">No staff record found for this search</div>
	@endif   
@endsection