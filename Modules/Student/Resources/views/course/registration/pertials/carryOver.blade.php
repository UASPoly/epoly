
@if(count(student()->currentLevelReRegisterCourses()))>0)
<div class="card">
	<div class="card-header text text-center">
        {{currentSession()->name}} {{student()->level()->id < 6 ? student()->level()->name.' Carry Over Courses' : student()->level()->name.' Re Register Courses' }}</div>
	<div class="card-body table-responsive">
		<table class="table">
			<head>
				<tr>
					<td>S/N</td>
					<td>Course Title</td>
					<td>Course Code</td>
					<td>Course Unit</td>
					<td>Semester</td>
					<td>Lecturer</td>
					<td></td>
				</tr>
			</head>
			<tbody>
				@foreach(student()->currentLevelReRegisterCourses() as $course)
					<tr>
						<td>{{$loop->index+1}}</td>
						<td>{{$course->title}}</td>
						<td>
							{{$course->code}}
						</td>
						<td>
							{{$course->unit}}
						</td>
						<td>
							{{$course->semester->name}}
						</td>
						<td>
							{{$course->currentCourseMaster() ? $course->currentCourseMaster()->staff->first_name.' '.$course->currentCourseMaster()->staff->last_name : 'Not available'}}
						</td>
						<td>
							<input type="checkbox" value="{{$course->id}}" class="form-control" name="add[]">  
						</td>
					</tr>
				@endforeach
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td class="strong h4">Total Units</td>
					<td class="strong h4">{{student()->currentSessionCarryOverCourseUnits()}}</td>
				</tr>
			</tbody>
		</table>	
	</div>
</div>
@endif