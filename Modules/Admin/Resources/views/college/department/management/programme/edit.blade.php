@extends('admin::layouts.master')

@section('title')
    admin {{$programme->department->name}} programme management page
@endsection

@section('breadcrumbs')
{{Breadcrumbs::render('admin.college.department.management.programme.edit',$programme->department)}}
@endsection

@section('page-content')
<div class="col-md-3"></div>
    <div class="col-md-6">
        <div class="card shadow">
            <div class="card-head shadow"><h5 class="center">Edit {{$programme->title}} Programme</h5></div>
            <div class="card-body">
            	<form action="{{route('admin.college.department.management.programme.update',
                    [$programme->department->id,$programme->id])}}" method="post">
                    @csrf
                    <input type="hidden" name="programmeId" value="{{$programme->id}}">
                    <input type="hidden" name="departmentId" value="{{$programme->department->id}}">
                    <div class="form-group">
                        <label>Programme Name</label>
                        <input type="text" name="name" value="{{$programme->name}}">
                        @error('programme')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Programme Title</label>
                        <input type="text" name="title" value="{{$programme->title}}">
                        @error('programme')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Programme Code</label>
                        <input type="number" name="code" class="form-control" min="1" value="{{$programme->code}}">
                        @error('code')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Programme Type</label>
                        <select class="form-control" name="type">
                            <option value="{{optional($programme->programmeType)->id ?? null}}">{{optional($programme->programmeType)->name ?? 'Programme Type'}}</option>
                            @foreach(admin()->programmeTypes() as $programmeType)
                                @if(optional($programme->programmeType)->id != $programmeType->id)
                                    <option value="{{$programmeType->id}}">{{$programmeType->name}}</option>
                                @endif
                            @endforeach
                        </select>
                        @error('type')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Add Schedule</label>
                        <select name="scheduleAdd" class="form-control">
                            <option value="">Select Schedule</option>
                            @if(!$programme->hasMorningSchedule())
                                <option value="1">Morning Schedule</option>
                            @endif
                            @if(!$programme->hasEveningSchedule())
                                <option value="2">Evening Schedule</option>
                            @endif

                        </select>
                    </div>
                    <div class="form-group">
                        <label>Remove Schedule</label>
                        <select name="scheduleRemove" class="form-control">
                            <option value="">Select Schedule</option>
                            @if($programme->hasMorningSchedule())
                                <option value="1">Morning Schedule</option>
                            @endif
                            @if($programme->hasEveningSchedule())
                                <option value="2">Evening Schedule</option>
                            @endif
                        </select>
                    </div>
                    <div class="form-group">
                       <button class="btn btn-success btn-block">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
            