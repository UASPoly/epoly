<!-- modal -->
<div class="modal fade" id="lecture_{{$semesterCalendar->semester_id}}" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
            <b class="text text-success">{{currentSession()->name}} {{$semesterCalendar->semester->name}} Lecture Calendar Information</b>    
            </div>

            <div class="modal-body">
                <form action="{{route('admin.college.calendar.management.session.update')}}" method="post">
                    @csrf
                    <input type="hidden" name="semester_id" value="{{$semesterCalendar->semester_id}}">
                    <label class="text text-success">Lecture Start</label>
                    <input type="date" name="start" value="{{$semesterCalendar->lectureCalendar->start}}" class="form-control">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                    <label class="text text-success">Lecture End</label>
                    <input type="date" name="end" value="{{$semesterCalendar->lectureCalendar->end}}" class="form-control">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <br>
                    <button name="update" value="lecture" class="btn btn-block button-fullwidth cws-button bt-color-3">Update {{currentSession()->name}} Lecture Calendar</button>
                </form>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- end modal -->
