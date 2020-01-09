@extends('student::layouts.master')

@section('page-content')
<input type="checkbox" name="">
<div class="col-md-1"></div>
<div class="col-md-10">
	@foreach(student()->sessionRegistrations as $session_registration)
	<div class="card">
		<div class="card-header button-fullwidth cws-button bt-color-3">{{$session_registration->level->name}} Courses Result</div>
		<div class="card-body">
			@if($session_registration->hasApprovedResult())
			<table class="table">
				<head>
					<tr>
						<td>S/N</td>
						<td>Course Code</td>
						<td>Course Unit</td>
						<td>CA Score</td>
						<td>Exam Score</td>
						<td>Total Score</td>
						<td>Grade</td>
						<td>Remark</td>
					</tr>
				</head>
				<tbody>
					@foreach($session_registration->semesterRegistrations->where('cancelation_status',0) as $semester_registration)
						@foreach($semester_registration->courseRegistrations->where('cancelation_status',0) as $course_registration)    				
							@if($course_registration->result->approved())
							<tr>
								<td>{{$loop->index+1}}</td>
								<td>{{$course_registration->course->code}}</td>
								<td>{{$course_registration->course->unit}}</td>
								<td>
									{{$course_registration->result->ca}}
								</td>
								<td>
									{{$course_registration->result->exam}}
								</td>
								<td>
									{{$course_registration->result->accessment() + $course_registration->result->examination()}}
								</td>
								<td>
									{{$course_registration->result->grade}}
								</td>
								<td>
									{{$course_registration->result->remark ? $course_registration->result->remark->name : ' '}}
								</td>
							</tr>
							@endif
						@endforeach
					@endforeach
                    <tr>
                    	<td></td>
                    	<td></td>
                    	<td></td>
                    	<td></td>
                    	<td></td>
                    	<td><b>G P</b></td>
                    	<td><b>{{number_format($session_registration->sessionGrandPoints(),2)}}</b></td>
                    </tr>
				</tbody>
			</table>	
			@else
				<div class="alert alert-danger text-center h4">
					{{'Sorry none of your registered courses result are available for '.$session_registration->session->name}}
				</div>
            @endif
		</div>
	</div><br>
	@endforeach
</div> 
@endsection
