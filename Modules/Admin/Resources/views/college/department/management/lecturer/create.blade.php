@extends('admin::layouts.master')

@section('title')
    {{$department->name}} department leturer registration page
@endsection

@section('breadcrumbs')
{{Breadcrumbs::render('admin.college.department.lecturer.create',$department)}}
@endsection

@section('page-content')
<div class="col-md-1"></div>
<div class="col-md-10">
    <div class="card shadow">
    	<div class="card-body">
		    <h3 class="text text-success">{{$department->name}} Department New Lecturer Register</h3>
		    <form class="login-form" action="{{route('admin.college.department.management.lecturer.register',[str_replace(' ','-',strtolower($department->name)),$department->id])}}" method="post" enctype="multipart/form-data">
		        @csrf
		        <input type="hidden" name="department" value="{{$department->id}}">
		        <div class="row">
		            <div class="col-md-4">
		            	<div class="form-group">
			            	<div class="col-md-12 mb-2">
	                            <img id="picture_preview_container" src="{{asset('img/user.png')}}"
	                                alt="" width="150" height="140">
	                        </div>
	                    </div>
				        <div class="form-group">
				        	<label class="text text-success">Staff First Name</label>
				            <input type="text" name="first_name" value="{{old('first_name')}}" class="form-control" placeholder="staff first name">
				            @error('first_name')
				                <span class="invalid-feedback" role="alert">
				                    <strong>{{ $message }}</strong>
				                </span>
				            @enderror
				        </div>
				        <div class="form-group">
				        	<label class="text text-success">Staff Last Name</label>
				            <input type="text" value="{{old('last_name')}}" name="last_name" class="form-control" placeholder="staff last name">
				            @error('last_name')
				                <span class="invalid-feedback" role="alert">
				                    <strong>{{ $message }}</strong>
				                </span>
				            @enderror
				        </div>
				        <div class="form-group">
				        	<label class="text text-success">Gender</label>
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
			        </div>
			        <div class="col-md-4">
				        <div class="form-group">
				        	<label class="text text-success">Religion</label>
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
				        	<label class="text text-success">Staff ID</label>
				            <input type="text" value="{{old('staffID')}}" name="staffID" class="form-control" placeholder="staff ID">
				            @error('staffID')
				                <span class="invalid-feedback" role="alert">
				                    <strong>{{ $message }}</strong>
				                </span>
				            @enderror
				        </div>

				        <div class="form-group">
				        	<label class="text text-success">Employed At</label>
				            <input type="date" name="employed_at" class="form-control" value="{{old('employed_at')}}">
				            @error('employed_at')
				                <span class="invalid-feedback" role="alert">
				                    <strong>{{ $message }}</strong>
				                </span>
				            @enderror
				        </div>

				        <div class="form-group">
				        	<label class="text text-success">Date of Birth</label>
				            <input type="date" name="date_of_birth" class="form-control" value="{{old('date_of_birth')}}">
				            @error('date_of_birth')
				                <span class="invalid-feedback" role="alert">
				                    <strong>{{ $message }}</strong>
				                </span>
				            @enderror
				        </div>

				        <div class="form-group">
				        	<label class="text text-success">Staff Phone Number</label>
				            <input type="text" name="phone" class="form-control" placeholder="staff phone number" value="{{old('phone')}}">
				            @error('phone')
				                <span class="invalid-feedback" role="alert">
				                    <strong>{{ $message }}</strong>
				                </span>
				            @enderror
				        </div>
		            </div>
		            <div class="col-md-4">

		            	<div class="form-group">
				        	<label class="text text-success">State</label>
				            <select class="form-control" name="state">
				            	<option>Select State</option>
				            	@foreach(admin()->states() as $state)
                                    <option value="{{$state->id}}">{{$state->name}}</option>
				            	@endforeach
				            </select>
				            @error('state')
				                <span class="invalid-feedback" role="alert">
				                    <strong>{{ $message }}</strong>
				                </span>
				            @enderror
				        </div>
                        <div class="form-group">
				        	<label class="text text-success">Local Government</label>
				            <select class="form-control" name="lga">
				            	<option>Select Lga</option>
				            </select>
				            @error('lga')
				                <span class="invalid-feedback" role="alert">
				                    <strong>{{ $message }}</strong>
				                </span>
				            @enderror
				        </div>
				        <div class="form-group">
				        	<label class="text text-success">Staff E-mail Address</label>
				            <input type="email" name="email" class="form-control" placeholder="staff E-mail" value="{{old('email')}}">
				            @error('email')
				                <span class="invalid-feedback" role="alert">
				                    <strong>{{ $message }}</strong>
				                </span>
				            @enderror
				        </div>

				        <div class="form-group">
				        	<label class="text text-success">Home Address</label>
				            <textarea rows="3" name="address" class="form-control" placeholder="staff home address">{{old('adddress')}}</textarea>
				        </div>

				        <div class="form-group">
				        	<label class="text text-success">Choose Picture</label>
				            <input type="file" name="picture" class="form-control" id="picture">
				        </div>
     
				        <button class="button-fullwidth cws-button bt-color-3 btn-block shadow">Register</button>
				    </div>
		        </div>
		    </form>
		</div>
    </div>
</div>
@endsection

@section('scripts')
    @include('department::department.admission.pertials.imagePreview')
    @include('department::department.admission.pertials.addressAjax')
@endsection