<div class="modal fade shadow" id="allocation_{{$course->id}}" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
        	<div class="modal-header">
	        	<h5>{{$course->code}} Lecturer course allocation</h5>
	        </div>
            <div class="modal-body">
            	<form action="{{route('department.programme.course.allocation.register',[$programme->id])}}" method="post">
            		@csrf
            		<input type="hidden" name="course_id" value="{{$course->id}}">
            		<div class="form-group">
	            		<label>Lecturer</label>
	            		<select name="lecturer_id" class="form-control">
	            			<option value="{{$course->courseLecturer() ? $course->courseLecturer()->id : ''}}">{{$course->courseLecturer() ? $course->courseLecturer()->staff->first_name.' '.$course->courseLecturer()->staff->last_name.' '.$course->courseLecturer()->staff->staffID : 'Lecturer'}}</option>
	    				@foreach(department()->staffs as $staff)
	                        @if($staff->staffType->name == 'Lecturer')
	                            @if(!$course->courseLecturer() || $course->courseLecturer() && $staff->lecturer->id != $course->courseLecturer()->id )
	                                <option value="{{$staff->lecturer->id}}">{{$staff->first_name}} {{$staff->last_name}}</option>
	                            @endif
	                        @endif
	    				@endforeach
	            		</select>
                    </div>
                    @if($course->department->id == department()->id)
                        <input type="hidden" name="department_id" value="{{department()->id}}">
	            	@else
                    <div class="form-group">
	            		<label>Department</label>
	            		<select name="department_id" class="form-control">
	            			<option value="">Department</option>
	    				    @foreach($course->departmentCourses as $departmentCourse)
	                            <option value="{{$departmentCourse->department->id}}">{{$departmentCourse->department->name}}</option>
	    				    @endforeach
	            		</select>
                    </div>
                    @endif
                    <div class="form-group">
                    	<button class="btn btn-success btn-block">Register</button>
                    </div>
            	</form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- end modal -->