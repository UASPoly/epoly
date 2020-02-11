@extends('admin::layouts.master')
@section('title')
    admin {{$department->name}} exam officer management page
@endsection

@section('breadcrumbs')
{{Breadcrumbs::render('admin.college.department.examofficer.management',$department)}}
@endsection

@section('page-content')
    <div class="col-md-12">
        <div class="card shadow">
        	<div class="card-body">
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
        				</tr>
        			</thead>
        			<tbody>
        				@foreach($department->examOfficers as $examOfficer)
                        	<tr>
	        					<td>{{$loop->index+1}}</td>
	        					<td>{{$examOfficer->lecturer->staff->first_name}} {{$examOfficer->lecturer->staff->last_name}}</td>
	        					<td>{{$examOfficer->email}}</td>
	        					<td>{{$examOfficer->lecturer->staff->phone}}</td>
	        					<td>{{$examOfficer->from}}</td>
	        					<td>{{$examOfficer->to}}</td>
	        					<td>{{$examOfficer->is_active==1 ? 'Active' : 'Not Active'}}</td>
	        				</tr>
        				@endforeach
        			</tbody>
        		</table>
        	</div>
        </div>
    </div>
@endsection