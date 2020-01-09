
@if(count($students)> 0)
<div class="col-md-12">
	<div class="card">
		<div class="card-body">
			<div class="col-md-12 text-center"><br><br>
		    	UMARU ALI SHINKAFI POLYTECHNIC SOKOTO<br>
		    	COLLEGE OF {{strtoupper(department()->college->name)}}<br>
		    	DEPARTMENT OF {{strtoupper(department()->name)}}<br>
		    	LIST OF WITH DRAWED STUDENTS IN, {{$session->name}} SESSION<br><br>
		    </div>
			<div class="table-responsive">
				<table class="table">
				    <thead>
				     	<tr>
				     		<td>S/N</td>
				     		<td>First Name</td>
				     		<td>Last Name</td>
				     		<td>Admission No</td>
				     		<td>Phone</td>
				     		<td>Student</td>
				     		<td>Failed Courses</td>
				     	</tr>
				    </thead>
				    <tbody>
				    	@foreach($students as $student)
			            <tr>
				     		<td>{{$loop->index+1}}</td>
				     		<td>{{strtoupper($student->first_name)}}</td>
				     		<td>{{strtoupper($student->last_name)}}</td>
				     		<td>{{$student->admission->admission_no}}</td>
				     		<td>{{$student->phone}}</td>
				     		<td>{{$student->studentType->name}}</td>
				     		<td>
				     			{{count($student->currentLevelReRegisterCoursesAt($session))}}
				     		</td>
				     	</tr>
				    	@endforeach
				    </tbody>
			    </table>
			</div>
		</div>
	</div>
</div>
@else
<div class="col-md-12">
	<div class="alert alert-danger">Sorry there is no with draw students found at {{$session->name}} Session</div>
</div>
@endif
