@extends('admin::layouts.master')

@section('title')
    search available appointment lecturers
@endsection

@section('page-content')
	@if(count($department->lecturers())>0)
	<div class="col-md-12">
		<br>
		<div class="card shadow">
			<br>
			<div class="center"><b>LIST OF LECTURERS REGISTER IN {{strtoupper($department->name)}} DEPARTMENT</b></div>
			<div class="card-body">
				<table class="table">
			     	<thead>
			     		<tr>
			     			<th>S/N</th>
			     			<th>Name</th>
			     			<th>Email</th>
			     			<th>Phone</th>
			     			<th>From</th>
			     			<th>To</th>
			     			<th></th>
			     			<th></th>
			     			<th><button class="btn btn-primary shadow"><a href="{{route('admin.college.department.management.lecturer.create',[str_replace(' ','-',strtolower($department->name)),$department->id])}}"><i class="fa fa-plus"></i></a></button></th>
			     		</tr>
			     	</thead>
			     	<tbody>
			     		@foreach($department->lecturers() as $lecturer)
                            <tr>
                            	<td>{{$loop->index+1}}</td>
                            	<td>
                            		{{$lecturer->staff->first_name}} {{$lecturer->staff->last_name}}
                            	</td>
                            	<td>{{$lecturer->email}}</td>
                            	<td>{{$lecturer->phone}}</td>
                            	<td>{{$lecturer->from}}</td>
                            	<td>{{$lecturer->to}}</td>
                            	<td><button data-toggle="modal" data-target="#lecturer_{{$lecturer->id}}" class="btn btn-primary shadow">Appointment</button></td>
                            	<td>
                            		<a href="{{route('admin.college.department.management.lecturer.edit',[str_replace(' ','-',strtolower($department->name)),$department->id,$lecturer->id])}}"><button class="btn btn-info shadow">Edit</button>
                            		</a>
                            		</td>
                            	<td>
                            		<a href="{{route('admin.college.department.management.lecturer.delete',[str_replace(' ','-',strtolower($department->name)),$department->id,$lecturer->id])}}" onclick="confirm('Are you sure you want delete this lecturer')">
                            		<button class="btn btn-danger shadow">Delete</button></a>
                            	</td>
                            </tr>
                            @include('admin::college.department.management.lecturer.appointment')
			     		@endforeach
			     	</tbody>
			    </table>
			</div>
		</div>
	</div>
	@else
		<div class="alert alert-danger">No staff record found for this search</div>
	@endif   
@endsection