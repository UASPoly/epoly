@extends('admin::layouts.master')

@section('title')
    admin {{$department->name}} create programme age
@endsection

@section('breadcrumbs')
{{Breadcrumbs::render('admin.college.department.management.programme.create',$department)}}
@endsection

@section('page-content')

<div class="col-md-3"></div>
<div class="col-md-6">
<div class="card shadow">
    <div class="card-header shadow">Register new programme</div>
    <div class="card-body">
        <form action="{{route('admin.college.department.management.programme.register',
        [str_replace(' ','-',strtolower($department->name)),$department->id])}}" method="post">
            @csrf
                    <input type="hidden" name="departmentId" value="{{$department->id}}">
                    <div class="form-group">
                        <label>Programme Name</label>
                        <input type="text" name="name" class="form-control" id="programme" placeholder="NATIONAL DIPLOMA IN COMPUTER SCIENCE">   
                        @error('programme')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Programme Abbreviation</label>
                        <input type="text" name="title" class="form-control" id="programme" placeholder="NDCS">   
                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Programme Code</label>
                        <input type="number" name="code" class="form-control" min="1">
                        @error('code')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Programme Type</label>
                        <select class="form-control" name="type">
                            <option value="">Programme Type</option>
                            @foreach(admin()->programmeTypes() as $programmeType)
                                 <option value="{{$programmeType->id}}">{{$programmeType->name}}</option>
                            @endforeach
                        </select>
                        @error('programme_type_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <button class="btn-block button-fullwidth cws-button bt-color-3">Register</button>  
                </form>
    </div>
</div>
</div>
@endsection            	
            
<!-- end modal -->