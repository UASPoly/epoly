<div class="col-md-3"></div>
    <div class="col-md-6"><br>
     	<div class="card">
     		<div class="card-header">
     		    Amend this result by increasing or decreasing the amended marks.
     		</div>
     		<div class="card-body">
     			<form method="post" action="{{route($route ?? 'department.result.student.update',[$result->id])}}">
     				@csrf
     				<label>Name</label>
	     			<input type="text" disabled="" value="{{$result->courseRegistration->semesterRegistration->sessionRegistration->student->first_name}} {{$result->courseRegistration->semesterRegistration->sessionRegistration->student->first_name}}" class="form-control">
	     			<label>Admission No</label>
	     			<input type="text" disabled="" value="{{$result->courseRegistration->semesterRegistration->sessionRegistration->student->admission->admission_no}}" class="form-control">
     				<label>CA Score</label>
	     			<input type="text" disabled="" value="{{$result->ca}}" class="form-control">
	     			<label>Exam Score</label>
	     			<input type="text" disabled="" value="{{$result->exam}}" class="form-control">
	     			<label>Amend Marks</label>
	     			<input type="text" disabled="" value="{{$result->amended_by}}" class="form-control">
	     			<label>Grade</label>
	     			<input type="text" disabled="" value="{{$result->grade}}" class="form-control">
     				<label>Marks</label>
	     			<input type="number" name="marks" max="20" value="{{$result->amended_by}}" class="form-control">
	     			<br>
	     			<button class="button-fullwidth cws-button bt-color-3 btn-block">Save Changes</button>
     			</form>
     		</div>
     	</div>
    </div>