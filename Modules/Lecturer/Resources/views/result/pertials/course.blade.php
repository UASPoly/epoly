
<select class="form-control" name="course">
	<option value="">Course</option>
	@if(lecturer())
		@foreach(lecturer()->lecturerCourses->where('is_active',1) as $lecturer_course)
		    @if($lecturer_course->course->hasRegisteredStudent())
		    <option value="{{$lecturer_course->id}}">
		    	{{$lecturer_course->course->code}}/{{$lecturer_course->department->name}}
		    </option>
		    @endif
		@endforeach
	@else
		<optgroup label="My Courses">
		    @foreach($lecturer->lecturerCourses->where('is_active',1) as $lecturer_course)
			    @if(!$lecturer_course->hasUploadedCurrentSessionResult() && $lecturer_course->course->hasRegisteredStudent())
			    <option value="{{$lecturer_course->id}}">
			    	{{$lecturer_course->course->code}}/{{$lecturer_course->department->name}}
			    </option>
			    @endif
			@endforeach
	    </optgroup>
	    <optgroup label="Other Lecturer Courses">
	    	@foreach(department()->staffs as $staff)
	    	    @if($staff->lecturer->id != $lecturer->id)
				    @foreach($staff->lecturer->lecturerCourses->where('is_active',1) as $lecturer_course)
					    @if(!$lecturer_course->hasUploadedCurrentSessionResult() && $lecturer_course->course->hasRegisteredStudent())
					    <option value="{{$lecturer_course->id}}">
					    	{{$lecturer_course->course->code}}/{{$lecturer_course->department->name}}
					    </option>
					    @endif
					@endforeach
			    @endif
			@endforeach
	    </optgroup>
	@endif
</select>