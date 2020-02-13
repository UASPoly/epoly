<div class="col-md-12">
<div class="card shadow">
	<div class="card-header shadow">
		<h4 class="text text-danger">
		@if($status == 'out')
            {{department()->name}} department is required to serve the following department with  respective course lecturers
		@else
            {{department()->name}} department request to be served from the following department with their  respective course lecturers
		@endif
		</h4>
	</div>
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
	     			<th>Course Department</th>
	     			<th>Course Lecturer</th>
	     			<th>Semester</th>
	     			<th>Level</th>
	     			<th></th>
	     		</tr>
	     	</thead>
	     	<tbody>
	     		@foreach($departmentCourses as $departmentCourse)
	     		<tr>
	     			<td>
	     				{{$loop->index+1}}
	     			</td>
	     			<td>
	     				{{$departmentCourse->course->title}}
	     			</td>
	     			<td>
	     				{{$departmentCourse->course->code}}
	     			</td>
	     			<td>
	     				{{$departmentCourse->course->unit}}
	     			</td>
	     			<td>
	     				{{$status == 'in' ? $departmentCourse->course->department->name : $departmentCourse->department->name}}
	     			</td>
	     			<td>
		     			{{$departmentCourse->courseLecturer() ? $departmentCourse->courseLecturer()->staff->first_name.' '.$departmentCourse->courseLecturer()->staff->last_name : 'Not Allocated'}}
		     		</td>
	     			<td>
	     				{{$departmentCourse->semester->name}}
	     			</td>
	     			<td>
	     				{{$status == 'out' ? $departmentCourse->programmeLevel->name : $departmentCourse->course->programmeLevel->name}}
	     			</td>
	     			<td>
	     				@if($status == 'out')
                           <button data-toggle="modal" data-target="#allocation_{{$departmentCourse->id}}" class="btn btn-success">Amend Allocation</button>
                           @include('department::department.programme.course.pertials.allocation')
	     				@endif
	     			</td>
	     		</tr>
	     		@endforeach
	     	</tbody>
	    </table>
	    
		@else
			<div class="alert alert-danger">No service {{$status}} course record found in the list of {{$programme->title}} courses</div>
		@endif
	</div>
</div>
</div>
    