<div class="col-md-4">
    <!-- course item -->
    <a href="#" data-target="#session" data-toggle="modal">
	    <div class="course-item shadow">
	        <div class="course-name clear-fix">
	        <h3>{{currentSession()->name}} Session Calendar</h3>
	        </div>
	        <div class="course-date bg-color-1 clear-fix">
	            <div class="h5">

	            	<div class="time"><i class="fa fa-clock-o"></i>Session Start At {{date('d/M/Y', strtotime(currentSession()->start))}}
	            	</div>

	            	<div class="time"><i class="fa fa-clock-o"></i>Session Ends At {{date('d/M/Y', strtotime(currentSession()->end))}}
	            	</div>

	            </div>
	        </div>
	    </div>
    </a>
    @include('admin::college.calendar.management.session.infor')
</div>