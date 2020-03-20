<!-- footer -->
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    @guest
    <footer class="footer">
        <div class="grid-row">
            <div class="grid-col-row clear-fix">
                <section class="grid-col grid-col-4 footer-about">
                    <h2 class="corner-radius">About Us</h2>
                    <div>
                        <h3>UMARU ALI SHINKAFI POLYTECHNIC SOKOTO</h3>
                        <p>The Umaru Ali shinkafi polytechnic is a State-Goverment owned tertiary institution<br>
                            located at Sokoto State, Nigeria. It currently has eight faculties which are: <br> 
                            School of Adminstrative and Business Studies, School of Art and Humanities,<br>
                            School of Science and Technology, School of Engineering, School of Enviromental Studies,School of Basic and Prelimainary Studies,
                            <br>School of Agriculture and School of Center for Strategic and Development Studies.
                        </p>
                    </div>
                    <address>
                        <p></p>
                        <a href="tel:123-123456789" class="phone-number">123-123456789</a>
                        <br />
                        <a href="mailto:uni@domain.com" class="email">uni@domain.com</a>
                        <br />
                        <a href="www.sample.com" class="site">www.sample.com</a>
                        <br />
                        <a href="www.sample.com" class="address">250 Biscayne Blvd. (North) 11st Floor<br/>New World Tower Miami, 33148</a>
                    </address>
                    <div class="footer-social">
                        <a href="" class="fa fa-twitter"></a>
                        <a href="" class="fa fa-skype"></a>
                        <a href="" class="fa fa-google-plus"></a>
                        <a href="" class="fa fa-rss"></a>
                        <a href="" class="fa fa-youtube"></a>
                    </div>
                </section>
                <section class="grid-col grid-col-4 footer-latest">
                    <h2 class="corner-radius" style="color: black;">Latest programmes</h2>
                    @foreach($programmes as $programme)
                    <article>
                        
                        <h3>{{$programme->name}}</h3>
                        <div class="course-date">
                            <div>Schedules</div>
                            @foreach($programme->programmeSchedules as $programmeSchedule)
                                <div>
                                    {{$programmeSchedule->schedule->name}}
                                </div>
                            @endforeach
                        </div>
                        <div class="course-date">
                            <div>Department</div>
                            <div>{{$programme->department->name}}</div>
                        </div>
                        <div class="course-date">
                            <div>College</div>
                            <div>{{$programme->department->college->name}}</div>
                        </div>
                    </article>
                    @endforeach
                </section>
                <section class="grid-col grid-col-4 footer-contact-form">
                    <h2 class="corner-radius">Say some thing about us</h2>
                    <div class="email_server_responce"></div>
                    <form action="php/contacts-process.php" class="contact-form" method="post" novalidate="novalidate">
                        <p><span class="your-name"><input type="text" name="name" value="" size="40" placeholder="Name" aria-invalid="false" required></span>
                        </p>
                        <p><span class="your-email"><input type="text" name="phone" value="" size="40" placeholder="Phone" aria-invalid="false" required></span> </p>
                        <p><span class="your-message"><textarea name="message" placeholder="Comments" cols="40" rows="5" aria-invalid="false" required></textarea></span> </p>
                        <button type="submit" class="cws-button bt-color-3 border-radius alt icon-right">Submit <i class="fa fa-angle-right"></i></button>
                    </form>
                </section>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="grid-row clear-fix">
                <div class="">UASPoly<span></span> 2019 - {{date('Y')}} . All Rights Reserved</div>
            </div>
        </div>
    </footer>
    @endguest
    <!-- / footer -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <script type="text/javascript" src="http://google-maps-utility-library-v3.googlecode.com/svn/trunk/infobox/src/infobox_packed.js"></script>
    <script type='text/javascript' src="{{asset('js/jquery.validate.min.js')}}"></script>
    <script src="{{asset('js/jquery.form.min.js')}}"></script>
    <script src="{{asset('js/TweenMax.min.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>
    <!-- jQuery REVOLUTION Slider  -->
    <script type="text/javascript" src="{{asset('rs-plugin/js/jquery.themepunch.tools.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('rs-plugin/js/jquery.themepunch.revolution.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('rs-plugin/js/extensions/revolution.extension.video.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('rs-plugin/js/extensions/revolution.extension.slideanims.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('rs-plugin/js/extensions/revolution.extension.actions.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('rs-plugin/js/extensions/revolution.extension.layeranimation.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('rs-plugin/js/extensions/revolution.extension.kenburn.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('rs-plugin/js/extensions/revolution.extension.navigation.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('rs-plugin/js/extensions/revolution.extension.migration.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('rs-plugin/js/extensions/revolution.extension.parallax.min.js')}}"></script>     
    <script src="{{ asset('js/jquery.isotope.min.js')}}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/jflickrfeed.min.js')}}"></script>
    <script src="{{ asset('js/jquery.tweet.js')}}"></script>
    <script src="{{asset('tuner/js/colorpicker.js')}}"></script>
    <script type='text/javascript' src="{{asset('tuner/js/scripts.js')}}"></script>
    <script src="{{ asset('js/jquery.fancybox.pack.js')}}"></script>
    <script src="{{ asset('js/jquery.fancybox-media.js')}}"></script>
    <script src="{{ asset('js/retina.min.js')}}"></script>
    @auth
    <script src="{{ asset('js/app.js') }}"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    @endauth
    @yield('scripts')
</body>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
</html>