
<select class="form-control" name="course">
	<option value="">Course</option>
	@if(lecturer())
		@foreach(lecturer()->lecturerCourses->where('is_active',1) as $lecturerCourse)
		    @if($lecturerCourse->hasRegisteredStudent())
		    <option value="{{$lecturerCourse->id}}">
		    	{{$lecturerCourse->course->code}}/{{$lecturerCourse->department->name}}
		    </option>
		    @endif
		@endforeach
	@else
		<optgroup label="My Courses">
		    @foreach(examOfficer()->lecturer->lecturerCourses->where('is_active',1) as $lecturerCourse)
			    @if(!$lecturerCourse->hasUploadedCurrentSessionResult() && $lecturerCourse->hasRegisteredStudent())
			    <option value="{{$lecturerCourse->id}}">
			    	{{$lectureCourse->course->code}}/{{$lectureCourse->department->name}}
			    </option>
			    @endif
			@endforeach
	    </optgroup>
	    <optgroup label="Other Lecturer Courses">
	    	@foreach(department()->courses as $course)
		    	@foreach($course->lecturerCourses->where('is_active',1) as $lecturerCourse)
				    @if($lecturerCourse->hasRegisteredStudent())
				    <option value="{{$lecturerCourse->id}}">
				    	{{$lecturerCourse->course->code}}/{{$lecturerCourse->department->name}}
				    </option>
				    @endif
				@endforeach
			@endforeach
	    </optgroup>
	@endif
</select>