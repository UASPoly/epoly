<div class="col-md-12"><br>
     	<div class="card">
     		<div class="card-body">
     			<table class="table">
     				<thead>
     					<tr>
     						<td>S/N</td>
     						<td>Name</td>
     						<td>ADMISSION NO</td>
     						<td>COURSES</td>
     						<td>UNITS</td>
     						<td>GRADES</td>
     						<td>REMARKS</td>
     						<td></td>
     					</tr>
     				</thead>
     				<tbody>
     					@foreach($registrations as $registration)
                            <tr>
                            	<td>
                            		{{$loop->index+1}}
                            	</td>
                            	<td>
                            		{{$registration->student->first_name}} {{$registration->student->last_name}}
                            	</td>
                            	<td>
                            		{{$registration->student->admission->admission_no}}
                            	</td>
                            	<td>
                            		@foreach($registration->semesterRegistrations->where('semester_id',request()->route('semester_id'))->where('cancelation_status',0) as $semester_registration)
	                            		@foreach($semester_registration->courseRegistrations->where('cancelation_status',0) as $course_registration)
	                            		    {{$course_registration->course->code}}<br>
	                            		@endforeach
                            		@endforeach
                            	</td>
                            	<td>
                            		@foreach($registration->semesterRegistrations->where('semester_id',request()->route('semester_id')) as $semester_registration)
	                            		@foreach($semester_registration->courseRegistrations->where('cancelation_status',0) as $course_registration)
	                            		{{$course_registration->course->unit}}<br>
	                            		@endforeach
                            		@endforeach
                            	</td>
                            	<td>
                            		@foreach($registration->semesterRegistrations->where('semester_id',request()->route('semester_id')) as $semester_registration)
	                            		@foreach($semester_registration->courseRegistrations->where('cancelation_status',0) as $course_registration)
	                            		{{$course_registration->result->grade}}<br>
	                            		@endforeach
                            		@endforeach
                            	</td>
                            	<td>
                            		<!-- if all the courses of the session has been uploaded and failed all of them -->
					        		@if($registration->allCoursesUploaded() && $registration->passedResults() == 0)
					                     WITH DRAW
					        		@else
					        		<!-- check if the student passed all his courses of the session -->

					            		@if($registration->allCoursesUploaded() && empty($registration->failedResults()))
					                        PASSED <br>
					            		@else
					            		<!-- check if the student has any course to repeat -->
					                        @foreach($registration->semesterRegistrations->where('semester_id',request()->route('semester_id')) as $semesterRegistration)
                                                @foreach($semesterRegistration->failedResults() as $course)
    					                            RPT {{$course->code}}<br>
                                                @endforeach
					                        @endforeach
					            		@endif
					            	@endif
					            	<!-- check if the student has sessional EMC verdict -->
					            	@foreach($registration->sessionRegistrationRemarks as $emc_remark)
					                    {{'EMC'}} {{$emc_remark->remark->name}} <br>
					            	@endforeach
					            	<!-- check if the student has Semester EMC verdict -->
					            	@foreach($registration->semesterRegistrations as $semesterRegistration)
					            	    @foreach($semesterRegistration->semesterRegistrationRemarks as $emc_remark)
					                        {{'EMC'}} {{$emc_remark->remark->name}} <br>
					            	    @endforeach
					            	@endforeach
                            	</td>
                            	<td>
                            		<button class="btn btn-info" data-toggle="modal" data-target="#registration_{{$registration->id}}_remark">Remark</button>
                            	</td>
                            	
                            </tr>
                            @include('department::department.course.result.remark.remark')
     					@endforeach
     				</tbody>
     			</table>
     			
     		</div>
     	</div>
    </div>