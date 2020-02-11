@extends('admin::layouts.master')

@section('title')
    {{$lecturer->staff->department->name}} department leturer information edit page
@endsection

@section('breadcrumbs')
{{Breadcrumbs::render('admin.college.department.lecturer.edit',$lecturer->staff->department)}}
@endsection

@section('page-content')
<div class="col-md-2"></div>
<div class="col-md-8">
	<br>
    <div class="card shadow">
    	<div class="card-body">
		    <h3 class="text text-success">{{$lecturer->staff->department->name}} Edit Lecturer Information</h3>
		    <form class="login-form" action="{{route('admin.college.department.management.lecturer.update',[str_replace(' ','-',strtolower($lecturer->staff->department->name)),$lecturer->staff->department->id,$lecturer->id])}}" method="post">
		        @csrf
		        <input type="hidden" name="lecturer" value="{{$lecturer->id}}">
		        <div class="form-group">
		        	<label class="text text-success">Staff First Name</label>
		            <input type="text" name="first_name" value="{{$lecturer->staff->first_name}}" class="form-control" placeholder="staff first name">
		            @error('first_name')
		                <span class="invalid-feedback" role="alert">
		                    <strong>{{ $message }}</strong>
		                </span>
		            @enderror
		        </div>
		        <div class="form-group">
		        	<label class="text text-success">Staff Last Name</label>
		            <input type="text" value="{{$lecturer->staff->last_name}}" name="last_name" class="form-control" placeholder="staff last name">
		            @error('last_name')
		                <span class="invalid-feedback" role="alert">
		                    <strong>{{ $message }}</strong>
		                </span>
		            @enderror
		        </div>
		        <div class="form-group">
		        	<label class="text text-success">Gender</label>
		            <select class="form-control" name="gender">
		            	<option value="{{$lecturer->staff->profile->gender->id}}">{{$lecturer->staff->profile->gender->name}}</option>
		            	@foreach(admin()->genders() as $gender)
		            	    @if($lecturer->staff->profile->gender->id != $gender->id)
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
		        	<label class="text text-success">Religion</label>
		            <select class="form-control" name="religion">
		            	<option value="{{$lecturer->staff->profile->religion->id}}">{{$lecturer->staff->profile->religion->name}}</option>
		            	@foreach(admin()->religions() as $religion)
		            	    @if($lecturer->staff->profile->religion->id != $religion->id)
                            <option value="{{$religion->id}}">{{$religion->name}}</option>
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
		        	<label class="text text-success">Staff ID</label>
		            <input type="text" value="{{$lecturer->staff->staffID}}" name="staffID" class="form-control" placeholder="staff ID">
		            @error('staffID')
		                <span class="invalid-feedback" role="alert">
		                    <strong>{{ $message }}</strong>
		                </span>
		            @enderror
		        </div>

		        <div class="form-group">
		        	<label class="text text-success">Employed At</label>
		            <input type="date" name="employed_at" class="form-control" value="{{$lecturer->staff->employed_at}}">
		            @error('employed_at')
		                <span class="invalid-feedback" role="alert">
		                    <strong>{{ $message }}</strong>
		                </span>
		            @enderror
		        </div>

		        <div class="form-group">
		        	<label class="text text-success">Date of Birth</label>
		            <input type="date" name="date_of_birth" class="form-control" value="{{$lecturer->staff->profile->date_of_birth}}" value="{{$lecturer->staff->profile->date_of_birth}}">
		            @error('date_of_birth')
		                <span class="invalid-feedback" role="alert">
		                    <strong>{{ $message }}</strong>
		                </span>
		            @enderror
		        </div>

		        <div class="form-group">
		        	<label class="text text-success">Staff Phone Number</label>
		            <input type="text" name="phone" class="form-control" placeholder="staff phone number" value="{{$lecturer->staff->phone}}">
		            @error('phone')
		                <span class="invalid-feedback" role="alert">
		                    <strong>{{ $message }}</strong>
		                </span>
		            @enderror
		        </div>

		        <div class="form-group">
		        	<label class="text text-success">Staff E-mail Address</label>
		            <input type="email" name="email" class="form-control" placeholder="staff E-mail" value="{{$lecturer->staff->email}}">
		            @error('email')
		                <span class="invalid-feedback" role="alert">
		                    <strong>{{ $message }}</strong>
		                </span>
		            @enderror
		        </div>

		        <div class="form-group">
		        	<label class="text text-success">Home Address</label>
		            <textarea rows="3" name="address" class="form-control" placeholder="staff home address">{{$lecturer->staff->profile->address}}</textarea>
		        </div>

		        <button class="button-fullwidth cws-button bt-color-3 btn-block shadow">Update</button>
		    </form><br><br>
		</div>
    </div>
</div>
@endsection