
<div class="col-md-1"></div>
<div class="col-md-10">
	<br>
    <br>
	<div class="card">
		<div class="card-body">
			<div class="row">
				<div class="col-md-8"></div>
				<div class="col-md-4">
					<div class="row">
						<div class="col-md-12">
							<a href="" onclick="print()" class=" cws-button bt-color-1 pull-right m-3">
				                <i class="fa fa-print"></i>
				                <span>Print</span>
				            </a>
				            <a href="{{route('exam.officer.student.biodata.edit',[$student->id])}}" class=" cws-button bt-color-1 pull-right m-3">
				                <i class="fa fa-"></i>
				                <span>Edit</span>
				            </a>
						</div>
					</div>
					
					<img src="{{storage_url($student->studentAccount->picture)}}" height="250" width="200">
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<table border="1">
						<tr height="45">
							<td><strong class="h4 text text->primary">Personal Information</strong></td>
							<td>
								<tr height="35">
									<td>First Name</td>
									<td>{{$student->first_name}}</td>
								</tr>
								<tr height="35">
									<td>Middle Name</td>
									<td>{{$student->middle_name}}</td>
								</tr>
								<tr height="35">
									<td>Last Name</td>
									<td>{{$student->last_name}}</td>
								</tr>
								<tr height="35">
									<td>Admission Number</td>
									<td>{{$student->admission->admission_no}}</td>
								</tr>
							</td>
						</tr>

						<tr height="45">
							<td><strong class="h4 text text->success">Contact Information</strong></td>
							<td>
								<tr height="35">
									<td>Email</td>
									<td>{{$student->email}}</td>
								</tr>
								<tr height="35">
									<td>Phone Number</td>
									<td>{{$student->phone}}</td>
								</tr>
							</td>
						</tr>

						<tr height="45">
							<td><strong class="h4 text text->success">Address Information</strong></td>
							<td>
								<tr height="35">
									<td>State Of Origin</td>
									<td>{{$student->studentAccount->lga->state->name}}</td>
								</tr>
								<tr height="35">
									<td>Local Government</td>
									<td>{{$student->studentAccount->lga->name}}</td>
								</tr>
								<tr height="35">
									<td>Address</td>
									<td>{{$student->studentAccount->address}}</td>
								</tr>
							</td>
						</tr>
		                
					</table>
				</div>
			</div>
			
		</div>
	</div>
</div>