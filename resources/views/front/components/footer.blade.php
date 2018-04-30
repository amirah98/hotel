@section('footer')
    <footer class="site-footer clearfix">
        <div class="sidebar-container">
            <div class="sidebar-inner">
                <div class="widget-area clearfix">
                    <div class="widget widget_azh_widget">
                        <div>
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-12 col-md-3 foot-logo"> <img src="{{ asset("front/images/logo1.png") }}" alt="logo">
                                        <p class="hasimg">Hotels worldwide incl. Infos, Ratings and Photos. Make your Hotel Reservation cheap.</p>
                                        <p class="hasimg">The top-rated hotel booking services.</p>
                                    </div>
                                    <div class="col-sm-12 col-md-3">
                                        <h4>Support &amp; Help</h4>
                                        <ul class="two-columns">
                                            <li><a href="dashboard.html">Dashboard</a>
                                            </li>
                                            <li><a href="db-activity.html">DB Activity</a>
                                            </li>
                                            <li><a href="{{ '/room_type' }}">Booking</a>
                                            </li>
                                            <li><a href="contact-us.html">Contact Us</a>
                                            </li>
                                            <li><a href="about-us.html">About Us</a>
                                            </li>
                                            <li><a href="aminities.html">Aminities</a>
                                            </li>
                                            <li><a href="blog.html">Blog</a>
                                            </li>
                                            <li><a href="menu1.html">Food Menu</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-12 col-md-3">
                                        <h4>Popular Services</h4>
                                        <ul class="two-columns">
                                            <li><a href="all-hotels.html">Our Hotels</a>
                                            </li>
                                            <li><a href="about-us.html">About Us</a>
                                            </li>
                                            <li><a href="contact-us.html">Contact Us</a>
                                            </li>
                                            <li><a href="all-rooms.html">Master Suite</a>
                                            </li>
                                            <li><a href="all-rooms.html">Mini-Suite</a>
                                            </li>
                                            <li><a href="all-rooms.html">Ultra Deluxe</a>
                                            </li>
                                            <li><a href="all-rooms.html">Luxury Room</a>
                                            </li>
                                            <li><a href="all-rooms.html">Normal Room</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-12 col-md-3">
                                        <h4>Address</h4>
                                        <p>28800 Orchard Lake Road, Suite 180 Farmington Hills, U.S.A. Landmark : Next To Airport</p>
                                        <p> <span class="foot-phone">Phone: </span> <span class="foot-phone">{{ config('app.phone_number', '977-9866893439') }}</span> </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="foot-sec2">
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-12 col-md-3">
                                        <h4>Payment Options</h4>
                                        <p class="hasimg"> <img src="{{ asset("front/images/payment.png") }}" alt="payment"> </p>
                                    </div>
                                    <div class="col-sm-12 col-md-4">
                                        <h4>Subscribe Now</h4>
                                        <form>
                                            <ul class="foot-subsc">
                                                <li>
                                                    <input type="text" placeholder="Enter your email id"> </li>
                                                <li>
                                                    <input type="submit" value="submit"> </li>
                                            </ul>
                                        </form>
                                    </div>
                                    <div class="col-sm-12 col-md-5 foot-social">
                                        <h4>Follow with us</h4>
                                        <p>Join the thousands of other There are many variations of passages of Lorem Ipsum available</p>
                                        <ul>
                                            <li><a href="{{ config('app.facebook') }}"><i class="fa fa-facebook" aria-hidden="true"></i></a> </li>
                                            <li><a href="{{ config('app.google') }}"><i class="fa fa-google-plus" aria-hidden="true"></i></a> </li>
                                            <li><a href="{{ config('app.twitter') }}"><i class="fa fa-twitter" aria-hidden="true"></i></a> </li>
                                            <li><a href="{{ config('app.instagram') }}"><i class="fa fa-instagram" aria-hidden="true"></i></a> </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- .widget-area -->
            </div>
            <!-- .sidebar-inner -->
        </div>
        <!-- #quaternary -->
    </footer>
    <section class="copy">
        <div class="container">
            <p>copyrights © 2017 {{ config('app.name', "The Hotel Symbiosis") }}. &nbsp;&nbsp;All rights reserved. </p>
        </div>
    </section>
    @show