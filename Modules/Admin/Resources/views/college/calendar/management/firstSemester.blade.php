<div class="col-md-4">
    <!-- course item -->
    <a href="#" data-target="#allocation_1" data-toggle="modal">
    <div class="course-item shadow">
        <div class="course-name clear-fix">
        <h3>Course Allocation Calendar</h3>
        </div>
        <div class="course-date bg-color-1 clear-fix">
            <div class="h5">

                @foreach(currentSession()->semesterCalendars->where('semester_id',1) as $semesterCalendar)
	            	<div class="time"><i class="fa fa-clock-o"></i>Course Allocation Start At {{date('d/M/Y', strtotime($semesterCalendar->courseAllocationCalendar->start))}}
	            	</div>

	            	<div class="time"><i class="fa fa-clock-o"></i>Course Allocation Ends At {{date('d/M/Y', strtotime($semesterCalendar->courseAllocationCalendar->end))}}
	            	</div>
                @endforeach
            </div>
        </div>
    </div>
    </a>
    @include('admin::college.calendar.management.courseAllocation.infor')
    <!-- / course item -->
</div>

<div class="col-md-4">
    <!-- course item -->
    <a href="#" data-target="#lecture_1" data-toggle="modal">
    <div class="course-item shadow">
        <div class="course-name clear-fix">
        <h3>{{currentSession()->name}} Lecture Caleder</h3>
        </div>
        <div class="course-date bg-color-1 clear-fix">
            <div class="h5">
            	@foreach(currentSession()->semesterCalendars->where('semester_id',1) as $semesterCalendar)
	            	<div class="time"><i class="fa fa-clock-o"></i>Lecture Start At {{date('d/M/Y', strtotime($semesterCalendar->lectureCalendar->start))}}
	            	</div>

	            	<div class="time"><i class="fa fa-clock-o"></i>Lecture Ends At {{date('d/M/Y', strtotime($semesterCalendar->lectureCalendar->end))}}
	            	</div>
                @endforeach
            </div>
        </div>
    </div>
    </a>
    @include('admin::college.calendar.management.lecture.infor')
    <!-- / course item -->
</div>

<div class="col-md-4">
    <!-- course item -->
    <a href="#" data-target="#exam_1" data-toggle="modal">
	    <div class="course-item shadow">
	        <div class="course-name clear-fix">
	        <h3>{{currentSession()->name}} Examination Calendar</h3>
	        </div>
	        <div class="course-date bg-color-1 clear-fix">
	            <div class="h5">
	            	@foreach(currentSession()->semesterCalendars->where('semester_id',1) as $semesterCalendar)
		            	<div class="time"><i class="fa fa-clock-o"></i>Examination Start At {{date('d/M/Y', strtotime($semesterCalendar->examCalendar->start))}}
		            	</div>

		            	<div class="time"><i class="fa fa-clock-o"></i>Examination Ends At {{date('d/M/Y', strtotime($semesterCalendar->examCalendar->end))}}
		            	</div>
	                @endforeach
	            </div>
	        </div>
	    </div>
	</a>
	@include('admin::college.calendar.management.exam.infor')
    <!-- / course item -->
</div>

<div class="col-md-12"><br></div>

<div class="col-md-4">
    <!-- course item -->
    <a href="#" data-target="#marking_1" data-toggle="modal">
	    <div class="course-item shadow">
	        <div class="course-name clear-fix">
	        <h3>{{currentSession()->name}} Marking Calendar</h3>
	        </div>
	        <div class="course-date bg-color-1 clear-fix">
	            <div class="h5">
		            @foreach(currentSession()->semesterCalendars->where('semester_id',1) as $semesterCalendar)
		            	<div class="time"><i class="fa fa-clock-o"></i>Lecture Start At {{date('d/M/Y', strtotime($semesterCalendar->markingCalendar->start))}}
		            	</div>

		            	<div class="time"><i class="fa fa-clock-o"></i>Lecture Ends At {{date('d/M/Y', strtotime($semesterCalendar->markingCalendar->end))}}
		            	</div>
	                @endforeach
	            </div>
	        </div>
	    </div>
	</a>
	@include('admin::college.calendar.management.marking.infor')
    <!-- / course item -->
</div>

<div class="col-md-4">
    <!-- department programme item -->
    <a href="#" data-toggle="modal" data-target="#upload_1">
	    <div class="course-item shadow">
	        <div class="course-name clear-fix">
	        <h3>{{currentSession()->name}} Result Upload Calendar</h3>
	        </div>
	        <div class="course-date bg-color-1 clear-fix">
	            <div class="h5">
	            	@foreach(currentSession()->semesterCalendars->where('semester_id',1) as $semesterCalendar)
		            	<div class="time"><i class="fa fa-clock-o"></i>Lecture Start At {{date('d/M/Y', strtotime($semesterCalendar->uploadResultCalendar->start))}}
		            	</div>

		            	<div class="time"><i class="fa fa-clock-o"></i>Lecture Ends At {{date('d/M/Y', strtotime($semesterCalendar->uploadResultCalendar->end))}}
		            	</div>
	                @endforeach
	            </div>
	        </div>
	    </div>
    </a>
    @include('admin::college.calendar.management.upload.infor')
    <!-- / department programme item -->
</div>