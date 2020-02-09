    <tr>
    	<td>
    		{{strtoupper($registration->sessionRegistration->student->first_name)}} {{strtoupper($registration->sessionRegistration->student->last_name)}}
    	</td>

    	<td>
    		{{$registration->sessionRegistration->student->admission->admission_no}}
    	</td>

    	<td >
    		@foreach($registration->courseRegistrations->where('cancelation_status',0) as $course_registration)
    		    {{$course_registration->course->code}}<br>
    		@endforeach
    	</td>

    	<td>
    		@foreach($registration->courseRegistrations->where('cancelation_status',0) as $course_registration)
    		{{$course_registration->course->unit}}<br>
    		@endforeach
    	</td>

    	<td>
    		@foreach($registration->courseRegistrations->where('cancelation_status',0) as $course_registration)
    		    @if($course_registration->result->waved())
                    <i><strong class="h4">{{$course_registration->result->grade}}</strong></i>
    		    @else
                    {{$course_registration->result->grade}}
    		    @endif
    		    <br>
    		@endforeach
    	</td>

    	<td>
        	@foreach($registration->courseRegistrations->where('cancelation_status',0) as $course_registration)
    		{{number_format($course_registration->result->points,2)}}<br>
    		@endforeach
    	</td>
            
    	<td>
    		@foreach($registration->courseRegistrations->where('cancelation_status',0) as $course_registration)
    		{{number_format($course_registration->course->unit * $course_registration->result->points,2)}}
    		<br>
    		@endforeach
    	</td>
            
    	<td>
    		@foreach($registration->courseRegistrations->where('cancelation_status',0) as $course_registration)
	    		@if($course_registration->result->grade == 'F')
	    		    <a href="{{route($route ?? 'exam.officer.result.student.wave.register',[$course_registration->result->id])}}" style="color: white"><button class="btn btn-warning">Wave {{$course_registration->course->code}}</button></a>
	    		@endif
	    		@if($course_registration->result->waved())
                    <a href="{{route($route ?? 'exam.officer.result.student.wave.register',[$course_registration->result->id])}}" style="color: white"><button class="btn btn-warning">Un Wave {{$course_registration->course->code}}</button></a>
	    		@endif
    		@endforeach
    	</td>
    </tr>