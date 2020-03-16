<section class="padding-section">
    <div class="grid-row clear-fix">
        <h2 class="center-text">Our Departments</h2>
        <div class="grid-col-row">
            @foreach($departments as $department)
            <div class="grid-col grid-col-4">
                <!-- course item -->
                <div class="course-item">
                    <div class="course-name clear-fix">
                        <h3><a href="#">{{strtoupper($department->name)}}</a></h3>
                    </div>
                    <div class="course-date clear-fix">
                        <p style="color: black;">Established At {{$department->established_date}}</p>
                        <p style="color: black;">{{$department->description}}</p>
                    </div>
                </div>
                <!-- / course item -->
                <br>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- / section -->