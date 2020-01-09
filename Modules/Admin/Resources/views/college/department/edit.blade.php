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
                <form class="login-form" action="{{route('admin.college.update',[str_replace(' ','-',strtolower($department->name)),$department->id])}}" method="post">
                    @csrf
                    <div class="form-group">
                    	<label>Department Name</label>
                        <input type="text" name="name" class="form-control" value="{{$department->name}}">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
			        	<label>College</label>
			            <select name="college" class="form-control">
			            	<option value="{{$department->college->id}}">{{$department->college->name}}</option>
			            	@foreach(admin()->colleges as $college)
			            	    @if($department->college->id != $college->id)
			                    <option value="{{$college->id}}">
			                     	{{$college->name}}
			                    </option>
			                    @endif
			            	@endforeach
			            </select>
			            @error('college_id')
			                <span class="invalid-feedback" role="alert">
			                    <strong>{{ $message }}</strong>
			                </span>
			            @enderror
			        </div>
                    <div class="form-group">
                    	<label>Established Date</label>
                        <input type="date" name="established_date" class="form-control" value="{{$department->established_date}}">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                    	<label>department Description</label>
                        <textarea rows="5" name="description" class="form-control">{{$department->description}}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Department Code</label>
                        <input type="number" name="code" class="form-control"> 
                    </div>
                    <button class="button-fullwidth cws-button bt-color-3">Save Changes</button>
                </form>
            </div>
        
@endsection