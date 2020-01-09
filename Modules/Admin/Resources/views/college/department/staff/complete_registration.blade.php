@extends('admin::layouts.master')

@section('title')
    staff complete registration page
@endsection

@section('page-content')
<div class="col-md-3"></div>
<div class="col-md-6">
    <div class="card">
    	<div class="card-body">
		    <div class="row">
		    	<div class="col-md-5"></div>
		    	<div class="col-md-4">
		    		<img src="{{asset('img/logo.png')}}">
		    	</div>
		    </div>
		    <br><br>
		    <form class="login-form" action="{{route('admin.college.department.staff.register.update',[$staff->id])}}" method="post">
		        @csrf
		        <input type="hidden" name="update">
		        <div class="form-group">
		        	<label>Staff Type</label>
		            <select class="form-control" name="staff_type">
		            	<option value="{{$staff->staffType ? $staff->staffType->id : '' }}">
		            		{{$staff->staffType ? $staff->staffType->name : ''}}
		            	</option>
		            	@if($staff->staffType)
                            @foreach($staff->staffCategory->staffTypes() as $staff_type)
			            	    @if($staff->staffType->id != $staff_type->id)
		                            <option value="{{$staff_type->id}}">
		                            	{{$staff_type->name}}
		                            </option>
	                            @endif
			            	@endforeach
		            	@else
                            @foreach($staff->staffCategory->staffTypes as $staff_type)
	                            <option value="{{$staff_type->id}}">
	                            	{{$staff_type->name}}
	                            </option>
			            	@endforeach
		            	@endif
		            	
		            </select>
		            @error('category')
		                <span class="invalid-feedback" role="alert">
		                    <strong>{{ $message }}</strong>
		                </span>
		            @enderror
		        </div>
		        <button class="button-fullwidth cws-button bt-color-3">Complete Registration</button>
		    </form><br><br>
		</div>
    </div>
</div>
@endsection