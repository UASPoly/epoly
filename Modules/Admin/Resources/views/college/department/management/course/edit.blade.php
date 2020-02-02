<!-- modal -->
<div class="modal fade" id="course_{{$course->id}}" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">	
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
            	<form action="{{route('admin.college.department.management.course.update',
                    [$department->id,$course->id])}}" method="post">
                    @csrf
                    
                    <div class="form-group">
                        <label>Course Title</label>
                        <input type="hidden" name="courseID" value="{{$course->id}}">   
                        <input type="text" name="title" class="form-control" id="programme" value="{{$course->title}}">   
                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Course Code</label>
                        <input type="text" name="code" class="form-control" id="programme" value="{{$course->code}}">   
                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Course Unit</label>
                        <input type="number" name="unit" class="form-control" id="programme" value="{{$course->unit}}">   
                        @error('unit')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Level</label>
                        <select class="form-control" name="level">
                        	<option value="{{optional($course->programmeLevel)->id}}">{{optional($course->programmeLevel)->name}}</option>
                        	@foreach($course->department->programmeLevels() as $level)
                        	    @if($level->id != optional($course->programmeLevel)->id) 
                                <option value="{{$level->id}}">
                                	{{$level->name}}
                                </option>
                                @endif
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
                        	<option value="{{$course->semester->id}}">{{$course->semester->name}}</option>
                        	@foreach(admin()->semesters() as $semester)
                        	    @if($semester->id != $course->semester->id )
                                <option value="{{$semester->id}}">
                                	{{$semester->name}}
                                </option>
                                @endif
                        	@endforeach
                        </select>
                        @error('semester')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Programme</label>
                        <select class="form-control" name="programme">
                        	<option value="{{$course->programme ? $course->programme->id : ''}}">{{$course->programme ? $course->programme->title : 'Select Programme'}}</option>
                        	@foreach($course->department->programmes as $programme)
                                <option value="{{$programme->id}}">
                                	{{$programme->title}}
                                </option>
                        	@endforeach
                        </select>
                        @error('code')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
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