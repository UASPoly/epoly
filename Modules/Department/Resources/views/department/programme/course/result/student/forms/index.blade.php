@php
	if(headOfDepartment()){
		$user = headOfDepartment();
	}else{
		$user = examOfficer();
	}
@endphp
<div class="col-md-3"></div>
    <div class="col-md-6"><br>
     	<div class="card">
     		<div class="card-header">
     			Check Student result here
     		</div>
     		<div class="card-body">
     			<form method="post" action="{{route($route ?? 'department.student.result.search')}}">
     				@csrf
     				<input type="text" name="admission_no" class="form-control" placeholder="Admission No">
     				<br>
	     			<select class="form-control" name='session'>
	     				<option value="">Session</option>
	     				@foreach($user->sessions() as $session)
                            <option value="{{$session->id}}">{{$session->name}}</option>
	     				@endforeach
	     			</select>
	     			<br>
	     			<select class="form-control" name='semester'>
	     				<option value="">Semester</option>
                        <option value="1">First Semester</option>
                        <option value="2">Second Semester</option>
	     			</select>
                    <br>
	     			<button class="button-fullwidth cws-button bt-color-3 btn-block">Check Result</button>
     			</form>
     		</div>
     	</div>
    </div>