<!-- modal -->
<div class="modal fade" id="newHeadOfDepartment" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">	
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
            	<form action="{{route('admin.college.department.management.hod.appoint',
                    [$department->id])}}" method="post">
                     @csrf
                    <div class="form-group">
                        <label>Lecturer</label>
                        <select class="form-control" name="lecturer">
                        	<option value="">Lecturer Name</option>
                        	@foreach($department->lecturers() as $lecturer)
                        	    @if(!$lecturer->staff->headOfDepartment)
                                    <option value="{{$lecturer->id}}">{{$lecturer->staff->first_name}} {{$lecturer->staff->last_name}}</option>
                                @endif    
                        	@endforeach
                        </select> 
                        @error('lecturer')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <button class="btn-block button-fullwidth cws-button bt-color-3">Register Appointment</button>  
                </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- end modal -->