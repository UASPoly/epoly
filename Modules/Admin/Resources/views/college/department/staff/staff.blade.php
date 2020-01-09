@extends('admin::layouts.master')

@section('title')
    search success available staffs
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
	     			<th>Department</th>
	     			<th>Staff Category</th>
	     			<th>Staff Type</th>
	     			<th></th>
	     		</tr>
	     	</thead>
	     	<tbody>
	     		@foreach(session('staffs') as $staff)
	     		<tr>
	     			<td>{{$loop->index+1}}</td>
	     			<td>{{$staff->first_name.' '.$staff->last_name}}</td>
	     			<td>{{$staff->email}}</td>
	     			<td>{{$staff->phone}}</td>
	     			<td>{{$staff->department->name}}</td>
	     			<td>{{$staff->staffCategory ? $staff->staffCategory->name : 'not updated'}}</td>
	     			<td>{{$staff->staffType ? $staff->staffType->name : 'not updated'}}</td>
	     			<td>
	     				<button class="btn btn-primary"><a href="{{route('admin.college.department.staff.show',['staff_id'=>$staff->id])}}" style="color: white">View</a></i></button>
	     				<button class="btn btn-danger" onclick="confirm('Are you sure you want to delete this staff')"><a href="{{route('admin.college.department.staff.delete',[$staff->id])}}" style="color: white">Delete</a> </i></button>
	     				<button class="btn btn-info"><a href="{{route('admin.college.department.staff.edit',['staff_id'=>$staff->id])}}" style="color: white">Edit</a></i></button>
	     			</td>
	     		</tr>
	     		@endforeach
	     	</tbody>
	    </table>
	@else
		<div class="alert alert-danger">No staff record found for this search</div>
	@endif   
@endsection