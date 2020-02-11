<div class="modal fade shadow" id="reserved_{{$programme->id}}" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
        	<div class="modal-header">
	        	<h5>Reserveed admissions for {{$programme->title}}</h5>
	        </div>
            <div class="modal-body">
            	@if(count($programme->reservedDepartmentSessionAdmissions) == 0)
                    <div class="alert alert-danger">No reservation of admission number found</div>
                @else
                <table class="table shadow">
                	<thead>
                		<tr>
	                		<th>Admission Number</th>
	                		<th>Schedule</th>
	                		<th>Created at</th>
	                		<th>Updated at</th>
	                		<th></th>
                		</tr>
                	</thead>
                	<tbody>
                	@foreach($programme->reservedDepartmentSessionAdmissions as $reserved)
                        <tr>
                        	<td>{{$reserved->admission_no}}</td>
                        	<td>{{$reserved->schedule->name}}</td>
                        	<td>{{$reserved->created_at}}</td>
                        	<td>{{$reserved->updated_at}}</td>
                        	<td>
                        		<a href="{{route('exam.officer.student.admission.register.generated.number.index',[$reserved->admission_no,$programme->id])}}">
                        			<button class="btn btn-success">Use It</button>
                        		</a>
                        	</td>
                        </tr>
                	@endforeach
                	</tbody>
                </table>
                @endif
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- end modal -->