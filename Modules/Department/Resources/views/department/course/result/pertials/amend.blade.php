<div class="col-md-3"></div>
<div class="col-md-6"><br>
 	<div class="card">
 		<div class="card-header">
 			You can amend {{$result->lecturerCourse->course->code}} Results by adding or removing some marks using positive or negative number. 
 		</div>
 		<div class="card-body">
 			<form method="post" action="{{route($route ?? 'department.result.course.amend.register',[$result->id])}}">
 				@csrf
 				<label>Marks</label>
     			<input type="number" name="marks" class="form-control">
     			<br>
     			<button class="button-fullwidth cws-button bt-color-3 btn-block">Amend Result</button>
 			</form>
 		</div>
 	</div>
</div>