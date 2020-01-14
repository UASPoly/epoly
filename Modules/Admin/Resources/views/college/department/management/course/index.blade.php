@extends('admin::layouts.master')
@section('title')
    admin {{$department->name}} management page
@endsection
@section('page-content')
	<div class="col-md-12">
		<br>
		<div class="card"><br>
			<div class="center"><b>LIST OF COURSES REGISTER IN {{strtoupper($department->name)}} DEPARTMENT</b></div>
			<div class="card-body shadow table-responsive">
				<table class="table">
					<thead>
						<tr>
							<th>S/N</th>
							<th>Title</th>
							<th>Code</th>
							<th>Programme</th>
							<th>Level</th>
							<th>Semester</th>
							<th></th>
							<th><button class="btn btn-primary"><i class="fa fa-plus"></i></button></th>
						</tr>
					</thead>
					<tbody>
						@foreach($department->courses as $course)
                        <tr>
                        	<td>{{$loop->index+1}}</td>
                        	<td>{{$course->title}}</td>
                        	<td>{{$course->code}}</td>
                        	<td>
                        		{{$course->programme ? $course->programme->title : 'Not Available' }}
                        	</td>
                        	<td>{{$course->semester->name}}</td>
                        	<td>{{$course->level->name}}</td>
                        	<td><button class="btn btn-warning shadow" data-toggle="modal" data-target="#course_{{$course->id}}">Edit</button></td>
                        	<td><button class="btn btn-danger shadow">Delete</button></td>
                        </tr>
                        @include('admin::college.department.management.course.edit')
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
    @include('admin::college.department.management.course.create')
@endsection