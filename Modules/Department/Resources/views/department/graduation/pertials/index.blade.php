
<div class="col-md-3"></div>
<div class="col-md-6">
	<br>
			<br>
			<br>
	<div class="card">
		<div class="card-body">
			<h3 class="text text-success">{{$message ?? ''}}</h3>
			<form action="{{route($route) ?? route('department.graduate.search')}}" method="post">
				@csrf
				<select class="form-control" name="session">
					<option>Session</option>
					@foreach($department->availableGraduationSessions() as $session)
			            <option value="{{$session->id}}">{{$session->name}}</option>
					@endforeach
				</select><br>
				<button class="button-fullwidth cws-button bt-color-3 btn-block">{{$message ?? 'Search'}}</button>
			</form>
		</div>
	</div>
</div>