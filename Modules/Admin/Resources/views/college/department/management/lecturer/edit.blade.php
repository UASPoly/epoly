@extends('admin::layouts.master')

@section('title')
    {{$lecturer->staff->department->name}} department leturer information edit page
@endsection

@section('breadcrumbs')
{{Breadcrumbs::render('admin.college.department.lecturer.edit',$lecturer->staff->department)}}
@endsection

@section('page-content')
<div class="col-md-1"></div>
<div class="col-md-10">
	<br>
    <div class="card shadow">
    	<div class="card-body">
		    <h3 class="text text-success">{{$lecturer->staff->department->name}} Edit Lecturer Information</h3>
		    <form class="login-form" action="{{route('admin.college.department.management.lecturer.update',[str_replace(' ','-',strtolower($lecturer->staff->department->name)),$lecturer->staff->department->id,$lecturer->id])}}" method="post" enctype="multipart/form-data">
		        @csrf
		        <input type="hidden" name="lecturer" value="{{$lecturer->id}}">
		        <div class="row">
		        	<div class="col-md-4">
		        		<div class="form-group">
			            	<div class="col-md-12 mb-2">
	                            <img id="picture_preview_container" src="{{storage_url($lecturer->staff->profile->picture ?? 'user.png')}}"
	                                alt="" width="150" height="140">
	                        </div>
	                    </div>
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
			        </div>
			        <div class="col-md-4">
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
                    </div>
                    <div class="col-md-4">
                    	<div class="form-group">
				        	<label class="text text-success">State</label>
				            <select class="form-control" name="state">
				            	<option value="{{$lecturer->staff->profile->lga->state->name}}">{{$lecturer->staff->profile->lga->state->name}}</option>
				            	@foreach(admin()->states() as $state)
				            	    @if($lecturer->staff->profile->lga->state->id != $state->id)
                                        <option value="{{$state->id}}">{{$state->name}}</option>
                                    @endif
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
				            	<option value="{{$lecturer->staff->profile->lga->id}}">{{$lecturer->staff->profile->lga->name}}</option>
				            </select>
				            @error('lga')
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

                        <div class="form-group">
				        	<label class="text text-success">Change Picture</label>
				            <input type="file" name="picture" class="form-control" id="picture">
				        </div>
				        <button class="button-fullwidth cws-button bt-color-3 btn-block shadow">Update</button>
			        </div>
			    </form>
		    </div>
		</div>
    </div>
</div>
@endsection

@section('scripts')
    @include('department::department.admission.pertials.imagePreview')
    @include('department::department.admission.pertials.addressAjax')
@endsection