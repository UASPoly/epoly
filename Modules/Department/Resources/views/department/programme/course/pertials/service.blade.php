<div class="col-md-12">
<div class="card shadow">
	<div class="card-body">
		@if($status == 'in')
	        <button data-toggle="modal" data-target="#borrowCourse" class="btn btn-success btn-block">Borrow Course</button>
	        @include('department::department.programme.course.borrowCourse')
		@endif
		@if(count($departmentCourses)>0)
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
	     		@foreach($departmentCourses->paginate(5) as $departmentCourse)
	     		<tr>
	     			<td>{{$loop->index+1}}</td>
	     			<td>{{$departmentCourse->course->title}}</td>
	     			<td>{{$departmentCourse->course->code}}</td>
	     			<td>{{$departmentCourse->course->unit}}</td>
	     			<td>{{$departmentCourse->semester->name}}</td>
	     			<td>{{optional($departmentCourse->programmeLevel)->name}}</td>
	     			<td>
	     				
	     			</td>
	     		</tr>
	     		@endforeach
	     	</tbody>
	    </table>
	    {{$departmentCourses()->paginate(5)->links()}}
		@else
			<div class="alert alert-danger">No service {{$status}} course record found in the list of {{$programme->title}} courses</div>
		@endif
	</div>
</div>
</div>
    