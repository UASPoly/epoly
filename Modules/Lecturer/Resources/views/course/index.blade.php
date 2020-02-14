@extends('lecturer::layouts.master')

@section('page-content')
<div class="col-md-12">
	<div class="card shadow">
		<div class="card-body table-responsive">
			<table class="table table-default shadow">
				<thead>
					<tr>
						<td>S/N</td>
						<td>Course Title</td>
						<td>Course Code</td>
						<td>Course Unit</td>
						<td>Semester</td>
						<td>Department</td>
						<td>Programme</td>
						<td>Level</td>
						<td></td>
					</tr>
				</thead>
				<tbody>
					@foreach(lecturer()->lecturerCourses as $lecturer_course)
					<tr>
						<td>{{$loop->index+1}}</td>
						<td>{{$lecturer_course->course->title}}</td>
						<td>{{$lecturer_course->course->code}}</td>
						<td>{{$lecturer_course->course->unit}}</td>
						<td>{{$lecturer_course->course->semester->name}}</td>
						<td>{{$lecturer_course->department->name}}</td>
						<td>
							{{optional(optional($lecturer_course->programmeLevel())->programme)->title}}
						</td>
						<td>{{optional($lecturer_course->programmeLevel())->name}}</td>
						<td>
							<form action="{{route('lecturer.result.templete.download')}}" method="post">
								@csrf
								<input type="hidden" name="course" value="{{$lecturer_course->course->id}}">
								<input type="hidden" name="session" value="{{currentSession()->id}}">
								<button class="btn btn-info" style="color: white"><i class="fa fa-download"></i>Download Result Sheet</button>
							</form>

							<button data-toggle="modal" data-target="#result_{{$lecturer_course->course->id}}" class="btn btn-info" style="color: white">
								<i class="fa fa-upload"></i>Uplaod Result
							</button>
							@include('lecturer::course.upload')
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div> 
@endsection
