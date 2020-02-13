<div class="modal fade shadow" id="borrowCourse" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
        	<div class="modal-header shadow">
	        	<h5>Borrow the course from other department and add them to {{$programme->title}}</h5>
	        </div>
            <div class="modal-body">
            	<form>
            		<input type="hidden" name="myprogramme" value="{{$programme->id}}">
            	 	<div class="form-group">
            	 		<label>Department</label>
            	 		<select name="department" class="form-control">
            	 			<option value="">Select Department</option>
            	 			@foreach($departments as $department)
            	 			    @if($department->id != department()->id)
                                    <option value="{{$department->id}}">
                                    	{{$department->name}}
                                    </option>
                                @endif
            	 			@endforeach
            	 		</select>
            	 	</div>

            	 	<div class="form-group">
            	 		<label>Programme</label>
            	 		<select name="programme" class="form-control" id="programme">
            	 			<option value="">Select Programme</option>
            	 		</select>
            	 	</div>

            	 	<div class="form-group">
            	 		<label>Course</label>
            	 		<select name="course" class="form-control" id="course">
            	 			<option value="">Select Course</option>
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