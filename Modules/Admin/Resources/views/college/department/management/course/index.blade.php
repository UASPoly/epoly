@extends('admin::layouts.master')
@section('title')
    admin {{$department->name}} management page
@endsection
@section('page-content')
	<div class="col-md-12">
		<br>
		<div class="card">
			<div class="card-body shadow table-responsive">
				<table class="table">
					<thead>
						<tr>
							<th>S/N</th>
							<th>Title</th>
							<th>Code</th>
							<th>Programme</th>
							<th>Level</th>
							<th></th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						@foreach($department->courses as $course)
                        <tr>
                        	<td>{{$loop->index+1}}</td>
                        	<td>{{$course->title}}</td>
                        	<td>{{$course->code}}</td>
                        	<td></td>
                        	<td>{{$course->level->name}}</td>
                        	<td><button class="btn btn-warning shadow">Edit</button></td>
                        	<td><button class="btn btn-danger shadow">Delete</button></td>
                        </tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>

@endsection