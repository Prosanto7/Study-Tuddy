        <header>
            <!-- Navigation Bar Starts -->
                <nav class="navbar navbar-expand-lg sticky-top">
                    <div class="container">
                        <span class="navbar-brand mr-2">
                            Study Tuddy
                        </span>

                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <img src="{{url('images/menu.png')}}" width="50px" alt="Menu Icon">
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav" style="margin-left: auto;">
                                    @if (session()->has('email'))
                                        <li class="nav-item"><a class="nav-link" href="{{url('home')}}" style="color: #ffffff;">Home</a></li>
                                        <li class="nav-item"><a class="nav-link" href="{{url('subjects')}}" style="color: #ffffff;">Subjects</a></li>
                                        <li class="nav-item"><a class="nav-link" href="{{url('subjectsperday')}}" style="color: #ffffff;">Subjects Per Day</a></li>
                                        <li class="nav-item"><a class="nav-link" href="{{url('timeslots')}}" style="color: #ffffff;">Time Slots</a></li>
                                        <li class="nav-item"><a class="nav-link" href="{{url('logout')}}" style="color: #ffffff;">Logout</a></li>
                                    @else 
                                        <li class="nav-item"><a class="nav-link" style="color: #ffffff;">Plan Your Study</a></li>
                                    @endif
                                </ul>
                        </div>

                    </div>
                </nav>
            <!-- Navigation Bar Ends -->
        </header>