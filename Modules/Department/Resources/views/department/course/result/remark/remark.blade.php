<!-- modal -->
<div class="modal fade" id="registration_{{$registration->id}}_remark" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">	
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
            	<form action="{{route($route ?? 'department.result.remark.register',[request()->route('semester_id')])}}" method="post">
            		@csrf
            		<input type="hidden" name="registration_id" value="{{$registration->id}}">
	            	<select class="form-control" name="remark">
	            		<option value="">Remark</option>
	            		@foreach($registration->remarks() as $remark)
	                        <option value="{{$remark->id}}">{{$remark->name}}</option>
	            		@endforeach
	            	</select><br>
	            	<select class="form-control" name="course">
	            		<option value="">Course</option>
	            		@foreach($registration->semesterRegistrations->where('semester_id',request()->route('semester_id'))->where('cancelation_status',0) as $semester_registration)
	            		    @foreach($semester_registration->courseRegistrations->where('cancelation_status',0) as $course_registration)
		                        <option value="{{$course_registration->course->id}}">{{$course_registration->course->code}}</option>
		            		@endforeach
	            		@endforeach
	            	</select><br>
	            	<button class="button-fullwidth cws-button bt-color-3 btn-block">
		            	Register
		            </button>
	            </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- end modal -->