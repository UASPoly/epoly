<!-- modal -->
<div class="modal fade" id="newProgramme" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">	
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
            	<form>
                    
                    <div class="form-group">
                        <label>Choose Programme</label>
                        <select name="programme" class="form-control">
                            <option value="">Programme</option>
                            @foreach(admin()->programmes() as $programme)
                                @if(!$department->hasThisProgramme($programme))
                                <option value="{{$programme->id}}">{{$programme->name}}</option>
                                @endif
                            @endforeach
                        </select>
                        @error('programme')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Programme Code</label>
                        <input type="number" name="code" class="form-control" min="1">
                        @error('code')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
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