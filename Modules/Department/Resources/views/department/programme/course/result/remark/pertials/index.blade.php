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
     		<div class="card-body">
     			<p><h3>Search course registrations to remark on</h3></p>
     			<form action="{{route($route ?? 'department.result.remark.registration.search')}}" method="post">
     				@csrf
     				<select class="form-control" name="session">
     					<option value="">Session</option>
     					@foreach($user->sessions() as $session)
     					    <option value="{{$session->id}}">{{$session->name}}</option>
     					@endforeach    
     				</select><br>
     				<select class="form-control" name="level">
     					<option value="">Level</option>
     					@foreach($user->levels() as $level)
     					    <option value="{{$level->id}}">{{$level->name}}</option>
     					@endforeach
     				</select><br>
     				<select class="form-control" name="semester">
     					<option value="">Semester</option>
     					<option value="1">First Semester</option>
     					<option value="2">Second Semester</option>
     				</select><br>
     				<label>Student/Page</label>
     				<input type="number" min="1" name="paginate" class="form-control
     				"><br>
     				<button class="button-fullwidth cws-button bt-color-3 btn-block">Search Registration</button>
     			</form>
     		</div>
     	</div>
    </div>