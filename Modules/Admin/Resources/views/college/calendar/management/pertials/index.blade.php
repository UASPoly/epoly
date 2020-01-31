
	<div class="col-md-12">
		<br>
		<div class="card shadow">
			<div class="card-body">
				<div class="row">

					<div class="col-md-12">
		                
	                	<button data-toggle="tab" data-target="#session" class="btn btn-block button-fullwidth cws-button bt-color-3 shadow">
		                	{{currentSession()->name}} Session Calendar
		                </button>
                    </div>

                    <div class="col-md-12"><br></div>

                    @include('admin::college.calendar.management.session')
                    
                    <div class="col-md-12"><br></div>

                    <div class="col-md-12">
		                <button data-toggle="tab" data-target="#1_allocation" class="btn btn-block button-fullwidth cws-button bt-color-3 shadow">
		                	{{currentSession()->name}} First Semester Calendar
		                </button>
                    </div>

                    <div class="col-md-12"><br></div>

                    @include('admin::college.calendar.management.firstSemester')

                    <div class="col-md-12"><br></div>

		            <div class="col-md-12">
		                <button class="btn btn-block button-fullwidth cws-button bt-color-3 shadow">
		                	{{currentSession()->name}} Second Semester Calender
		                </button>
                    </div>

                    <div class="col-md-12"><br></div>

                    @include('admin::college.calendar.management.secondSemester')

				</div>
			</div>
		</div>
	</div>
