<html>
    <head>
        <title>
            Study Tuddy
        </title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </head>

    <body style="display: flex;flex-direction: column;height: 100vh;"> 
        <header>
            <!-- Navigation Bar Starts -->
                <nav class="navbar navbar-expand-lg sticky-top" style="background-color: #002147;border-bottom: 5px solid #ffb606;font-weight: bolder;text-decoration: none;color: #ffb606;">
                    <div class="container">
                        <span class="navbar-brand mr-2">
                            Study Tuddy
                        </span>

                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <img src="res/menu.png" width="50px" alt="Menu Icon">
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav" style="margin-left: auto;">
                                    <li class="nav-item"><a class="nav-link" href="{{url('home')}}" style="color: #ffffff;">Home</a></li>
                                    <li class="nav-item"><a class="nav-link" href="{{url('subjects')}}" style="color: #ffffff;">Subjects</a></li>
                                    <li class="nav-item"><a class="nav-link" href="{{url('subjectperday')}}" style="color: #ffffff;">Subject Per Day</a></li>
                                    <li class="nav-item"><a class="nav-link" href="{{url('timeslots')}}" style="color: #ffffff;">Time Slots</a></li>
                                </ul>
                        </div>

                    </div>
                </nav>
            <!-- Navigation Bar Ends -->
        </header>
        <div>
            @yield('content')
        </div>
        
        <!-- Footer Starts -->
        <footer id="contact" style="border-top: 5px solid #ffb606;margin-top: auto;background-color: #002147;color: #ffffff;">
            <!-- Footer Body Starts -->
            <div class="container text-center pt-3 pb-3">
                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <h4>Contact</h4>
                        
                            Prosanto Deb<br>
                            32/1, North Mourail, Brahmanbaria <br>
                        

                        <a href="mailto:prosanto2514@student.nstu.edu.bd" style="color: #ffffff;">prosanto2514@student.nstu.edu.bd</a> <br>
                        <a href="tel:01793222825" style="color: #ffffff;">01793222825</a>
                    </div>
                </div>
            </div>
            <!-- Footer Body Ends -->

            <!-- Footer Bottom Starts -->
            <div class="footer-bottom pt-3" style="background: rgba(255, 255, 255, 0.08);">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <ul class="footer-ul" style=" margin: 0;list-style-type: none;text-align: center;">
                                <li>
                                <p>© 2022 All Rights Reserved.</p>
                                </li>
                            </ul>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <ul class="footer-ul" style=" margin: 0;list-style-type: none;text-align: center;">
                                <li>
                                    <p>Design, Development and Maintenance by
                                        <a href="https://github.com/orgs/Prosanto7" target="_blank" class="footer-link" style="color: #ffffff;">Prosanto Deb</a>
                                    </p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer Bottom Ends -->
            </footer>
    </body>
</html>