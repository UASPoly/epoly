@extends('admin::layouts.master')

@section('title')

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
		    <form class="login-form" action="{{route('admin.college.department.staff.update',[$staff->id])}}" method="post">
		        @csrf
		        <input type="hidden" name="update">
		        <div class="form-group">
		        	<label>Staff First Name</label>
		            <input type="text" name="first_name" class="form-control" value="{{$staff->first_name}}">
		            @error('first_name')
		                <span class="invalid-feedback" role="alert">
		                    <strong>{{ $message }}</strong>
		                </span>
		            @enderror
		        </div>
		        <div class="form-group">
		        	<label>Staff Last Name</label>
		            <input type="text" name="last_name" class="form-control" value="{{$staff->last_name}}">
		            @error('last_name')
		                <span class="invalid-feedback" role="alert">
		                    <strong>{{ $message }}</strong>
		                </span>
		            @enderror
		        </div>
		        <div class="form-group">
		        	<label>Gender</label>
		            <select class="form-control" name="gender">
		            	<option value="{{$staff->profile->gender->id}}">{{$staff->profile->gender->name}}</option>
		            	@foreach(admin()->genders() as $gender)
		            	    @if($staff->profile->gender->id != $gender->id)
                                <option value="{{$gender->id}}">{{$gender->name}}</option>
                            @endif
		            	@endforeach
		            </select>
		            @error('gender')
		                <span class="invalid-feedback" role="alert">
		                    <strong>{{ $message }}</strong>
		                </span>
		            @enderror
		        </div>
		        <div class="form-group">
		        	<label>Religion</label>
		            <select class="form-control" name="religion">
		            	<option value="{{$staff->profile->religion->id}}">{{$staff->profile->religion->name}}</option>
		            	@foreach(admin()->religions() as $religion)
		            	    @if($staff->profile->religion->id != $religion->id)
                                <option value="{{$religion->id}}">
                                	{{$religion->name}}
                                </option>
                            @endif
		            	@endforeach
		            </select>
		            @error('religion')
		                <span class="invalid-feedback" role="alert">
		                    <strong>{{ $message }}</strong>
		                </span>
		            @enderror
		        </div>
		        <div class="form-group">
		        	<label>Tribe</label>
		            <select class="form-control" name="tribe">
		            	<option value="{{$staff->profile->tribe->id}}">{{$staff->profile->tribe->name}}</option>
		            	@foreach(admin()->tribes() as $tribe)
		            	    @if($staff->profile->tribe->id != $tribe->id)
                                <option value="{{$tribe->id}}">{{$tribe->name}}</option>
                            @endif
		            	@endforeach
		            </select>
		            @error('tribe')
		                <span class="invalid-feedback" role="alert">
		                    <strong>{{ $message }}</strong>
		                </span>
		            @enderror
		        </div>
		        <div class="form-group">
		        	<label>Department</label>
		            <select class="form-control" name="department">
		            	<option value="{{$staff->department->id}}">{{$staff->department->name}}</option>
		            	@foreach(admin()->colleges as $college)
		            	    <optgroup label="{{$college->name}}">
		            	    	@foreach($college->departments as $department)
		            	    	    @if($staff->department->id != $department->id)
			                            <option value="{{$department->id}}">
			                            	{{$department->name}}
			                            </option>
		                            @endif
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
		        <div class="form-group">
		        	<label>Staff Category</label>
		            <select class="form-control" name="staff_category">
		            	<option value="{{$staff->staffCategory->id}}">{{$staff->staffCategory->name}}</option>
		            	@foreach(admin()->staffCategories() as $staff_category)
		            	    @if($staff->staffCategory->id != $staff_category->id)
	                            <option value="{{$staff_category->id}}">
	                            	{{$staff_category->name}}
	                            </option>
                            @endif
		            	@endforeach
		            </select>
		            @error('category')
		                <span class="invalid-feedback" role="alert">
		                    <strong>{{ $message }}</strong>
		                </span>
		            @enderror
		        </div>
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
		        <div class="form-group">
		        	<label>Staff ID</label>
		            <input type="text" name="staffID" class="form-control" value="{{$staff->staffID}}">
		            @error('staffID')
		                <span class="invalid-feedback" role="alert">
		                    <strong>{{ $message }}</strong>
		                </span>
		            @enderror
		        </div>
		        <div class="form-group">
		        	<label>Staff Phone Number</label>
		            <input type="text" name="phone" class="form-control" value="{{$staff->phone}}">
		            @error('phone')
		                <span class="invalid-feedback" role="alert">
		                    <strong>{{ $message }}</strong>
		                </span>
		            @enderror
		        </div>
		        <div class="form-group">
		        	<label>Staff E-mail Address</label>
		            <input type="email" name="email" class="form-control" value="{{$staff->email}}">
		            @error('email')
		                <span class="invalid-feedback" role="alert">
		                    <strong>{{ $message }}</strong>
		                </span>
		            @enderror
		        </div>
		        <div class="form-group">
		        	<label>Home Address</label>
		            <textarea rows="3" name="address" class="form-control">{{$staff->profile->address}}</textarea>
		        </div>
		        <button class="button-fullwidth cws-button bt-color-3">Save Changes</button>
		    </form><br><br>
		</div>
    </div>
</div>
@endsection