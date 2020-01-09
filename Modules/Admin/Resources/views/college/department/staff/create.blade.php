@extends('admin::layouts.master')
@section('title')
    staff registration page
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
		    <form class="login-form" action="{{route('admin.college.department.staff.register')}}" method="post">
		        @csrf
		        <div class="form-group">
		        	<label>Staff First Name</label>
		            <input type="text" name="first_name" class="form-control" placeholder="staff first name">
		            @error('first_name')
		                <span class="invalid-feedback" role="alert">
		                    <strong>{{ $message }}</strong>
		                </span>
		            @enderror
		        </div>
		        <div class="form-group">
		        	<label>Staff Last Name</label>
		            <input type="text" name="last_name" class="form-control" placeholder="staff last name">
		            @error('last_name')
		                <span class="invalid-feedback" role="alert">
		                    <strong>{{ $message }}</strong>
		                </span>
		            @enderror
		        </div>
		        <div class="form-group">
		        	<label>Gender</label>
		            <select class="form-control" name="gender">
		            	<option value="">Gender</option>
		            	@foreach(admin()->genders() as $gender)
                            <option value="{{$gender->id}}">{{$gender->name}}</option>
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
		            	<option value="">Religion</option>
		            	@foreach(admin()->religions() as $religion)
                            <option value="{{$religion->id}}">{{$religion->name}}</option>
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
		            	<option value="">Tribe</option>
		            	@foreach(admin()->tribes() as $tribe)
                            <option value="{{$tribe->id}}">{{$tribe->name}}</option>
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
		        <div class="form-group">
		        	<label>Staff Category</label>
		            <select class="form-control" name="category">
		            	<option value="">Category</option>
		            	@foreach(admin()->staffCategories() as $category)
                            <option value="{{$category->id}}">
                            	{{$category->name}}
                            </option>
		            	@endforeach
		            </select>
		            @error('category')
		                <span class="invalid-feedback" role="alert">
		                    <strong>{{ $message }}</strong>
		                </span>
		            @enderror
		        </div>
		        <div class="form-group">
		        	<label>Staff ID</label>
		            <input type="text" name="staffID" class="form-control" placeholder="staff ID">
		            @error('staffID')
		                <span class="invalid-feedback" role="alert">
		                    <strong>{{ $message }}</strong>
		                </span>
		            @enderror
		        </div>
		        <div class="form-group">
		        	<label>Employed At</label>
		            <input type="date" name="employed_at" class="form-control" >
		            @error('employed_at')
		                <span class="invalid-feedback" role="alert">
		                    <strong>{{ $message }}</strong>
		                </span>
		            @enderror
		        </div>
		        <div class="form-group">
		        	<label>Date of Birth</label>
		            <input type="date" name="date_of_birth" class="form-control">
		            @error('date_of_birth')
		                <span class="invalid-feedback" role="alert">
		                    <strong>{{ $message }}</strong>
		                </span>
		            @enderror
		        </div>
		        <div class="form-group">
		        	<label>Staff Phone Number</label>
		            <input type="text" name="phone" class="form-control" placeholder="staff phone number">
		            @error('phone')
		                <span class="invalid-feedback" role="alert">
		                    <strong>{{ $message }}</strong>
		                </span>
		            @enderror
		        </div>
		        <div class="form-group">
		        	<label>Staff E-mail Address</label>
		            <input type="email" name="email" class="form-control" placeholder="staff E-mail">
		            @error('email')
		                <span class="invalid-feedback" role="alert">
		                    <strong>{{ $message }}</strong>
		                </span>
		            @enderror
		        </div>
		        <div class="form-group">
		        	<label>Home Address</label>
		            <textarea rows="3" name="address" class="form-control" placeholder="staff home address"></textarea>
		        </div>
		        <button class="button-fullwidth cws-button bt-color-3">Register</button>
		    </form><br><br>
		</div>
    </div>
</div>
@endsection