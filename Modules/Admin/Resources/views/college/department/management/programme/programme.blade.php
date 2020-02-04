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
                        <label>Programme Name</label>
                        <input type="text" name="name" class="form-control" id="programme" placeholder="NATIONAL DIPLOMA IN COMPUTER SCIENCE">   
                        @error('programme')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Programme Abbreviation</label>
                        <input type="text" name="title" class="form-control" id="programme" placeholder="NDCS">   
                        @error('title')
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
                    <div class="form-group">
                        <label>Programme Type</label>
                        <select class="form-control" name="type">
                            <option value="">Programme Type</option>
                            @foreach(admin()->programmeTypes() as $programmeType)
                                 <option value="{{$programmeType->id}}">{{$programmeType->name}}</option>
                            @endforeach
                        </select>
                        @error('programme_type_id')
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