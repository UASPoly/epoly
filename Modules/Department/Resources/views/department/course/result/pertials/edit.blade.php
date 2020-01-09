<div class="col-md-1"></div>
<div class="col-md-10">
	<div class="card">
		<div class="card-body">
			<table class="table">
				<head>
					<tr>
						<td>S/N</td>
						<td>Name</td>
						<td>Admission No</td>
						<td>CA Score</td>
						<td>Exam Score</td>
						<td>Total Score</td>
						<td>Grade</td>
						<td>Points</td>
						<td>Remark</td>
						<td></td>
					</tr>
				</head>
				<tbody>
					@foreach($upload->results as $result)
					<tr>
						<td>
							{{$loop->index+1}}
						</td>
						<td>
							{{$result->courseRegistration->semesterRegistration->sessionRegistration->student->first_name}} {{$result->courseRegistration->semesterRegistration->sessionRegistration->student->last_name}}
						</td>
						<td>
							{{$result->courseRegistration->semesterRegistration->sessionRegistration->student->admission->admission_no}}
						</td>
						<td>
							{{$result->ca}}
						</td>
						<td>
							{{$result->exam}}
						</td>
						<td>
							{{$result->accessment() + $result->examination()}}			
						</td>
						<td>
							{{$result->grade}}
						</td>
						<td>
							{{$result->points}}
						</td>
						<td>
							{{$result->remark ? $result->remark->name : ' '}}
						</td>
						<td>
							<button class="btn btn-info"><a href="{{route($route ?? 'department.result.student.edit',[$result->id])}}" style="color: white">Edit</a></button>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>	
		</div>
	</div><br>
</div>