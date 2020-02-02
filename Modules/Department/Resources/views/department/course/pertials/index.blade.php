<div class="col-md-12">
<br>
<div class="card shadow">
	<div class="card-header shadow">
		<h5 class="center">{{count(department()->departmentCourses)}} REGISTERED COURSES IN {{strtoupper(department()->name)}}</h5>
	</div>
	<div class="card-body">
		@if(count(department()->departmentCourses)>0)
	    <table class="table shadow">
	     	<thead>
	     		<tr>
	     			<th>S/N</th>
	     			<th>Couse Title</th>
	     			<th>Course Code</th>
	     			<th>Course Units</th>
	     			<th>Semester</th>
	     			<th>Level</th>
	     			<th></th>
	     		</tr>
	     	</thead>
	     	<tbody>
	     		@foreach(department()->departmentCourses()->paginate(5) as $departmentCourse)
	     		<tr>
	     			<td>{{$loop->index+1}}</td>
	     			<td>{{$departmentCourse->course->title}}</td>
	     			<td>{{$departmentCourse->course->code}}</td>
	     			<td>{{$departmentCourse->course->unit}}</td>
	     			<td>{{$departmentCourse->course->semester->name}}</td>
	     			<td>{{optional($departmentCourse->course->programmeLevel)->name}}</td>
	     			<td>
	     				<button class="btn btn-danger shadow" onclick="confirm('Are you sure you want to delete this course from the list of courses in this department')"><a href="{{route($route['delete'] ?? 'department.course.delete',['course_id'=>$departmentCourse->course->id])}}" style="color: white">Delete</a> </i>
	     				</button>
	     				<button class="btn btn-info shadow"><a href="{{route($route['edit'] ?? 'department.course.edit',['course_id'=>$departmentCourse->course->id])}}" style="color: white">Edit</a></i>
	     				</button>
	     			</td>
	     		</tr>
	     		@endforeach
	     	</tbody>
	    </table>
	    {{department()->departmentCourses()->paginate(5)->links()}}
		@else
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<div class="alert alert-danger">No course record found for this department</div>
			</div>
		@endif
	</div>
</div>
</div>
    