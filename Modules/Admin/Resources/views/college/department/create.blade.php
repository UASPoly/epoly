@extends('admin::layouts.master')
@section('title')
    admin create college page
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
    <form class="login-form" action="{{route('admin.college.department.register')}}" method="post">
        @csrf
        <div class="form-group">
        	<label>Department Name</label>
            <input type="text" name="name" class="form-control" placeholder="department name">
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        @if(isset($college))
            <input type="hidden" name="college" value="{{$college->id}}">
        @else
            <div class="form-group">
            	<label>College</label>
                <select name="college" class="form-control">
                	<option value=""></option>
                	@foreach(admin()->colleges() as $college)
                         <option value="{{$college->id}}">{{$college->name}}</option>
                	@endforeach
                </select>
                @error('college_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        @endif
        <div class="form-group">
        	<label>Established Date</label>
            <input type="date" name="established_date" class="form-control" placeholder="college name">
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
        	<label>Department Description</label>
            <textarea rows="5" name="description" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label>Department Code</label>
            <input type="number" name="code" class="form-control"> 
        </div>
        <button class="button-fullwidth cws-button bt-color-3">Create Department</button>
    </form>
</div>
@endsection