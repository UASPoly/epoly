<!-- modal -->
<div class="modal fade" id="activate_session" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">	
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
            	<form action="{{route('admin.session.activate.register')}}" method="post">
            		@csrf
	            	<select class="form-control" name="session">
	            		<option value="{{currentSession()->id}}">{{currentSession()->name}}</option>
	            		@foreach(sessions() as $session)
	            		    @if($session->id != currentSession()->id)
	                            <option value="{{$session->id}}">{{$session->name}}</option>
	                        @endif
	            		@endforeach
	            	</select><br>
	            	<button class="button-fullwidth cws-button bt-color-3 btn-block">
		            	Activate
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