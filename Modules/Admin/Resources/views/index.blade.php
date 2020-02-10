@extends('admin::layouts.master')

@section('title')
admin dashboard
@endsection

@section('breadcrumbs')
{{Breadcrumbs::render('admin.dashboard')}}
@endsection

@section('page-content')
<div class="col-md-12">
    <br>
    <div class="card shadow">
        <div class="card-body">
            <div class="row">

                <!-- college item -->
                <div class="col-md-4">
                    <div class="course-item shadow">
                        <div class="course-name clear-fix">
                        <h3><a href="{{route('admin.college.index')}}">Colleges Management</a></h3>
                            </div>
                        <div class="course-date bg-color-1 clear-fix">
                            
                            <div class="description"><h1><i class="fa fa-home"></i>
                                <span>
                                    {{count(admin()->colleges())}}
                                </span></h1>
                                </div>
                        </div>
                    </div>
                </div>
                <!-- / College item -->

                <!-- calender item -->
                <div class="col-md-4">
                    <div class="course-item shadow">
                        <div class="course-name clear-fix">
                        <h3><a href="{{route('admin.college.calendar.management.index')}}">{{currentSession()->name}} Calender Management</a></h3>
                            </div>
                        <div class="course-date bg-color-1 clear-fix">
                            
                            <div class="description"><h1><i class="fa fa-calendar"></i>
                                <span>
                                    
                                </span></h1>
                                </div>
                        </div>
                    </div>
                </div>
                <!-- / calender item -->

                <!-- admission item -->
                <div class="col-md-4">
                    <div class="course-item shadow">
                        <div class="course-name clear-fix">
                        <h3>
                            <a href="{{route('admin.college.admission.index')}}">{{currentSession()->name}} Admission Report</a>
                        </h3>
                            </div>
                        <div class="course-date bg-color-1 clear-fix">
                            
                            <div class="description">
                                <h1><i class="fa fa-bar-chart-o">
                                    <span>{{$admissions ?? ''}}</span>
                                </i></h1>
                                </div>
                        </div>
                    </div>
                </div>
                <!-- / admission item -->
            </div>
        </div>
    </div>
</div>
       
@endsection