<div class="col-md-12">
	<br>
	<div class="card shadow">
		<div class="card-body">
			@if(count($students)>0)
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
			     		@foreach($students as $student)
			     		<tr>
			     			<td>{{$loop->index+1}}</td>
			     			<td>
			     				{{$student->first_name}} 
			     				{{$student->middle_name}}    
			     				{{$student->last_name}}
			     			</td>
			     			<td>{{$student->admission->admission_no}}</td>
			     			<td>{{$student->schedule->name}}</td>
			     			<td>{{$student->admission->programme->title}}</td>
			     			<td>{{$student->phone}}</td>
			     			<td>{{$student->is_active == 1 ? 'Active' : 'Revoked'}}</td>
			     			<td>
			     				<button class="btn btn-danger shadow" onclick="return confirm('Are you sure you want to delete this student from the list of students in this department')">
								    <a href="{{route($route['delete'] ?? 'department.admission.delete',['admission_id'=>$student->admission->id])}}" style="color: white">Delete</a> </i>
			     				</button>

			     				<button class="btn btn-info shadow">
			     					<a href="{{route($route['view'] ?? 'department.admission.edit',[$student->id])}}" style="color: white">View</a></i>
			     				</button>

			     				<button class="btn btn-warning shadow" >
								    <a href="{{route($route['revoke'] ?? 'department.admission.revoke',['admission_id'=>$student->admission->id])}}" style="color: white" onclick="return confirm('Are you sure you want to revoke this student from having access to his account')" class="text text-primary">{{$student->is_active == 1 ? 'Revoke' : 'Activate'}}</a></i>
			     				</button>
			     			</td>
			     		</tr>
			     		@endforeach
			     	</tbody>
			    </table>
			@else
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<div class="alert alert-danger">No admission record found in {{department()}} department for {{$session->name}} session</div>
			</div>
			@endif
		</div>
	</div>
</div>
       