@foreach(headOfDepartment()->department->diferredSemesters->where('diferring_status_id',1) as $diferredSemester)
	<tr>
		<td>{{$loop->index+1}}</td>
		<td>{{$diferredSemester->student->first_name}}</td>
		<td>{{$diferredSemester->student->last_name}}</td>
		<td>{{$diferredSemester->student->admission->admission_no}}</td>
		<td>{{$diferredSemester->student->studentSession->name}}</td>
		<td>{{'semester'}}</td>
		<td>{{$diferredSemester->student->email}}</td>
		<td>{{$diferredSemester->student->phone}}</td>
		<td>
			<button class="btn btn-danger" onclick="confirm('Are you sure you want to delete this student from the list of students in this department')"><a href="{{route('department.diferring.verify',['type'=>'semester','diferring_id'=>$diferredSemester->id])}}" style="color: white">Approve</a> </i>
			</button>

			<button class="btn btn-info">
				<a href="{{route('department.diferring.delete',['type'=>'semester','diferring_id'=>$diferredSemester->id])}}" style="color: white">Delete</a></i>
			</button>
		</td>
	</tr>
@endforeach