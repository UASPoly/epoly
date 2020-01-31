@extends('admin::layouts.master')
@section('title')
    admin {{$department->name}} management page
@endsection
@section('page-content')
<div class="row">
	<div class="col-md-12">
		<br>
		<div class="card shadow">
			<div class="card-body">
				<div class="row">

					<div class="col-md-4">
		                <!-- course item -->
		                <a href="{{route('admin.college.department.management.hod.index',[$department->id])}}">
					    <div class="course-item shadow">
					        <div class="course-name clear-fix">
					        <h3>Head of departments</h3>
					        </div>
					        <div class="course-date bg-color-1 clear-fix">
					            <div class="h3"><i class="fa fa-chart"></i>Number Of Head of department {{count($department->headOfDepartments)}}</div>
					        </div>
					    </div>
					    </a>
		                <!-- / course item -->
		            </div>

		            <div class="col-md-4">
		                <!-- course item -->
		                <a href="{{route('admin.college.department.management.examofficer.index',[$department->id])}}">
					    <div class="course-item shadow">
					        <div class="course-name clear-fix">
					        <h3>Exam Officers</h3>
					        </div>
					        <div class="course-date bg-color-1 clear-fix">
					            <div class="h3"><i class="fa fa-chart"></i>Number Of Exam Officers {{count($department->examOfficers)}}</div>
					        </div>
					    </div>
					    </a>
		                <!-- / course item -->
		            </div>

					<div class="col-md-4">
		                <!-- course item -->
		                <a href="{{route('admin.college.department.management.lecturer.index',[$department->id])}}">
					    <div class="course-item shadow">
					        <div class="course-name clear-fix">
					        <h3>Lecturers</h3>
					        </div>
					        <div class="course-date bg-color-1 clear-fix">
					            <div class="h3"><i class="fa fa-chart"></i>Number Of Lecturers {{count($department->staffs)}}</div>
					        </div>
					    </div>
					    </a>
		                <!-- / course item -->
		            </div>

                    <div class="col-md-12"><br></div>

					<div class="col-md-4">
					    <!-- course item -->
					    <div class="course-item shadow">
					        <div class="course-name clear-fix">
					        <h3>Staffs</h3>
					        </div>
					        <div class="course-date bg-color-1 clear-fix">
					            <div class="h3"><i class="fa fa-chart"></i>Number Of Staffs {{count($department->staffs)}}</div>
					        </div>
					    </div>
					    <!-- / course item -->
					</div>

					<div class="col-md-4">
					    <!-- course item -->
					    <a href="{{route('admin.college.department.management.appointment.index',
					    [$department->id])}}">
						    <div class="course-item shadow">
						        <div class="course-name clear-fix">
						        <h3>Appointment</h3>
						        </div>
						        <div class="course-date bg-color-1 clear-fix">
						            <div class="h3"><i class="fa fa-chart"></i>Number Of Staffs {{count($department->staffs)}}</div>
						        </div>
						    </div>
						</a>
					    <!-- / course item -->
					</div>
                    
					<div class="col-md-4">
					    <!-- department programme item -->
					    <a href="{{route('admin.college.department.management.programme.index',
					    [$department->id])}}">
						    <div class="course-item shadow">
						        <div class="course-name clear-fix">
						        <h3>Programmes</h3>
						        </div>
						        <div class="course-date bg-color-1 clear-fix">
						            <div class="h3"><i class="fa fa-chart"></i>Number Of Programmes {{count($department->programmes)}}</div>
						        </div>
						    </div>
					    </a>
					    <!-- / department programme item -->
					</div>
                    
                    <div class="col-md-12"><br></div>

					<div class="col-md-4">
					    <!-- course item -->
					    <a href="{{route('admin.college.department.management.course.index',
					    [$department->id])}}">
					    <div class="course-item shadow">
					        <div class="course-name clear-fix">
					        <h3>Courses</h3>
					        </div>
					        <div class="course-date bg-color-1 clear-fix">
					            <div class="h3"><i class="fa fa-chart"></i>Number Of Courses {{count($department->courses)}}</div>
					        </div>
					    </div>
					    </a>
					    <!-- / course item -->
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection