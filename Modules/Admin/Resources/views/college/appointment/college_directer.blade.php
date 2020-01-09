@extends('admin::layouts.master')
@section('title')
    college directer appointment registration page
@endsection
@section('page-content')
<div class="col-md-4"></div>
<div class="col-md-4">
    <br><br>
    <div class="row">
    	<div class="col-md-4"></div>
    	<div class="col-md-4">
    		<img src="{{asset('img/logo.png')}}">
    	</div>
    </div>
    <br><br>
    <form class="login-form" action="{{route('admin.college.appointment.directer.register')}}" method="post">
        @csrf
        <div class="form-group">
            <label>First Name</label>
            <input type="text"  value="{{$staff->first_name}}" disabled name="name" class="form-control" />
        </div>
        <div class="form-group">
            <label>Last Name</label>
            <input type="text"  value="{{$staff->last_name}}" disabled name="sname" class="form-control" />
        </div>
        <div class="form-group">
            <label>E-mail Address</label>
            <input type="text"  value="{{$staff->email}}" disabled name="staffID" class="form-control" />
        </div>
        <div class="form-group">
            <label>Gender</label>
            <input type="text"  value="{{$staff->profile->gender->name}}" disabled name="staffID" class="form-control" />
        </div>
        <div class="form-group">
            <label>Tribe</label>
            <input type="text"  value="{{$staff->profile->tribe->name}}" disabled name="staffID" class="form-control" />
        </div>
        <div class="form-group">
            <label>Religion</label>
            <input type="text"  value="{{$staff->profile->religion->name}}" disabled name="staffID" class="form-control" />
        </div>
        <div class="form-group">
            <label>Employed At</label>
            <input type="date"  value="{{$staff->employed_at}}" disabled name="date" class="form-control" />
        </div>
        <input type="hidden" name="staff_id" value="{{$staff->id}}">
        <div class="form-group">
            <label>Staff ID</label>
            <input type="text"  value="{{$staff->staffID}}" disabled name="staffID" class="form-control" />
        </div>
        <div class="form-group">
        	<label>Appointment Date</label>
            <input type="date" name="appointment_date" class="form-control" placeholder="college name">
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <button class="button-fullwidth cws-button bt-color-3">Create Appointment</button>
    </form>
</div>
@endsection