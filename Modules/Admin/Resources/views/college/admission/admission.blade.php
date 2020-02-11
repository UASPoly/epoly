@extends('admin::layouts.master')

@section('title')
    departmental session admission count down
@endsection

@section('breadcrumbs')
{{Breadcrumbs::render('admin.college.admission.summary',$session)}}
@endsection

@section('page-content')

<div class="col-md-12">
	<br>
	<div class="card shadow">
		<div class="card-header shadow">
			<h5 class="center">{{$session->name}} Departmental admission reports</h5>
		</div>
		<div class="card-body">
			<table class="table shadow">
				<thead>
					<tr>
						<th>S/N</th>
						<th>Department Name</th>
						<th>Admissions</th>
						<th>Reserved Admissions</th>
						<th>Programmes</th>
					</tr>
				</thead>
				<tbody>
					@foreach(admin()->colleges() as $college)
					<tr>
						<td colspan=""><b>{{$college->name}}</b></td>
					</tr>
	                    @foreach($college->departments as $department)
	                        <tr>
								<td>{{$loop->index+1}}</td>
								<td>{{$department->name}}</td>
								<td>
									{{count($department->admissions->where('session_id',$session->id))}}
								</td>
								<td>
									{{count($department->reservedDepartmentSessionAdmissions->where('session_id',$session->id))}}
								</td>
								<td>
									{{count($department->programmes)}}
								</td>
							</tr>
	                    @endforeach
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection