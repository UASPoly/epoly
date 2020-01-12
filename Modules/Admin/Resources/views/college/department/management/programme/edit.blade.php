<!-- modal -->
<div class="modal fade" id="programme_{{$departmentProgramme->id}}" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">	
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
            	<form action="{{route('admin.college.department.management.programme.update',
                    [str_replace(' ','-',strtolower($department->name)),
                    $department->id,$departmentProgramme->id])}}" method="post">
                    @csrf
                    <input type="hidden" name="departmentProgrammeId" value="{{$departmentProgramme->id}}">
                    <input type="hidden" name="departmentId" value="{{$department->id}}">
                    <div class="form-group">
                        <label>Choose Programme</label>
                        <select name="programmeId" class="form-control">
                            <option value="{{$departmentProgramme->programme->id}}">{{$departmentProgramme->programme->name}}</option>
                            @foreach(admin()->programmes() as $programme)
                                @if($departmentProgramme->programme->id != $programme->id)
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
                        <input type="number" name="code" class="form-control" min="1" value="{{$departmentProgramme->code}}">
                        @error('code')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Add Schedule</label>
                        <select name="scheduleAdd" class="form-control">
                            <option value="">Select Schedule</option>
                            @if(!$departmentProgramme->hasMorningSchedule())
                                <option value="1">Morning Schedule</option>
                            @endif
                            @if(!$departmentProgramme->hasEveningSchedule())
                                <option value="2">Evening Schedule</option>
                            @endif

                        </select>
                    </div>
                    <div class="form-group">
                        <label>Remove Schedule</label>
                        <select name="scheduleRemove" class="form-control">
                            <option value="">Select Schedule</option>
                            @if($departmentProgramme->hasMorningSchedule())
                                <option value="1">Morning Schedule</option>
                            @endif
                            @if($departmentProgramme->hasEveningSchedule())
                                <option value="2">Evening Schedule</option>
                            @endif

                        </select>
                    </div>
                    <button class="btn-block button-fullwidth cws-button bt-color-3">Update</button>  
                </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- end modal -->