@extends('lecturer::layouts.master')

@section('page-content')
<div class="col-md-1"></div> 
<div class="col-md-10">
	<div class="card">
		<div class="card-body">
			<table class="table table-default">
				<thead>
					<tr>
						<td>S/N</td>
						<td>Name</td>
						<td>Admission No</td>
						<td>Email</td>
						<td>Phone</td>
					</tr>
				</thead>
				<tbody>
					@foreach($students as $student)
					<tr>
						<td>{{$loop->index+1}}</td>
						<td>{{$student->first_name}} {{$student->last_name}}</td>
						<td>{{$student->admission->admission_no}}</td>
						<td>{{$student->email}}</td>
						<td>{{$student->phone}}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div> 
@endsection
