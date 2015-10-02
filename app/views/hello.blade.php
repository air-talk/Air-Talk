@extends('layouts.master')
@section('head')
    <link href="/css/hello.css" rel="stylesheet">
@stop
@section('content')
	</div>
    <!-- Header -->
    <header>
        <div class="container">
            <div class="row">
                <div class="col-xs-offset-6 col-xs-6">
                    <div class="intro-text">
                        <span class="name">Communicate with confidence.</span>
                        <a class="btn btn-success" href="{{{ action('UsersController@create') }}}">Get Started</a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Portfolio Grid Section -->
    <section id="portfolio">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Material</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4 portfolio-item">
                    <a href="#portfolioModal1" class="portfolio-link" data-toggle="modal">
                        <div class="caption">
                            <div class="caption-content">
                                <h3><i class="glyphicon glyphicon-zoom-in"></i></h3>
                                <h3>Class E</h3>
                            </div>
                        </div>
                        <img src="/images/class_e.png" class="img-responsive" alt="">
                    </a>
                </div>
                <div class="col-sm-4 portfolio-item">
                    <a href="#portfolioModal2" class="portfolio-link" data-toggle="modal">
                        <div class="caption">
                            <div class="caption-content">
                                <h3><i class="glyphicon glyphicon-zoom-in"></i></h3>
                                <h3>Class D</h3>
                            </div>
                        </div>
                        <img src="/images/class_d.png" class="img-responsive" alt="">
                    </a>
                </div>
                <div class="col-sm-4 portfolio-item">
                    <a href="#portfolioModal3" class="portfolio-link" data-toggle="modal">
                        <div class="caption">
                            <div class="caption-content">
                                <h3><i class="glyphicon glyphicon-zoom-in"></i></h3>
                                <h3>Class C</h3>
                            </div>
                        </div>
                        <img src="/images/class_c.png" class="img-responsive" alt="">
                    </a>
                </div>
                <div class="col-sm-4 portfolio-item">
                    <a href="#portfolioModal4" class="portfolio-link" data-toggle="modal">
                        <div class="caption">
                            <div class="caption-content">
                                <h3><i class="glyphicon glyphicon-zoom-in"></i></h3>
                                <h3>Class B</h3>
                            </div>
                        </div>
                        <img src="/images/class_b.png" class="img-responsive" alt="">
                    </a>
                </div>
                <div class="col-sm-4 portfolio-item">
                    <a href="#portfolioModal5" class="portfolio-link" data-toggle="modal">
                        <div class="caption">
                            <div class="caption-content">
                                <h3><i class="glyphicon glyphicon-zoom-in"></i></h3>
                                <h3>Aviation Vocabulary</h3>
                            </div>
                        </div>
                        <img src="/images/vocab.png" class="img-responsive" alt="">
                    </a>
                </div>
                <div class="col-sm-4 portfolio-item">
                    <a href="#portfolioModal6" class="portfolio-link" data-toggle="modal">
                        <div class="caption">
                            <div class="caption-content">
                                <h3><i class="glyphicon glyphicon-zoom-in"></i></h3>
                                <h3>Aircraft Recognition</h3>
                            </div>
                        </div>
                        <img src="/images/aircraft_recognition.png" class="img-responsive" alt="">
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="success" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>About</h2>
                    <hr class="star-light">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2" style="text-indent: 2.0em">
                    <p>Airtalk was created to help VFR and student pilots gain proficiency and confidence speaking on the radio in uncontrolled airspace and to airtraffic control. It is difficult to learn effective communication during flight when attention must be divided between a plethora of additional cockpit tasks. Airtalk allows for good practices to become engrained prior to takeoff, as opposed to on the fly!</p> 
                    <p>While many of the provided answers are not hard and fast rules, incorporating the techniques into your radio work will aid in clear communication. Understanding broadcasts and being understood by others is essential to being a safer, more conscientious pilot.</p> 
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Created by</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row text-center">
                <div class="col-sm-4">
                    <img src="/images/Alissa.jpg" class="img-circle img-responsive" alt="Alissa's headshot" style="margin: 0 auto" width="50%" height="440">
                    <h3>Alissa Stephens</h3>
                </div>
                <div class="col-sm-4">
                    <img src="/images/Zach.jpg" class="img-circle img-responsive" alt="Zach's headshot" style="margin: 0 auto" width="50%" height="440">
                    <h3>Zachary Hughes</h3>
                </div>
                <div class="col-sm-4">
                    <img src="/images/RemingtonW.jpg" class="img-circle img-responsive" alt="Remington's headshot" style="margin: 0 auto" width="50%" height="440">
                    <h3>Remington Williams</h3>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="text-center">
        <div class="footer-above">
            <div class="container">
                <div class="row">
                    <div class="footer-col col-md-4">
                        <h3>Location</h3>
                        <p>3481 Melrose Place<br>Beverly Hills, CA 90210</p>
                    </div>
                    <div class="footer-col col-md-4">
                        <h3>Additional Resources</h3>
                        <ul class="list-inline">
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-google-plus"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-linkedin"></i></a>
                            </li>
                            <li>
                                <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-dribbble"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="footer-col col-md-4">
                        <h3>Contact</h3>
                        <p>airtalk@gmail.com</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class="scroll-top page-scroll visible-xs visible-sm">
        <a class="btn btn-primary" href="#page-top">
            <i class="fa fa-chevron-up"></i>
        </a>
    </div>

    <!-- Portfolio Modals -->
    <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <h2>Project Title</h2>
                            <hr class="star-primary">
                            <img src="/images/airplane.png" class="img-responsive img-centered" alt="">
                            <p>A non-towered airport is an airport with no operating tower, or air traffic control unit. The vast majority of the world's airports are non-towered, and even airports with control towers may operate as non-towered during off-hours, typically during the night.</p>
                            <ul class="list-inline item-details">
                            </ul>
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="portfolio-modal modal fade" id="portfolioModal2" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <h2>Project Title</h2>
                            <hr class="star-primary">
                            <img src="/images/bird.png" class="img-responsive img-centered" alt="">
                            <p>Class D airspace is generally cylindrical in form and normally extends from the surface to 2,500 feet (760 m) above the ground. The outer radius of the airspace is variable, but is generally 4 nautical miles. Airspace within the given radius, but in surrounding class C or class B airspace, is excluded. Class D airspace reverts to class E or G during hours when the tower is closed, or under other special conditions. (AIM 3-2-5)</p>
                            <ul class="list-inline item-details">
                            </ul>
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="portfolio-modal modal fade" id="portfolioModal3" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <h2>Project Title</h2>
                            <hr class="star-primary">
                            <img src="/images/Alissa.jpg" class="img-responsive img-centered" alt="">
                            <p>Class C space is structured in much the same way as class B airspace, but on a smaller scale. Class C airspace is defined around airports of moderate importance that have an operational control tower and is in effect only during the hours of tower operation at the primary airport. The vertical boundary is usually 4,000 feet (1,200 m) above the airport surface. The core surface area has a radius of five nautical miles (9 km), and goes from the surface to the ceiling of the class C airspace. The upper 'shelf' area has a radius of ten nautical miles, and extends from as low as 1,200 feet (370 m) up to the ceiling of the airspace. A procedural 'outer area' (not to be confused with the shelf area) has a radius of 20 nautical miles. (AIM 3-2-4)</p>
                            <ul class="list-inline item-details">
                            </ul>
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="portfolio-modal modal fade" id="portfolioModal4" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <h2>Project Title</h2>
                            <hr class="star-primary">
                            <img src="/images/Alissa.jpg" class="img-responsive img-centered" alt="">
                            <p>Class B airspace is defined around key airport traffic areas, usually airspace surrounding the busiest airports in the US according to the number of IFR operations and passengers served. The exact shape of the airspace varies from one class B area to another, but in most cases it has the shape of an inverted wedding cake, with a series of circular 'shelves' of airspace of several thousand feet in thickness centered on a specific airport. Each shelf is larger than the one beneath it. Class B airspace normally begins at the surface in the immediate area of the airport, and successive shelves of greater and greater radius begin at higher and higher altitudes at greater distances from the airport. Many class B airspaces diverge from this model to accommodate traffic patterns or local topological or other features. The upper limit of class B airspace is normally 10,000 feet (3,000 m)</p>
                            <ul class="list-inline item-details">
                            </ul>
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="portfolio-modal modal fade" id="portfolioModal5" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <h2>Project Title</h2>
                            <hr class="star-primary">
                            <img src="/images/Alissa.jpg" class="img-responsive img-centered" alt="">
                            <p>Use this area of the page to describe your project. The icon above is part of a free icon set by <a href="https://sellfy.com/p/8Q9P/jV3VZ/">Flat Icons</a>. On their website, you can download their free set with 16 icons, or you can purchase the entire set with 146 icons for only $12!</p>
                            <ul class="list-inline item-details">
                            </ul>
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="portfolio-modal modal fade" id="portfolioModal6" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-content">
            <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                    <div class="rl">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="modal-body">
                            <h2>Project Title</h2>
                            <hr class="star-primary">
                            <img src="/images/Alissa.jpg" class="img-responsive img-centered" alt="">
                            <p>Use this area of the page to describe your project. The icon above is part of a free icon set by <a href="https://sellfy.com/p/8Q9P/jV3VZ/">Flat Icons</a>. On their website, you can download their free set with 16 icons, or you can purchase the entire set with 146 icons for only $12!</p>
                            <ul class="list-inline item-details">
                            </ul>
                            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>

</html>

@stop
@section('script')
    <!-- Custom Theme JavaScript -->
    <script src="js/freelancer.js"></script>
@stop