<!-- modal -->
<div class="modal fade" id="state_{{$state->id}}" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header shadow">	
                <h4>{{$state->name}} State Information</h4>
            </div>
            <div class="modal-body">
            	<form action="{{route('admin.state.update',[$state->id])}}" method="post">
            		@csrf
            		<div class="form-group">
                    	<label>State Name</label>
                        <input type="text" name="name" class="form-control" value="{{$state->name}}">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                    	<button class="btn-block button-fullwidth cws-button bt-color-3">Update</button>
                    </div>
            	</form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- end modal -->