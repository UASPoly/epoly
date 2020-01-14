@extends('admin::layouts.master')

@section('page-content')
<div class="col-md-12">
    <br>
    <div class="card shadow">
        <div class="card-body">
            <div class="row">

                <!-- college item -->
                <div class="col-md-4">
                    <div class="course-item">
                        <div class="course-name clear-fix">
                        <h3><a href="{{route('admin.college.index')}}">Colleges</a></h3>
                            </div>
                        <div class="course-date bg-color-1 clear-fix">
                            
                            <div class="description"><h1><i class="fa fa-pencil"></i>
                                <span>
                                    {{count(admin()->colleges())}} Colleges
                                </span></h1>
                                </div>
                        </div>
                    </div>
                </div>
                <!-- / College item -->

            </div>
        </div>
    </div>
</div>
       
@endsection