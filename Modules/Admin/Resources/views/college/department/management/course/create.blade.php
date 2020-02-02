<!-- modal -->
<div class="modal fade" id="newCourse" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">	
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
            	<form action="{{route('admin.college.department.management.course.register',
                    [$department->id])}}" method="post">
                    @csrf
                    
                    <div class="form-group">
                        <label>Course Title</label>
                        <input type="text" name="title" class="form-control" id="programme" value="{{old('title')}}">   
                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Course Code</label>
                        <input type="text" name="code" class="form-control" id="programme" value="{{old('code')}}">   
                        @error('code')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Course Unit</label>
                        <input type="text" name="unit" class="form-control" id="programme" value="{{old('unit')}}">   
                        @error('unit')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Programme</label>
                        <select class="form-control" name="level">
                            <option value="">Select Programme</option>
                            @foreach($department->programmes as $programme)
                                <option value="{{$programme->id}}">
                                    {{$programme->title}}
                                </option>
                            @endforeach
                        </select>
                        @error('programme')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label>Level</label>
                        <select class="form-control" name="level">
                        	<option value="">Select Level</option>
                        	@foreach($department->programmeLevels() as $level)
                                <option value="{{$level->id}}">
                                	{{$level->name}}
                                </option>
                        	@endforeach
                        </select>
                        @error('level')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Semester</label>
                        <select class="form-control" name="semester">
                        	<option value="">Select Semester</option>
                        	@foreach(admin()->semesters() as $semester)
                                <option value="{{$semester->id}}">
                                	{{$semester->name}}
                                </option>
                        	@endforeach
                        </select>
                        @error('semester')
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