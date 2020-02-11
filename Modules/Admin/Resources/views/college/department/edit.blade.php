@extends('admin::layouts.master')

@section('title')
    admin edit department
@endsection

@section('breadcrumbs')
{{Breadcrumbs::render('admin.college.department.management.edit',$department)}}
@endsection

@section('page-content')
<div class="col-md-3"></div>
<div class="col-md-6">
    <div class="card shadow">
        <div class="card-header shadow">
            <h5>Edit</h5>
        </div>
        <div class="card-body">
            <form class="login-form" action="{{route('admin.college.department.update',[$department->id])}}" method="post">
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
                        @foreach(admin()->colleges() as $college)
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
                    <input type="number" name="code" class="form-control" value="{{$department->code}}"> 
                </div>
                <button class="btn btn-block button-fullwidth cws-button bt-color-3">Save Changes</button>
            </form>
        </div>
    </div>
</div>       
@endsection