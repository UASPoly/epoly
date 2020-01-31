<section class="padding-section">
            <div class="grid-row clear-fix">
                <h2 class="center-text">Programmes Offered</h2>
                <div class="grid-col-row">
                    @foreach($programmes as $programme)
                    <div class="grid-col grid-col-4">
                        <!-- course item -->
                        <div class="course-item">
                            
                            <div class="course-name clear-fix">
                            <h3><a href="#">{{$programme->name}}</a></h3>
                                </div>
                            <div class="course-date bg-color-1 clear-fix">
                                
                            </div>
                        </div>
                        <!-- / course item -->
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- / section -->