
    <header class="only-color">
        <div class="sticky-wrapper">
            <div class="sticky-menu">
                <div class="grid-row clear-fix">
                    <!-- logo -->
                    <a href="index.html" class="logo">
                        <img src="{{ asset('img/logo.png') }}"  data-at2x="img/logo@2x.png" alt>
                        <h1>UASPoly</h1>
                    </a>
                    <!-- / logo -->
                    <nav class="main-nav">
                        <ul class="clear-fix">
                            <!-- menus -->
                            @if(!auth()->check())
                                <li>
                                    <a href="{{route('welcome')}}" class="active h3"><i class="fa fa-home"></i>Home</a>
                                </li>
                            @else
                                <li>
                                    <a href="{{route(home_route())}}" class="active"><i class="fa fa-dashboard"></i> Dashboard</a>
                                </li>
                            @endif

                            @if(!auth()->check())
                            <li>
                                <a href="#">Collages</a>
                                <!-- sub menu -->
                                <ul>
                                    <li><a href="courses-grid.html">Science And Technology</a></li>
                                    
                                </ul>
                                <!-- / sub menu -->
                            </li>

                            <li class="megamenu">
                                <a href="">Departments</a>
                                <!-- sub mega menu -->
                                <ul class="clear-fix">
                                    <li><div class="header-megamenu">College</div>
                                        <ul>
                                            <li><a href="page-about-us.html">Department</a></li>
                                        </ul>
                                    </li>
                                    <li><div class="header-megamenu">Colleges</div>
                                        <ul>
                                            <li><a href="page-about-us.html">Department</a></li>
                                        </ul>
                                    </li>
                                </ul>
                                <!-- / sub mega menu -->
                            </li>
                            
                            @endif
                            <li>
                                <a href="#"><i class="fa fa-calendar"></i> Calendar</a>
                                <!-- sub menu -->
                                <ul>
                                    @if(admin() || examOfficer() || headOfDepartment())
                                        @if(!currentSession()->sessionCalendar)
                                        <li>
                                            <a href="{{route('admin.calender.create')}}">New {{currentSession()->name}} Calendar</a>
                                        </li>
                                        @else
                                        <li>
                                            <a href="{{route('admin.calender.view',[str_replace('/','-',currentSession()->name)])}}">View {{currentSession()->name}} Calendar</a>
                                        </li>
                                        @endif
                                        <li>
                                            <a href="#" data-toggle="modal" data-target="#activate_session" >Activate New Calendar</a>
                                        </li>
                                    <!-- the modal is included from main layouts.app -->
                                    @endif
                                    
                                    
                                </ul>
                                <!-- / sub menu -->
                            </li>
                            @yield('nav-bar')
                            @if(!auth()->check())
                            <li>
                                <a href="{{route('student.login')}}">Sign In</a>
                            </li>
                            @else
                                <li><a href="{{ route(logout_route()) }}"
                                    onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();"><i class="ti-power-off m-r-5"></i> Logout</a>
                                </li>

                                <form id="logout-form" action="{{ route(logout_route()) }}"    method="POST" style="display: none;">
                                    @csrf
                                </form>
                            @endif
                            
                            <!-- /menus -->
                        </ul>
                    </nav>
                </div>
            </div>
        </div> 
    </header>
    