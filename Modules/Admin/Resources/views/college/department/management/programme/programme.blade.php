<!-- modal -->
<div class="modal fade" id="newProgramme" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">	
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
            	<form action="{{route('admin.college.department.management.programme.register',
        [str_replace(' ','-',strtolower($department->name)),$department->id])}}" method="post">
        @csrf
                    <input type="hidden" name="departmentId" value="{{$department->id}}">
                    <div class="form-group">
                        <label>Choose Programme</label>
                        <input type="text" list="Programme">
                        <datalist name="programme" class="form-control" id="programme">
                            <option value="">Programme</option>
                            @foreach(admin()->programmes() as $programme)
                                @if(!$department->hasThisProgramme($programme))
                                <option value="{{$programme->id}}">{{$programme->name}}</option>
                                @endif
                            @endforeach
                        </datalist>
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
                    <button class="btn-block button-fullwidth cws-button bt-color-3">Register</button>  
                </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- end modal -->