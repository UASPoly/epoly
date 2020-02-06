<!-- modal -->
<div class="modal fade" id="lga_{{$lga->id}}" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header shadow">	
                <h4>{{$lga->name}} local government Information</h4>
            </div>
            <div class="modal-body">
            	<form action="{{route('admin.state.lga.update',[$lga->state->id,$lga->id])}}" method="post">
            		@csrf
            		<div class="form-group">
                    	<label>LGA Name</label>
                        <input type="text" name="name" class="form-control" value="{{$lga->name}}">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                    	<label>State Name</label>
                        <select name="state_id" class="form-control">
                        	<option value="{{$lga->state->id}}">{{$lga->state->name}}</option>
                        	@foreach(admin()->states() as $state)
                        	    @if($state->id != $lga->state->id)
                                    <option value="{{$state->id}}">{{$state->name}}</option>
                                @endif
                        	@endforeach
                        </select>
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