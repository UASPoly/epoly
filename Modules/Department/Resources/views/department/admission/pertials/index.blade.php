<div class="col-md-12">
	<br>
	<div class="card shadow">
		<div class="card-header shadow">
			<h5 class="center">LIST OF REGISTERED STUDENTS IN {{strtoupper(department()->name)}}  FOR {{$session->name}} SESSION</h5>
		</div>
		<div class="card-body">
			@if(count(department()->admissions->where('session_id',$session->id))>0)
			    <table class="table shadow" id="admission-table">
			     	<thead>
			     		<tr>
			     			<th>S/N</th>
			     			<th>Name</th>
			     			<th>Admission No</th>
			     			<th>Schedule</th>
			     			<th>Programme</th>
			     			<th>Phone</th>
			     			<th>Status</th>
			     			<th></th>
			     		</tr>
			     	</thead>
			     	<tbody>
			     		@foreach(department()->admissions->where('session_id',$session->id) as $admission)
			     		<tr>
			     			<td>{{$loop->index+1}}</td>
			     			<td>
			     				{{$admission->student->first_name}} 
			     				{{$admission->student->middle_name}}    
			     				{{$admission->student->last_name}}
			     			</td>
			     			<td>{{$admission->admission_no}}</td>
			     			<td>{{$admission->student->schedule->name}}</td>
			     			<td>{{$admission->programme->title}}</td>
			     			<td>{{$admission->student->phone}}</td>
			     			<td>{{$admission->student->is_active == 1 ? 'Active' : 'Revoked'}}</td>
			     			<td>
			     				<button class="btn btn-danger shadow" onclick="confirm('Are you sure you want to delete this student from the list of students in this department')"><a href="{{route($route['delete'] ?? 'department.admission.delete',['admission_id'=>$admission->id])}}" style="color: white">Delete</a> </i>
			     				</button>

			     				<button class="btn btn-info shadow">
			     					<a href="{{route($route['view'] ?? 'department.admission.edit',[$admission->student->id])}}" style="color: white">View</a></i>
			     				</button>

			     				<button class="btn btn-warning shadow" ><a href="{{route($route['revoke'] ?? 'department.admission.revoke',['admission_id'=>$admission->id])}}" style="color: white" onclick="confirm('Are you sure you want to revoke this student from having access to his account')" class="text text-primary">{{$admission->student->is_active == 1 ? 'Revoke' : 'Activate'}}</a></i>
			     				</button>
			     			</td>
			     		</tr>
			     		@endforeach
			     	</tbody>
			    </table>
			@else
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<div class="alert alert-danger">No admission record found for {{department()}} as {{currentSession()->name}}</div>
			</div>
			@endif
		</div>
	</div>
</div>
       