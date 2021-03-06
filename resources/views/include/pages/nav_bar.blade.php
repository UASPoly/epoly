
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
                                    <a href="{{route('welcome')}}" class="active"><i class="fa fa-home"></i>Home</a>
                                </li>
                            @else
                                <li>
                                    <a href="{{route(home_route())}}" class="active"><i class="fa fa-dashboard"></i> Dashboard</a>
                                </li>
                            @endif

                            <li>
                                <a href="#"><i class="fa fa-calendar"></i> Calendar</a>
                                <!-- sub menu -->
                                <ul>
                                    @if(admin())
                                        @if(!hasCurrentSession())
                                        <li>
                                            <a href="{{route('admin.college.calendar.management.generate')}}">Generate {{date('Y')-1}}/{{date('Y')}} Calendar</a>
                                        </li>
                                        @endif
                                        <li>
                                            <a href="{{route('admin.college.calendar.management.index')}}"> Modify Current Calendar </a>
                                        </li>
                                        <li>
                                            <a href="#" data-toggle="modal" data-target="#activate_session" > Switch Calendar </a>
                                        </li>
                                    <!-- the modal is included from main layouts.app -->
                                    @endif
                                    <!--  -->
                                </ul>
                                <!-- / sub menu -->
                            </li>
                            @yield('nav-bar')
                            @if(!auth()->check())
                            <li>
                                <a href="{{route('student.login')}}">Sign In</a>
                            </li>
                            @else
                            <li>
                            
                                @if(user_image() == 'img/user.png')
                                    <a href="#"><img src="{{asset(user_image())}}"  height="45" width="45" class="img-circle user-img rounded-circle"></a>                                     
                                @else
                                    <a href="#"><img src="{{storage_url(user_image())}}"  height="45" width="45" class="img-circle user-img rounded-circle"></a>
                                @endif
                                <ul>
                                    <li>
                                        <a href="#">
                                            <b>
                                            @if(lecturer())
                                                Hi {{lecturer()->staff->first_name}} {{lecturer()->staff->last_name}}
                                            @endif
                                            </b>
                                        </a>
                                    </li>
                                    <li><a href="{{ route(logout_route()) }}"
                                        onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();"><i class="ti-power-off m-r-5"></i> Logout</a>
                                    </li>
                                </ul>
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
    