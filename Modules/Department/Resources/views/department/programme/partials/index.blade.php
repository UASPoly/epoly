<div class="col-md-12">
	<div class="card shadow">
		<div class="card-header shadow">
			<h5 class="center">{{currentSession()->name}} {{department()->name}} Programmes and courses information</h5>
		</div>
		<div class="card-body table-responsive">
			<table class="table shadow">
				<thead>
					<tr>
						<th>S/N</th>
						<th>Programme Title</th>
						<th>Programme Abbreviation</th>
						<th>Programme Type</th>
						<th>Schedules</th>
						<th>Reserved Admissions</th>
						<th>Admissions</th>
						<th>Programme Courses</th>
						<th>Service In Courses</th>
						<th>Service Out Courses</th>
						@if(headOfDepartment())
                        <th></th>
						@endif
					</tr>
				</thead>
				@foreach(department()->programmes as $programme)
	                <tr>
	                	<td>{{$loop->index+1}}</td>
	                	<td>{{$programme->name}}</td>
	                	<td>{{$programme->title}}</td>
	                	<td>{{optional($programme->programmeType)->name}}</td>
	                	<td>
	                		<button class="btn btn-success" data-target="#schedules_{{$programme->id}}" data-toggle="modal">
	                			{{count($programme->programmeSchedules)}}
	                		</button>
	                		@include('department::department.programme.schedules')
	                	</td>
	                	<td>
	                		<button class="btn btn-success" data-target="#reserved_{{$programme->id}}" data-toggle="modal">
	                			{{count($programme->reservedDepartmentSessionAdmissions->where('session_id',currentSession()->id))}}
	                		</button>
	                		@include('department::department.programme.reserved')
	                	</td>
	                	<td>
	                		<a href="{{route($routes['admission'] ?? 'department.programme.admissions',$programme->id)}}">
		                		<button class="btn btn-success">
		                			{{count($programme->admissions->where('session_id',currentSession()->id))}}
		                		</button>
		                	</a>
	                	</td>
	                	<td>
	                		<a href="{{route($routes['courses'] ?? 'department.programme.course.index',$programme->id)}}">
	                			<button class="btn btn-success">{{count($programme->courses)}}</button>
	                		</a>
	                	</td>

	                	<td>
	                		<a href="{{route($routes['serviceIn'] ?? 'department.programme.course.service.in',$programme->id)}}">
	                			<button class="btn btn-success">{{count($programme->serviceInCourses())}}</button>
	                		</a>
	                	</td>

	                	<td>
	                		<a href="{{route($routes['serviceOut'] ?? 'department.programme.course.service.out',$programme->id)}}">
	                			<button class="btn btn-success">{{count($programme->serviceOutCourses())}}</button>
	                		</a>
	                	</td>
	                	@if(headOfDepartment())
                            <td>
                            	<a href="{{route('department.programme.course.allocation.index',$programme->id)}}">
	                            	<button class="btn btn-success">Course Allocation</button>
	                            </a>
                            </td>
						@endif
	                </tr>
				@endforeach
			</table>
		</div>
	</div>
</div>