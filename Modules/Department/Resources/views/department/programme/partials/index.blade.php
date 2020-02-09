<div class="col-md-12">
	<div class="card shadow">
		<div class="card-body">
			<table class="table shadow">
				<thead>
					<tr>
						<th>S/N</th>
						<th>Poramme Title</th>
						<th>Programme Abbreviation</th>
						<th>Programme Type</th>
						<th>Schedules</th>
						<th>Admissions</th>
						<th>Courses</th>
						<th></th>
					</tr>
				</thead>
				@foreach(department()->programmes as $programme)
	                <tr>
	                	<td>{{$loop->index+1}}</td>
	                	<td>{{$programme->name}}</td>
	                	<td>{{$programme->title}}</td>
	                	<td>{{$programme->programmeType->name}}</td>
	                	<td>{{count($programme->programmeSchedules)}}</td>
	                	<td>{{count($programme->admissions->where('session_id',currentSession()->id))}}</td>
	                	<td>{{count($programme->courses)}}</td>
	                	<td><a href=""><button class="btn btn-info">View Courses</button></a></td>
	                </tr>
				@endforeach
			</table>
		</div>
	</div>
</div>