<section class="padding-section">
    <div class="grid-row clear-fix">
        <h2 class="center-text">Our Colleges</h2>
        <div class="grid-col-row">
            @foreach($colleges as $college)
            <div class="grid-col grid-col-4">
                <!-- course item -->
                <div class="course-item">
                    <div class="course-name clear-fix">
                        <h3><a href="#">College of {{$college->name}}</a></h3>
                    </div>
                    <div class="course-date clear-fix" style="background-color: white">
                        <p style="color: black;">Established At {{$college->established_date}}</p>
                        <p style="color: black;">{{$college->description}}</p>
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