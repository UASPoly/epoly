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
							<th>Unit</th>
							<th>Programme</th>
							<th>Level</th>
							<th>Semester</th>
							<th></th>
							<th><button class="btn btn-primary shadow" data-toggle="modal" data-target="#newCourse"><i class="fa fa-plus"></i></button></th>
						</tr>
					</thead>
					<tbody>
						@foreach($department->courses()->paginate(5) as $course)
                        <tr>
                        	<td>{{$loop->index+1}}</td>
                        	<td>{{$course->title}}</td>
                        	<td>{{$course->code}}</td>
                        	<td>{{$course->unit}}</td>
                        	<td>
                        		{{$course->programme ? $course->programme->title : 'Not Available' }}
                        	</td>
                        	<td>{{optional($course->programmeLevel)->name}}</td>
                        	<td>{{$course->semester->name}}</td>
                        	<td>
                        		<button class="btn btn-warning shadow" data-toggle="modal" data-target="#course_{{$course->id}}">
	                        		Edit
	                        	</button>
	                            @include('admin::college.department.management.course.edit')

                        	</td>
                        	<td>
                        		<a href="{{route('admin.college.department.management.course.delete',
			                    [$department->id,$course->id])}}">
			                    <button class="btn btn-danger shadow" onclick="confirm('Are you sure you want to delete this course')">Delete</button>
			                    </a>
			                </td>
                        </tr>
						@endforeach
					</tbody>
				</table>
				<div>
					{{$department->courses()->paginate(5)->links()}}
				</div>
			</div>
		</div>
	</div>
    @include('admin::college.department.management.course.create')
@endsection