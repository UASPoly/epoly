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
     			Course result specification 
     		</div>
     		<div class="card-body">
     			<form method="post" action="{{route($route ?? 'department.result.course.search')}}">
     				@csrf
	     			@include('lecturer::result.pertials.course')<br>
                    @include('lecturer::result.pertials.session')<br>
	     			<button class="button-fullwidth cws-button bt-color-3 btn-block">View Result</button>
     			</form>
     		</div>
     	</div>
    </div>