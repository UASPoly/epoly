<!-- modal -->
<div class="modal fade" id="result_{{$lecturer_course->course->id}}" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">	
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
            	<form action="{{route('lecturer.result.upload.upload')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="course" value="{{$lecturer_course->course->id}}">
                    <input type="hidden" name="session" value="{{currentSession()->id}}">
                    <input type="hidden" name="department" value="{{$lecturer_course->department->id}}">

                    <label>Choose the result sheet you have dowloaded at {{currentSession()->name}} for {{$lecturer_course->course->code}}</label>
                    <input type="file" name="result" class="form-control"><br>
                    <button class="btn-block button-fullwidth cws-button bt-color-3">Upload Result</button>
                </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- end modal -->