<div class="col-md-12">
	<div class="card shadow">
		<div class="card-body">
			<table class="table shadow">
				<thead>
					<tr>
						<th>S/N</th>
						<th>Programme Title</th>
						<th>Programme Abbreviation</th>
						<th>Programme Type</th>
						<th>Schedules</th>
						<th>{{currentSession()->name}} Admissions</th>
						<th>Programme Courses</th>
					</tr>
				</thead>
				@foreach(department()->programmes as $programme)
	                <tr>
	                	<td>{{$loop->index+1}}</td>
	                	<td>{{$programme->name}}</td>
	                	<td>{{$programme->title}}</td>
	                	<td>{{$programme->programmeType->name}}</td>
	                	<td>
	                		<button class="btn btn-primary" data-target="#schedules_{{$programme->id}}" data-toggle="modal">
	                			{{count($programme->programmeSchedules)}}
	                		</button>
	                		@include('department::department.programme.schedules')
	                	</td>
	                	<td>
	                		<a href="{{route('exam.officer.department.programme.admissions',$programme->id)}}">
		                		<button class="btn btn-primary">
		                			{{count($programme->admissions->where('session_id',currentSession()->id))}}
		                		</button>
		                	</a>
	                	</td>
	                	<td>
	                		<a href="{{route($route['courses'],$programme->id)}}">
	                			<button class="btn btn-primary">{{count($programme->courses)}}</button>
	                		</a>
	                	</td>
	                </tr>
				@endforeach
			</table>
		</div>
	</div>
</div>