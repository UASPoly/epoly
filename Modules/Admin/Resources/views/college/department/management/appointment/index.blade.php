@extends('admin::layouts.master')

@section('title')
    search available appointment lecturers
@endsection

@section('page-content')
    
    <div class="col-md-12">
        <br>
        <div class="card shadow">
            <div class="col-md-12"><br></div>
            <div class="card-body">
            @if(count($department->lecturers())>0)
            <div class="center"><b>LIST OF LECTURERS REGISTER IN {{strtoupper($department->name)}} DEPARTMENT</b></div>
                <div class="col-md-12">
                    <table class="table shadow">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>From</th>
                                <th>To</th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($department->lecturers() as $lecturer)
                                <tr>
                                    <td>{{$loop->index+1}}</td>
                                    <td>
                                        {{$lecturer->staff->first_name}} {{$lecturer->staff->last_name}}
                                    </td>
                                    <td>{{$lecturer->email}}</td>
                                    <td>{{$lecturer->phone}}</td>
                                    <td>{{$lecturer->from}}</td>
                                    <td>{{$lecturer->to}}</td>
                                    <td><button data-toggle="modal" data-target="#lecturer_{{$lecturer->id}}" class="btn btn-primary shadow">Make Appointment</button></td>
                                    <td>
                                        <a href="{{route('admin.college.department.management.lecturer.edit',[$department->id,$lecturer->id])}}"><button class="btn btn-info shadow">Edit</button>
                                        </a>
                                        </td>
                                    <td>
                                        <a href="{{route('admin.college.department.management.lecturer.delete',[$department->id,$lecturer->id])}}" onclick="confirm('Are you sure you want delete this lecturer')">
                                        <button class="btn btn-danger shadow">Delete</button></a>
                                    </td>
                                </tr>
                                @include('admin::college.department.management.lecturer.appointment')
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="alert alert-danger">No lecturers record found for this search</div>
            @endif 
            </div>
        </div>
    </div>
     
@endsection