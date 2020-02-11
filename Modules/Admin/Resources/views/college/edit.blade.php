@extends('admin::layouts.master')
@section('title')
    admin {{$college->name}} college edit informatio
@endsection

@section('breadcrumbs')
{{Breadcrumbs::render('admin.college.management.edit',$college)}}
@endsection

@section('page-content')
           <div class="col-md-3"></div>
           <div class="col-md-6">
           	    <div class="card shadow">
                    <div class="card-header shadow">
                        <h5>Edit</h5>
                    </div>
                    <div class="card-body">
                        <form class="login-form" action="{{route('admin.college.update',[$college->id])}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>College Name</label>
                                <input type="text" name="name" class="form-control" value="{{$college->name}}">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Established Date</label>
                                <input type="date" name="established_date" class="form-control" value="{{$college->established_date}}">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>College Description</label>
                                <textarea rows="5" name="description" class="form-control">{{$college->description}}</textarea>
                            </div>
                            <div class="form-group">
                                <label>College Code</label>
                                <input type="number" name="code" class="form-control" value="{{$college->code}}"> 
                            </div>
                            <button class="btn btn-block button-fullwidth cws-button bt-color-3 shadow">Save Changes</button>
                        </form>
                    </div>
                </div>
                
            </div>
        
@endsection