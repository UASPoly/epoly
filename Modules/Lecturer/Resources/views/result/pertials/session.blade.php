@php
if(examOfficer()){
	$department = examOfficer()->department;
}elseif(headOfDepartment()){
	$department = headOfDepartment()->department;
}else{
	$department = lecturer()->staff->department;
}
@endphp
<select class="form-control" name="session">
	<option value="{{currentSession()->id}}">{{currentSession()->name}}</option>
	<!-- @foreach($department->sessions() as $session)
		<option value="{{$session->id}}">
			{{$session->name}}
		</option>
	@endforeach -->
</select>	

