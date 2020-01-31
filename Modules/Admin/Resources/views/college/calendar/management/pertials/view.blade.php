<div class="col-md-12">
	<br>
	<div class="card shadow">
		<div class="card-body">
			<div class="row">
				<div class="col-md-12">
					<h3  class="center shadow text-success"><b>{{strtoupper(currentSemester()->name)}} CALENDAR COUNT DOWN</b></h3>
				</div>
			</div>
			<br>
			<div class="row">
				@if(currentSemester()->id == 1)
				    @include('admin::college.calendar.management.semester.first')
				@elseif(currentSemester()->id == 2)
				    @include('admin::college.calendar.management.semester.second')
				@else
				    <div class="alert alert-danger shadow">Un identify current semester</div>
				@endif
			</div>
		</div>
	</div>
</div>