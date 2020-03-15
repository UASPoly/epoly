<div class="col-md-3"></div>
<div class="col-md-6">
	<br>
	<div class="card shadow">
		<div class="card-header shadow">
			<h5>Search Admissions</h5>
		</div>
		<div class="card-body">
			<form class="login-form" action="{{route($route ?? 'department.student.admission.index')}}" method="post">
		        @csrf
		        <div class="form-group">
		        	<label>Session</label>
		            <select name="session" class="form-control">
		            	<option value="{{currentSession()->id}}">{{currentSession()->name}}</option>
		            	@foreach($sessions as $session)
			            	@if($session->id != currentSession()->id)
			                    <option value="{{$session->id}}">{{$session->name}}</option>
		                    @endif
		            	@endforeach
		            </select>
		            @error('programme')
		                <span class="invalid-feedback" role="alert">
		                    <strong>{{ $message }}</strong>
		                </span>
		            @enderror
		        </div>
		        <button name="search" value="search" class="btn btn-success shadow">Search</button>
		        <button name="export" value="export" class="btn btn-success shadow">Export</button>
		    </form>
		</div>
	</div>
    
    
</div>