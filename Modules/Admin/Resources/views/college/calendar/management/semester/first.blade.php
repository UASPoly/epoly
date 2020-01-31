<div class="col-md-4">
    <!-- course item -->
    <div class="course-item shadow">
        <div class="course-name clear-fix">
        <h3>{{currentSession()->name}} {{currentSemester()->name}} Course Allocation Calendar</h3>
        </div>
        <div class="course-date bg-color-1 clear-fix">
            <div class="h5">
                @foreach(currentSession()->semesterCalendars->where('semester_id',1) as $semesterCalendar)
	            	<div class="time"><i class="fa fa-clock-o"></i>{{$semesterCalendar->courseAllocationCalendar->countDown()}}
	            	</div>
                @endforeach
            </div>
        </div>
    </div>    
</div>

<div class="col-md-4">
    
    <div class="course-item shadow">
        <div class="course-name clear-fix">
        <h3>{{currentSession()->name}} {{currentSemester()->name}} Lecture Caleder</h3>
        </div>
        <div class="course-date bg-color-1 clear-fix">
            <div class="h5">
            	@foreach(currentSession()->semesterCalendars->where('semester_id',1) as $semesterCalendar)
	            	<div class="time"><i class="fa fa-clock-o"></i>{{$semesterCalendar->lectureCalendar->countDown()}}
	            	</div>
                @endforeach
            </div>
        </div>
    </div>
    
</div>

<div class="col-md-4">
    <div class="course-item shadow">
        <div class="course-name clear-fix">
        <h3>{{currentSession()->name}} {{currentSemester()->name}} Examination Calendar</h3>
        </div>
        <div class="course-date bg-color-1 clear-fix">
            <div class="h5">
            	@foreach(currentSession()->semesterCalendars->where('semester_id',1) as $semesterCalendar)
	            	<div class="time"><i class="fa fa-clock-o"></i>{{$semesterCalendar->examCalendar->countDown()}}
	            	</div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<div class="col-md-12"><br></div>

<div class="col-md-4">
    <div class="course-item shadow">
        <div class="course-name clear-fix">
        <h3>{{currentSession()->name}} {{currentSemester()->name}} Marking Calendar</h3>
        </div>
        <div class="course-date bg-color-1 clear-fix">
            <div class="h5">
	            @foreach(currentSession()->semesterCalendars->where('semester_id',1) as $semesterCalendar)
	            	<div class="time"><i class="fa fa-clock-o"></i>{{$semesterCalendar->markingCalendar->countDown()}}
	            	</div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<div class="col-md-4">
    <div class="course-item shadow">
        <div class="course-name clear-fix">
        <h3>{{currentSession()->name}} {{currentSemester()->name}} Result Upload Calendar</h3>
        </div>
        <div class="course-date bg-color-1 clear-fix">
            <div class="h5">
            	@foreach(currentSession()->semesterCalendars->where('semester_id',1) as $semesterCalendar)
	            	<div class="time"><i class="fa fa-clock-o"></i>{{$semesterCalendar->uploadResultCalendar->countDown()}}
	            	</div>
                @endforeach
            </div>
        </div>
    </div>
</div>