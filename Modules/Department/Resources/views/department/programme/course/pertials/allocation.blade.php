<div class="modal fade shadow" id="allocation_{{$departmentCourse->id}}" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
        	<div class="modal-header">
	        	<h5>{{$departmentCourse->department->name}} Lecturer course allocation for {{$departmentCourse->course->code}}</h5>
	        </div>
            <div class="modal-body">
            	<form action="{{route('department.programme.course.allocation.register',[$programme->id])}}" method="post">
            		@csrf
            		<input type="hidden" name="course_id" value="{{$departmentCourse->course->id}}">
            		<div class="form-group">
	            		<label>Lecturer</label>
	            		<select name="lecturer_id" class="form-control">
	            			<option value="{{$departmentCourse->courseLecturer() ? $departmentCourse->courseLecturer()->id : ''}}">{{$departmentCourse->courseLecturer() ? $departmentCourse->courseLecturer()->staff->first_name.' '.$departmentCourse->courseLecturer()->staff->last_name.' '.$departmentCourse->courseLecturer()->staff->staffID : 'Lecturer'}}</option>
	    				@foreach(department()->staffs as $staff)
	                        @if($staff->staffType->name == 'Lecturer')
	                            @if(!$departmentCourse->courseLecturer() || $departmentCourse->courseLecturer() && $staff->lecturer->id != $departmentCourse->courseLecturer()->id )
	                                <option value="{{$staff->lecturer->id}}">{{$staff->first_name}} {{$staff->last_name}}</option>
	                            @endif
	                        @endif
	    				@endforeach
	            		</select>
                    </div>
                    
                    <input type="hidden" name="department_id" value="{{$departmentCourse->department->id}}">
	            	
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