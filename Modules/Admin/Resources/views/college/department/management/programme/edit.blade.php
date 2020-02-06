<!-- modal -->
<div class="modal fade" id="programme_{{$programme->id}}" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">	
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
            	<form action="{{route('admin.college.department.management.programme.update',
                    [$department->id,$programme->id])}}" method="post">
                    @csrf
                    <input type="hidden" name="programmeId" value="{{$programme->id}}">
                    <input type="hidden" name="departmentId" value="{{$department->id}}">
                    <div class="form-group">
                        <label>Programme Name</label>
                        <input type="text" name="name" value="{{$programme->name}}">
                        @error('programme')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Programme Title</label>
                        <input type="text" name="title" value="{{$programme->title}}">
                        @error('programme')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Programme Code</label>
                        <input type="number" name="code" class="form-control" min="1" value="{{$programme->code}}">
                        @error('code')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Programme Type</label>
                        <select class="form-control" name="type">
                            <option value="{{optional($programme->programmeType)->id ?? null}}">{{optional($programme->programmeType)->name ?? 'Programme Type'}}</option>
                            @foreach(admin()->programmeTypes() as $programmeType)
                                @if(optional($programme->programmeType)->id != $programmeType->id)
                                    <option value="{{$programmeType->id}}">{{$programmeType->name}}</option>
                                @endif
                            @endforeach
                        </select>
                        @error('type')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Add Schedule</label>
                        <select name="scheduleAdd" class="form-control">
                            <option value="">Select Schedule</option>
                            @if(!$programme->hasMorningSchedule())
                                <option value="1">Morning Schedule</option>
                            @endif
                            @if(!$programme->hasEveningSchedule())
                                <option value="2">Evening Schedule</option>
                            @endif

                        </select>
                    </div>
                    <div class="form-group">
                        <label>Remove Schedule</label>
                        <select name="scheduleRemove" class="form-control">
                            <option value="">Select Schedule</option>
                            @if($programme->hasMorningSchedule())
                                <option value="1">Morning Schedule</option>
                            @endif
                            @if($programme->hasEveningSchedule())
                                <option value="2">Evening Schedule</option>
                            @endif

                        </select>
                    </div>
                    <button class="btn btn-block button-fullwidth cws-button bt-color-3 shadow">Update</button>  
                </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- end modal -->