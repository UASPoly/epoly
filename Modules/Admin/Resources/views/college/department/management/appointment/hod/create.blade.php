@extends('admin::layouts.master')
@section('title')
    college directer appointment create page
@endsection
@section('page-content')
<div class="col-md-4"></div>
<div class="col-md-4">
    <br><br>
    <form class="login-form" action="{{route('admin.college.department.appointment.hod.register',[$lecturer->id])}}" method="post">
        @csrf
        <div class="form-group">
        	<label>First Name</label>
            <input type="text"  value="{{$lecturer->staff->first_name}}" disabled name="name" class="form-control" />
        </div>
        <div class="form-group">
            <label>Last Name</label>
            <input type="text"  value="{{$lecturer->staff->last_name}}" disabled name="sname" class="form-control" />
        </div>
        <div class="form-group">
            <label>E-mail Address</label>
            <input type="text"  value="{{$lecturer->staff->email}}" disabled name="email" class="form-control" />
        </div>
        <div class="form-group">
            <label>Gender</label>
            <input type="text"  value="{{$lecturer->staff->profile->gender->name}}" disabled name="staffID" class="form-control" />
        </div>
        
        <div class="form-group">
            <label>Religion</label>
            <input type="text"  value="{{$lecturer->staff->profile->religion->name}}" disabled name="staffID" class="form-control" />
        </div>
        <div class="form-group">
            <label>Employed At</label>
            <input type="date"  value="{{$lecturer->staff->employed_at}}" disabled name="date" class="form-control" />
        </div>
        <input type="hidden" name="staff_id" value="{{$lecturer->staff->id}}">
        <div class="form-group">
            <label>Staff ID</label>
            <input type="text"  value="{{$lecturer->staff->staffID}}" disabled name="staffID" class="form-control" />
        </div>
        <div class="form-group">
        	<label>Appointment Date</label>
            <input type="date" value="{{old('appointment_date')}}" name="appointment_date" class="form-control" placeholder="college name">
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <button class="button-fullwidth cws-button bt-color-3">Confirm Appointment'</button>
    </form>
</div>
@endsection