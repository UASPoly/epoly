<div class="col-md-3"></div>
<div class="col-md-6"><br>
 	<div class="card shadow">
	    <div class="card-head shadow">
		<h4 class="center">
		Search/Expert Students Semester Result
		</h4>
	    </div>
 		<div class="card-body">
 			<form action="{{route($route ?? 'department.result.course.vetting.search')}}" method="post">
 				@csrf
 				<select class="form-control" name="session">
 					<option value="">Session</option>
 					@foreach($sessions as $session)
 					    <option value="{{$session->id}}">{{$session->name}}</option>
 					@endforeach    
 				</select><br>
 				<select class="form-control" name="level">
 					<option value="">Level</option>
 					@foreach(department()->programmes as $programme)
 					    @foreach($programme->programmeLevels as $programmeLevel)
 					    <option value="{{$programmeLevel->id}}">{{$programmeLevel->name}}</option>
 					    @endforeach
 					@endforeach
 				</select><br>
 				<select class="form-control" name="semester">
 					<option value="">Semester</option>
 					<option value="1">First</option>
 					<option value="2">Second</option>
 				</select><br>
 				<label>Student/Page</label>
 				<input type="number" name="paginate" min="1" class="form-control"><br>
 				<button name="search" value="search" class="btn btn-success bt-color-3">Search Result</button>
 				<button name="export" value="export" class="btn btn-success bt-color-3">Export Result</button>
 			</form>
 		</div>
 	</div>
</div>