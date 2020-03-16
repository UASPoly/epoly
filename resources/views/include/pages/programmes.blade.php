<section class="padding-section">
    <div class="grid-row clear-fix">
        <h2 class="center-text">Our Programmes</h2>
        <div class="grid-col-row">
            @foreach($programmes as $programme)
            <div class="grid-col grid-col-4">
                <!-- course item -->
                <div class="course-item">
                    <div class="course-name clear-fix">
                        <h3><a href="#">{{$programme->name}}</a></h3>
                    </div>
                    <div class="course-date clear-fix">
                        <p style="color: black;">Programme Type {{$programme->programmeType->name}}</p>
                        <p style="color: black;">Department Of {{$programme->department->name}}</p>
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