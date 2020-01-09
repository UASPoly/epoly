@extends('lecturer::layouts.master')

@section('page-content')
<input type="checkbox" name="">
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
						<td>Course Code</td>
						<td>CA Score</td>
						<td>Exam Score</td>
						<td>Total Score</td>
						<td>Grade</td>
						<td>Remark</td>
					</tr>
				</head>
				<tbody>
					@foreach(session('results') as $result)
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
							{{$result->courseRegistration->course->code}}
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
							{{$result->remark->name ?? ' '}}
						</td>
					</tr>
				
					@endforeach
				</tbody>
			</table>	
		</div>
	</div><br>
	
</div> 
@endsection
