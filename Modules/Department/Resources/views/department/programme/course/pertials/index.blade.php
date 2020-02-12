<div class="col-md-12">
<div class="card shadow">
	<div class="card-body">
		@if(count($programme->courses)>0)
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
	     		@foreach($programme->courses()->paginate(5) as $course)
	     		<tr>
	     			<td>{{$loop->index+1}}</td>
	     			<td>{{$course->title}}</td>
	     			<td>{{$course->code}}</td>
	     			<td>{{$course->unit}}</td>
	     			<td>{{$course->semester->name}}</td>
	     			<td>{{optional($course->programmeLevel)->name}}</td>
	     			<td>
	     				<button class="btn btn-danger shadow" onclick="return confirm('Are you sure you want to delete this course from the list of courses in this department')"><a href="{{route($route['delete'] ?? 'department.programme.course.delete',['programmeId'=>$programme->id,'course_id'=>$course->id])}}" style="color: white">Delete</a> </i>
	     				</button>
	     				<button class="btn btn-info shadow"><a href="{{route($route['edit'] ?? 'department.programme.course.edit',['programmeId'=>$programme->id,'course_id'=>$course->id])}}" style="color: white">Edit</a></i>
	     				</button>
	     			</td>
	     		</tr>
	     		@endforeach
	     	</tbody>
	    </table>
	    {{$programme->courses()->paginate(5)->links()}}
		@else
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<div class="alert alert-danger">No course record found for the {{$programme->title}}</div>
			</div>
		@endif
	</div>
</div>
</div>
    