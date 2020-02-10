<div class="modal fade shadow" id="schedules_{{$programme->id}}" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
        	<div class="modal-header">
	        	<h5>Registered schdules for {{$programme->title}}</h5>
	        </div>
            <div class="modal-body">
                <table class="table shadow">
                	<thead>
                		<tr>
	                		<th>Name</th>
	                		<th>Created at</th>
	                		<th>Updated at</th>
                		</tr>
                	</thead>
                	<tbody>
                	@foreach($programme->programmeSchedules as $programmeSchedule)
                        <tr>
                        	<td>{{$programmeSchedule->schedule->name}}</td>
                        	<td>{{$programmeSchedule->created_at}}</td>
                        	<td>{{$programmeSchedule->updated_at}}</td>
                        </tr>
                	@endforeach
                	</tbody>
                </table>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- end modal -->