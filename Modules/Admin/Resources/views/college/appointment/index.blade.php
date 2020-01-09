@extends('admin::layouts.master')

@section('title')
    search appointment staff page
@endsection

@section('page-content')
<div class="col-md-4"></div>
<div class="col-md-4">
    <div class="card">
    	<div class="card-body">
		    <div class="row">
		    	<div class="col-md-4"></div>
		    	<div class="col-md-4">
		    		<img src="{{asset('img/logo.png')}}">
		    	</div>
		    </div>
		    <br><br>
		    <form class="login-form" action="{{route('admin.college.appointment.manage.search')}}" method="post">
		        @csrf
		        <div class="form-group">
		        	<label>College</label>
		            <select class="form-control" name="college">
		            	<option value="">College</option>
		            	@foreach(admin()->colleges as $college)
                            <option value="{{$college->id}}">
                            	{{$college->name}}
                            </option>
		            	@endforeach
		            </select>
		            @error('college')
		                <span class="invalid-feedback" role="alert">
		                    <strong>{{ $message }}</strong>
		                </span>
		            @enderror
		        </div>

		        <div class="form-group">
		        	<label>Department</label>
		            <select class="form-control" name="department">
		            	<option value="">Department</option>
		            	@foreach(admin()->colleges as $college)
		            	    <optgroup label="{{$college->name}}">
		            	    	@foreach($college->departments as $department)
		                            <option value="{{$department->id}}">
		                            	{{$department->name}}
		                            </option>
				            	@endforeach
		            	    </optgroup>
		            	@endforeach
		            </select>
		            @error('department')
		                <span class="invalid-feedback" role="alert">
		                    <strong>{{ $message }}</strong>
		                </span>
		            @enderror
		        </div>
		        <button class="button-fullwidth cws-button bt-color-3">Search Appointment</button>
		    </form><br><br>
		</div>
    </div>
</div>
@endsection