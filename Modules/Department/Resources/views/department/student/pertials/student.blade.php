@if(count($students)>0)
<div class="col-md-12">
	<br>
	<div class="card">
		<div class="card-body table-responsive">
			  <table class="table">
		     	<thead>
		     		<tr>
		     			<th>S/N</th>
		     			<th>Picture</th>
		     			<th>Name</th>
		     			<th>Admission No</th>
		     			<th>State</th>
		     			<th>Local Government</th>
		     		</tr>
		     	</thead>
		     	<tbody>
		     		@foreach($students as $student)
		     		<tr>
		     			<td>{{$loop->index+1}}</td>
		     			<td>
		     				<img src="{{storage_url($student->studentAccount->picture)}}" width="50" height="50">
		     			</td>
		     			<td>
		     				{{$student->first_name}} 
		     				{{$student->middle_name}} 
		     				{{$student->last_name}}
		     			</td>
		     			<td>
		     				{{$student->admission->admission_no}}
		     			</td>
		     			<td>
		     				{{$student->studentAccount->lga->state->name}}
		     			</td>
		     			<td>
		     				{{$student->studentAccount->lga->name}}
		     			</td>
		     		</tr>
		     		@endforeach
		     	</tbody>
		    </table>
		</div>
	</div>
	@else
	<div class="alert alert-danger">The are no registered student found in the state</div>
	@endif
</div>   
	    