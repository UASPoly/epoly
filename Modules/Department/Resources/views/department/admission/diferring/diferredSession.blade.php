@foreach(headOfDepartment()->department->diferredSessions->where('diferring_status_id',1) as $diferredSession)
	<tr>
		<td>{{$loop->index+1}}</td>
		<td>{{$diferredSession->student->first_name}}</td>
		<td>{{$diferredSession->student->last_name}}</td>
		<td>{{$diferredSession->student->admission->admission_no}}</td>
		<td>{{$diferredSession->student->studentSession->name}}</td>
		<td>{{'session'}}</td>
		<td>{{$diferredSession->student->email}}</td>
		<td>{{$diferredSession->student->phone}}</td>
		<td>
			<button class="btn btn-danger" onclick="confirm('Are you sure you want to delete this student from the list of students in this department')"><a href="{{route('department.diferring.verify',['type'=>'session','diferring_id'=>$diferredSession->id])}}" style="color: white">Approve</a> </i>
			</button>

			<button class="btn btn-info">
				<a href="{{route('department.diferring.delete',['type'=>'session','diferring_id'=>$diferredSession->id])}}" style="color: white">Delete</a></i>
			</button>
		</td>
	</tr>
@endforeach