@php
    if(headOfDepartment()){
        $lecturer = headOfDepartment()->staff->lecturer;
	}elseif(examOfficer()){
		$lecturer = examOfficer()->lecturer;
	}else{
		$lecturer = lecturer();
	}
@endphp
<select class="form-control" name="course">
	<option value="">Course</option>
	@if(lecturer())
		@foreach($lecturer->lecturerCourses->where('lecturer_course_status_id',2) as $lecturer_course)
		    @if(!$lecturer_course->hasUploadedCurrentSessionResult() && $lecturer_course->is_active == 1 && $lecturer_course->course->hasRegisteredStudent())
		    <option value="{{$lecturer_course->course->id}}">
		    	{{$lecturer_course->course->code}}
		    </option>
		    @endif
		@endforeach
	@else
		<optgroup label="My Courses">
		    @foreach($lecturer->lecturerCourses->where('lecturer_course_status_id',2) as $lecturer_course)
			    @if(!$lecturer_course->hasUploadedCurrentSessionResult() && $lecturer_course->is_active == 1 && $lecturer_course->course->hasRegisteredStudent())
			    <option value="{{$lecturer_course->course->id}}">
			    	{{$lecturer_course->course->code}}
			    </option>
			    @endif
			@endforeach
	    </optgroup>
	    <optgroup label="Other Lecturer Courses">
	    	@foreach(department()->staffs as $staff)
	    	    @if($staff->lecturer->id != $lecturer->id)
				    @foreach($staff->lecturer->lecturerCourses->where('lecturer_course_status_id',2) as $lecturer_course)
					    @if(!$lecturer_course->hasUploadedCurrentSessionResult() && $lecturer_course->is_active == 1 && $lecturer_course->course->hasRegisteredStudent())
					    <option value="{{$lecturer_course->course->id}}">
					    	{{$lecturer_course->course->code}}
					    </option>
					    @endif
					@endforeach
			    @endif
			@endforeach
	    </optgroup>
	@endif
</select>