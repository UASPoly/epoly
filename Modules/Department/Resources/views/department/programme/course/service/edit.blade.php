<div class="modal fade shadow" id="edit_course{{$departmentCourse->id}}" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
        	<div class="modal-header shadow">
	        	<h5>Edit</h5>
	        </div>
            <div class="modal-body">
            	<form action="{{route('department.programme.course.service.update',[$programme->id, $departmentCourse->id])}}" method="post">
            		@csrf
            		<input type="hidden" name="myprogramme" value="{{$programme->id}}">
            	 	<div class="form-group">
            	 		<label>Department</label>
            	 		<select name="department" class="form-control">
            	 			<option value="{{$departmentCourse->department_id}}">{{$departmentCourse->department->name}}</option>
            	 			@foreach($departments as $department)
            	 			    @if($departmentCourse->department_id != $department->id && $department->id != department()->id)
                                    <option value="{{$department->id}}">
                                    	{{$department->name}}
                                    </option>
                                @endif
            	 			@endforeach
            	 		</select>
            	 	</div>

            	 	<div class="form-group">
            	 		<label>Course</label>
            	 		<select name="course" class="form-control" id="course">
            	 			<option value="{{$departmentCourse->course->id}}">{{$departmentCourse->course->code}}</option>
            	 		</select>
            	 	</div>

            	 	<div class="form-group">
            	 		<label>Your department Level for the course</label>
            	 		<select name="myprogrammelevel" class="form-control" id="course">
            	 			<option value="{{$departmentCourse->programme_level_id}}">{{optional($departmentCourse->programmeLevel)->name}}</option>
            	 			@foreach($programme->programmeLevels as $programmeLevel)
            	 			    @if(optional($departmentCourse->programmeLevel)->id != $programmeLevel->id)
                                    <option value="{{$programmeLevel->id}}">
                                 	{{$programmeLevel->name}}
                                    </option>
                                @endif
                            @endforeach
            	 		</select>
            	 	</div>

            	 	<button class="btn btn-success btn-block shadow">Register</button>
            	</form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- end modal -->