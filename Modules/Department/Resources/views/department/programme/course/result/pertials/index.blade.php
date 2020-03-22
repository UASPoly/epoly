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
	     			<button name="view" value="view" class="bt-color-3 btn btn-success">View Result</button>
	     			<button name="export" value="export" class="btn btn-success bt-color-3">Export Result</button>
     			</form>
     		</div>
     	</div>
    </div>