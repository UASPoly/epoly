<!-- modal -->
<div class="modal fade" id="session" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
            <b class="text text-success">{{currentSession()->name}} Session Information</b>	
            </div>

            <div class="modal-body">
            	<form action="{{route('admin.college.calendar.management.session.update')}}" method="post">
            		@csrf
            		<label class="text text-success">Session Start</label>
            		<input type="date" name="start" value="{{currentSession()->start}}" class="form-control">
		            @error('name')
		                <span class="invalid-feedback" role="alert">
		                    <strong>{{ $message }}</strong>
		                </span>
		            @enderror

            		<label class="text text-success">Session End</label>
            		<input type="date" name="end" value="{{currentSession()->end}}" class="form-control">
		            @error('name')
		                <span class="invalid-feedback" role="alert">
		                    <strong>{{ $message }}</strong>
		                </span>
		            @enderror
		            <br>
		            <button name="update" value="session" class="btn btn-block button-fullwidth cws-button bt-color-3">Update {{currentSession()->name}} Session</button>
            	</form>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- end modal -->
