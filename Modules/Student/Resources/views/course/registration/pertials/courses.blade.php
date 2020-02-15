@if(student()->level())

<div class="card">
	<div class="card-header text text-center">{{student()->level()->name}} {{currentSession()->name}} Session Courses</div>
	<div class="card-body table-responsive">
		<table class="table">
			<head>
				<tr>
					<td>S/N</td>
					<td>Course Title</td>
					<td>Course Code</td>
					<td>Course Unit</td>
					<td>Semester</td>
					<td>lecturer</td>
					<td></td>
				</tr>
			</head>
			<tbody>
				@foreach(student()->currentLevelCourses() as $levelCourse)
				<tr>
					<td>{{$loop->index+1}}</td>
					<td>{{$levelCourse->title}}</td>
					<td>
						{{$levelCourse->code}}
					</td>
					<td>
						{{$levelCourse->unit}}
					</td>
					<td>
						{{$levelCourse->semester->name}}
					</td>
					<td>
						{{$levelCourse->currentCourseMaster() ? $levelCourse->currentCourseMaster()->staff->first_name.' '.$levelCourse->currentCourseMaster()->staff->last_name : 'Not available'}}
					</td>
					<td >
						<input type="checkbox" name="course[]" value="{{$levelCourse->id}}" checked>  
					</td>
				</tr>
				@endforeach
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td class="strong h4">Total Units</td>
					<td class="strong h4">{{student()->currentLevelCourseUnits()}}</td>
				</tr>
			</tbody>
		</table>	
	</div>
</div>
@endif