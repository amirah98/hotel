@extends('layouts.front')

@section('content')
    <!--Check Availability SECTION-->
    <div>
        <div class="slider fullscreen">
            <ul class="slides">
                @forelse($images as $image)
                <li> <img src="{{'/storage/slider/'.$image->name}}" alt="">
                    <!-- random image -->
                    <div class="caption center-align slid-cap">
                        <h5 class="light grey-text text-lighten-3">{{ $image->small_title }}</h5>
                        <h2>{{ $image->big_title }}</h2>
                        <p>{{ $image->description }}</p>
                        <a href="{{ $image->link }}" class="waves-effect waves-light">{{ $image->link_text }}</a></div>
                </li>
                    @empty
                    <li> <img src="{{ asset("front/images/slider/1.jpg") }}" alt="">
                    <!-- random image -->
                    <div class="caption center-align slid-cap">
                        <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
                        <h2>This is our big Tagline!</h2>
                        <p>Mauris non placerat nulla. Sed vestibulum quam mauris, et malesuada tortor venenatis at.Aenean euismod sem porta est consectetur posuere. Praesent nisi velit, porttitor ut imperdiet a, pellentesque id mi.</p> <a href="#" class="waves-effect waves-light">Booking</a></div>
                </li>
                    @endforelse
            </ul>
        </div>
    </div>
    <!--End Check Availability SECTION-->
    <!--HOTEL ROOMS SECTION-->
    <div class="hom1 hom-com pad-bot-40">
        <div class="container">
            <div class="row">
                <div class="hom1-title">
                    <h2>Our Hotel Rooms</h2>
                    <div class="head-title">
                        <div class="hl-1"></div>
                        <div class="hl-2"></div>
                        <div class="hl-3"></div>
                    </div>
                    <p>Aenean euismod sem porta est consectetur posuere. Praesent nisi velit, porttitor ut imperdiet a, pellentesque id mi.</p>
                </div>
            </div>
            <div class="row">
                <div class="to-ho-hotel">
                    <!-- HOTEL GRID -->
                    <div class="col-md-4">
                        <div class="to-ho-hotel-con">
                            <div class="to-ho-hotel-con-1">
                                <div class="hom-hot-av-tic"> Available Tickets: 42 </div> <img src="{{ asset("front/images/room/3.jpg") }}" alt=""> </div>
                            <div class="to-ho-hotel-con-23">
                                <div class="to-ho-hotel-con-2"> <a href="all-rooms.html"><h4>Master Room</h4></a> </div>
                                <div class="to-ho-hotel-con-3">
                                    <ul>
                                        <li>City: illunois,united states
                                            <div class="dir-rat-star ho-hot-rat-star"> Rating: <i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i> </div>
                                        </li>
                                        <li><span class="ho-hot-pri-dis">$720</span><span class="ho-hot-pri">$420</span> </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- HOTEL GRID -->
                    <div class="col-md-4">
                        <div class="to-ho-hotel-con">
                            <div class="to-ho-hotel-con-1">
                                <div class="hom-hot-av-tic"> Available Tickets: 520 </div> <img src="{{ asset("front/images/room/1.jpg") }}" alt=""> </div>
                            <div class="to-ho-hotel-con-23">
                                <div class="to-ho-hotel-con-2"> <a href="all-rooms.html"><h4>Mini-Suite</h4></a> </div>
                                <div class="to-ho-hotel-con-3">
                                    <ul>
                                        <li>City: illunois,united states
                                            <div class="dir-rat-star ho-hot-rat-star"> Rating: <i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i> </div>
                                        </li>
                                        <li><span class="ho-hot-pri-dis">$840</span><span class="ho-hot-pri">$540</span> </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- HOTEL GRID -->
                    <div class="col-md-4">
                        <div class="to-ho-hotel-con">
                            <div class="to-ho-hotel-con-1">
                                <div class="hom-hot-av-tic"> Available Tickets: 92 </div> <img src="{{ asset("front/images/room/2.jpg") }}" alt=""> </div>
                            <div class="to-ho-hotel-con-23">
                                <div class="to-ho-hotel-con-2"> <a href="all-rooms.html"><h4>Ultra Deluxe</h4></a> </div>
                                <div class="to-ho-hotel-con-3">
                                    <ul>
                                        <li>City: illunois,united states
                                            <div class="dir-rat-star ho-hot-rat-star"> Rating: <i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i> </div>
                                        </li>
                                        <li><span class="ho-hot-pri-dis">$680</span><span class="ho-hot-pri">$380</span> </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- HOTEL GRID -->
                    <div class="col-md-4">
                        <div class="to-ho-hotel-con">
                            <div class="to-ho-hotel-con-1">
                                <div class="hom-hot-av-tic"> Available Tickets: 42 </div> <img src="{{ asset("front/images/room/4.jpg") }}" alt=""> </div>
                            <div class="to-ho-hotel-con-23">
                                <div class="to-ho-hotel-con-2"> <a href="all-rooms.html"><h4>Luxury Room</h4></a> </div>
                                <div class="to-ho-hotel-con-3">
                                    <ul>
                                        <li>City: illunois,united states
                                            <div class="dir-rat-star ho-hot-rat-star"> Rating: <i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i> </div>
                                        </li>
                                        <li><span class="ho-hot-pri-dis">$720</span><span class="ho-hot-pri">$420</span> </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- HOTEL GRID -->
                    <div class="col-md-4">
                        <div class="to-ho-hotel-con">
                            <div class="to-ho-hotel-con-1">
                                <div class="hom-hot-av-tic"> Available Tickets: 520 </div> <img src="{{ asset("front/images/room/5.jpg") }}" alt=""> </div>
                            <div class="to-ho-hotel-con-23">
                                <div class="to-ho-hotel-con-2"> <a href="all-rooms.html"><h4>Premium Room</h4></a> </div>
                                <div class="to-ho-hotel-con-3">
                                    <ul>
                                        <li>City: illunois,united states
                                            <div class="dir-rat-star ho-hot-rat-star"> Rating: <i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i> </div>
                                        </li>
                                        <li><span class="ho-hot-pri-dis">$840</span><span class="ho-hot-pri">$540</span> </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- HOTEL GRID -->
                    <div class="col-md-4">
                        <div class="to-ho-hotel-con">
                            <div class="to-ho-hotel-con-1">
                                <div class="hom-hot-av-tic"> Available Tickets: 92 </div> <img src="{{ asset("front/images/room/6.jpg") }}" alt=""> </div>
                            <div class="to-ho-hotel-con-23">
                                <div class="to-ho-hotel-con-2"> <a href="all-rooms.html"><h4>Normal Room</h4></a> </div>
                                <div class="to-ho-hotel-con-3">
                                    <ul>
                                        <li>City: illunois,united states
                                            <div class="dir-rat-star ho-hot-rat-star"> Rating: <i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star" aria-hidden="true"></i><i class="fa fa-star-o" aria-hidden="true"></i> </div>
                                        </li>
                                        <li><span class="ho-hot-pri-dis">$680</span><span class="ho-hot-pri">$380</span> </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--END HOTEL ROOMS-->
    <!--TOP SECTION-->
    <div class="offer">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="offer-l"> <span class="ol-1"></span> <span class="ol-2"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></span> <span class="ol-4">Standardized Budget Rooms</span> <span class="ol-3"></span> <span class="ol-5">$99/-</span>
                        <ul>
                            <li>
                                <a href="#!" class="waves-effect waves-light btn-large offer-btn"><img src="{{ asset("front/images/icon/dis1.png") }}" alt="">
                                </a><span>Free WiFi</span>
                            </li>
                            <li>
                                <a href="#!" class="waves-effect waves-light btn-large offer-btn"><img src="{{ asset("front/images/icon/h2.png") }}" alt=""> </a><span>Breakfast</span>
                            </li>
                            <li>
                                <a href="#!" class="waves-effect waves-light btn-large offer-btn"><img src="{{ asset("front/images/icon/dis3.png") }}" alt=""> </a><span>Pool</span>
                            </li>
                            <li>
                                <a href="#!" class="waves-effect waves-light btn-large offer-btn"><img src="{{ asset("front/images/icon/dis4.png") }}" alt=""> </a><span>Television</span>
                            </li>
                            <li>
                                <a href="#!" class="waves-effect waves-light btn-large offer-btn"><img src="{{ asset("front/images/icon/dis5.png") }}" alt=""> </a><span>GYM</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="offer-r">
                        <div class="or-1"> <span class="or-11">go</span> <span class="or-12">Stays</span> </div>
                        <div class="or-2"> <span class="or-21">Get</span> <span class="or-22">70%</span> <span class="or-23">Off</span> <span class="or-24">use code: RG5481WERQ</span> <span class="or-25"></span> </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="blog hom-com pad-bot-0">
        <div class="container">
            <div class="row">
                <div class="hom1-title">
                    <h2>Banquet Spaces & Meeting Rooms</h2>
                    <div class="head-title">
                        <div class="hl-1"></div>
                        <div class="hl-2"></div>
                        <div class="hl-3"></div>
                    </div>
                    <p>Aenean euismod sem porta est consectetur posuere. Praesent nisi velit, porttitor ut imperdiet a, pellentesque id mi.</p>
                </div>
            </div>
            <div class="row">
                <div>
                    <div class="col-md-3 n2-event">
                        <!--event IMAGE-->
                        <div class="n21-event hovereffect"> <img src="{{ asset("front/images/event/1.jpg") }}" alt="">
                            <div class="overlay"> <a href="booking.html"><span class="ev-book">Book Now</span></a> </div>
                        </div>
                        <!--event DETAILS-->
                        <div class="n22-event"> <a href="#!"><h4>Wedding Halls</h4></a> <span class="event-date">Capacity: 500,</span> <span class="event-by"> Price: $900</span>
                            <p>undergraduate applicants are admitted on a need-blind basis, and the university offers undergraduate applicants</p>
                            <!--event SHARE-->
                            <div class="event-share">
                                <ul>
                                    <li><a href="#"><i class="fa fa-facebook"></i></a>
                                    </li>
                                    <li><a href="#"><i class="fa fa-google-plus"></i></a>
                                    </li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a>
                                    </li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 n2-event">
                        <!--event IMAGE-->
                        <div class="n21-event hovereffect"> <img src="{{ asset("front/images/event/2.jpg") }}" alt="">
                            <div class="overlay"> <a href="booking.html"><span class="ev-book">Book Now</span></a> </div>
                        </div>
                        <!--event DETAILS-->
                        <div class="n22-event"> <a href="#!"><h4>Business Meetings</h4></a> <span class="event-date">Capacity: 500,</span> <span class="event-by"> Price: $700</span>
                            <p>undergraduate applicants are admitted on a need-blind basis, and the university offers undergraduate applicants</p>
                            <!--event SHARE-->
                            <div class="event-share">
                                <ul>
                                    <li><a href="#"><i class="fa fa-facebook"></i></a>
                                    </li>
                                    <li><a href="#"><i class="fa fa-google-plus"></i></a>
                                    </li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a>
                                    </li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 n2-event">
                        <!--event IMAGE-->
                        <div class="n21-event hovereffect"> <img src="{{ asset("front/images/event/3.jpg") }}" alt="">
                            <div class="overlay"> <a href="booking.html"><span class="ev-book">Book Now</span></a> </div>
                        </div>
                        <!--event DETAILS-->
                        <div class="n22-event"> <a href="#!"><h4>Social Event</h4></a> <span class="event-date">Capacity: 420,</span> <span class="event-by"> Price: $750</span>
                            <p>undergraduate applicants are admitted on a need-blind basis, and the university offers undergraduate applicants</p>
                            <!--event SHARE-->
                            <div class="event-share">
                                <ul>
                                    <li><a href="#"><i class="fa fa-facebook"></i></a>
                                    </li>
                                    <li><a href="#"><i class="fa fa-google-plus"></i></a>
                                    </li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a>
                                    </li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 n2-event">
                        <!--event IMAGE-->
                        <div class="n21-event hovereffect"> <img src="{{ asset("front/images/event/4.jpg") }}" alt="">
                            <div class="overlay"> <a href="booking.html"><span class="ev-book">Book Now</span></a> </div>
                        </div>
                        <!--event DETAILS-->
                        <div class="n22-event"> <a href="#!"><h4>Birthdays and Debut</h4></a> <span class="event-date">Capacity: 240,</span> <span class="event-by"> Price: $500</span>
                            <p>undergraduate applicants are admitted on a need-blind basis, and the university offers undergraduate applicants</p>
                            <!--event SHARE-->
                            <div class="event-share">
                                <ul>
                                    <li><a href="#"><i class="fa fa-facebook"></i></a>
                                    </li>
                                    <li><a href="#"><i class="fa fa-google-plus"></i></a>
                                    </li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a>
                                    </li>
                                    <li><a href="#"><i class="fa fa-linkedin"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="blog hom-com pad-bot-0">
        <div class="container">
            <div class="row">
                <div class="hom1-title">
                    <h2>Photo Gallery</h2>
                    <div class="head-title">
                        <div class="hl-1"></div>
                        <div class="hl-2"></div>
                        <div class="hl-3"></div>
                    </div>
                    <p>Aenean euismod sem porta est consectetur posuere. Praesent nisi velit, porttitor ut imperdiet a, pellentesque id mi.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="inn-services head-typo typo-com mar-bot-0">
                        <ul id="filters" class="clearfix">
                            <li><span class="filter active" data-filter=".app, .card, .icon, .logo, .web">All</span>
                            </li>
                            <li><span class="filter" data-filter=".app">Hotels</span>
                            </li>
                            <li><span class="filter" data-filter=".card">Aminities</span>
                            </li>
                            <li><span class="filter" data-filter=".icon">Rooms</span>
                            </li>
                            <li><span class="filter" data-filter=".logo">Food Menu</span>
                            </li>
                            <li><span class="filter" data-filter=".web">Events</span>
                            </li>
                        </ul>
                        <div id="portfoliolist">
                            <div class="portfolio logo" data-cat="logo">
                                <div class="portfolio-wrapper"> <img src="{{ asset("front/img/portfolios/logo/5.jpg") }}" alt="" />
                                    <div class="label">
                                        <div class="label-text"> <a class="text-title">Photo Caption</a> <span class="text-category">Logo</span> </div>
                                        <div class="label-bg"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="portfolio app" data-cat="app">
                                <div class="portfolio-wrapper"> <img src="{{ asset("front/img/portfolios/app/1.jpg") }}" alt="" />
                                    <div class="label">
                                        <div class="label-text"> <a class="text-title">Photo Caption</a> <span class="text-category">APP</span> </div>
                                        <div class="label-bg"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="portfolio web" data-cat="web">
                                <div class="portfolio-wrapper"> <img src="{{ asset("front/img/portfolios/web/4.jpg") }}" alt="" />
                                    <div class="label">
                                        <div class="label-text"> <a class="text-title">Photo Caption</a> <span class="text-category">Web design</span> </div>
                                        <div class="label-bg"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="portfolio card" data-cat="card">
                                <div class="portfolio-wrapper"> <img src="{{ asset("front/img/portfolios/card/1.jpg") }}" alt="" />
                                    <div class="label">
                                        <div class="label-text"> <a class="text-title">Photo Caption</a> <span class="text-category">Business card</span> </div>
                                        <div class="label-bg"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="portfolio app" data-cat="app">
                                <div class="portfolio-wrapper"> <img src="{{ asset("front/img/portfolios/app/3.jpg") }}" alt="" />
                                    <div class="label">
                                        <div class="label-text"> <a class="text-title">Photo Caption</a> <span class="text-category">APP</span> </div>
                                        <div class="label-bg"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="portfolio card" data-cat="card">
                                <div class="portfolio-wrapper"> <img src="{{ asset("front/img/portfolios/card/4.jpg") }}" alt="" />
                                    <div class="label">
                                        <div class="label-text"> <a class="text-title">Photo Caption</a> <span class="text-category">Business card</span> </div>
                                        <div class="label-bg"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="portfolio card" data-cat="card">
                                <div class="portfolio-wrapper"> <img src="{{ asset("front/img/portfolios/card/5.jpg") }}" alt="" />
                                    <div class="label">
                                        <div class="label-text"> <a class="text-title">Photo Caption</a> <span class="text-category">Business card</span> </div>
                                        <div class="label-bg"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="portfolio logo" data-cat="logo">
                                <div class="portfolio-wrapper"> <img src="{{ asset("front/img/portfolios/logo/1.jpg") }}" alt="" />
                                    <div class="label">
                                        <div class="label-text"> <a class="text-title">Photo Caption</a> <span class="text-category">Logo</span> </div>
                                        <div class="label-bg"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="portfolio app" data-cat="app">
                                <div class="portfolio-wrapper"> <img src="{{ asset("front/img/portfolios/app/2.jpg") }}" alt="" />
                                    <div class="label">
                                        <div class="label-text"> <a class="text-title">Photo Caption</a> <span class="text-category">APP</span> </div>
                                        <div class="label-bg"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="portfolio card" data-cat="card">
                                <div class="portfolio-wrapper"> <img src="{{ asset("front/img/portfolios/card/2.jpg") }}" alt="" />
                                    <div class="label">
                                        <div class="label-text"> <a class="text-title">Photo Caption</a> <span class="text-category">Business card</span> </div>
                                        <div class="label-bg"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="portfolio logo" data-cat="logo">
                                <div class="portfolio-wrapper"> <img src="{{ asset("front/img/portfolios/logo/6.jpg") }}" alt="" />
                                    <div class="label">
                                        <div class="label-text"> <a class="text-title">Photo Caption</a> <span class="text-category">Logo</span> </div>
                                        <div class="label-bg"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="portfolio logo" data-cat="logo">
                                <div class="portfolio-wrapper"> <img src="{{ asset("front/img/portfolios/logo/7.jpg") }}" alt="" />
                                    <div class="label">
                                        <div class="label-text"> <a class="text-title">Photo Caption</a> <span class="text-category">Logo</span> </div>
                                        <div class="label-bg"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="portfolio icon" data-cat="icon">
                                <div class="portfolio-wrapper"> <img src="{{ asset("front/img/portfolios/icon/4.jpg") }}" alt="" />
                                    <div class="label">
                                        <div class="label-text"> <a class="text-title">Photo Caption</a> <span class="text-category">Icon</span> </div>
                                        <div class="label-bg"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="portfolio web" data-cat="web">
                                <div class="portfolio-wrapper"> <img src="{{ asset("front/img/portfolios/web/3.jpg") }}" alt="" />
                                    <div class="label">
                                        <div class="label-text"> <a class="text-title">Photo Caption</a> <span class="text-category">Web design</span> </div>
                                        <div class="label-bg"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="portfolio icon" data-cat="icon">
                                <div class="portfolio-wrapper"> <img src="{{ asset("front/img/portfolios/icon/1.jpg") }}" alt="" />
                                    <div class="label">
                                        <div class="label-text"> <a class="text-title">Photo Caption</a> <span class="text-category">Icon</span> </div>
                                        <div class="label-bg"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="portfolio web" data-cat="web">
                                <div class="portfolio-wrapper"> <img src="{{ asset("front/img/portfolios/web/2.jpg") }}" alt="" />
                                    <div class="label">
                                        <div class="label-text"> <a class="text-title">Photo Caption</a> <span class="text-category">Web design</span> </div>
                                        <div class="label-bg"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="portfolio icon" data-cat="icon">
                                <div class="portfolio-wrapper"> <img src="{{ asset("front/img/portfolios/icon/2.jpg") }}" alt="" />
                                    <div class="label">
                                        <div class="label-text"> <a class="text-title">Photo Caption</a> <span class="text-category">Icon</span> </div>
                                        <div class="label-bg"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="portfolio icon" data-cat="icon">
                                <div class="portfolio-wrapper"> <img src="{{ asset("front/img/portfolios/icon/5.jpg") }}" alt="" />
                                    <div class="label">
                                        <div class="label-text"> <a class="text-title">3D Map</a> <span class="text-category">Icon</span> </div>
                                        <div class="label-bg"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="portfolio web" data-cat="web">
                                <div class="portfolio-wrapper"> <img src="{{ asset("front/img/portfolios/web/1.jpg") }}" alt="" />
                                    <div class="label">
                                        <div class="label-text"> <a class="text-title">Note</a> <span class="text-category">Web design</span> </div>
                                        <div class="label-bg"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="portfolio logo" data-cat="logo">
                                <div class="portfolio-wrapper"> <img src="{{ asset("front/img/portfolios/logo/3.jpg") }}" alt="" />
                                    <div class="label">
                                        <div class="label-text"> <a class="text-title">Native Designers</a> <span class="text-category">Logo</span> </div>
                                        <div class="label-bg"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="portfolio logo" data-cat="logo">
                                <div class="portfolio-wrapper"> <img src="{{ asset("front/img/portfolios/logo/4.jpg") }}" alt="" />
                                    <div class="label">
                                        <div class="label-text"> <a class="text-title">Bookworm</a> <span class="text-category">Logo</span> </div>
                                        <div class="label-bg"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="portfolio icon" data-cat="icon">
                                <div class="portfolio-wrapper"> <img src="{{ asset("") }}{{ asset("front/img/portfolios/icon/3.jpg") }}" alt="" />
                                    <div class="label">
                                        <div class="label-text"> <a class="text-title">Sandwich</a> <span class="text-category">Icon</span> </div>
                                        <div class="label-bg"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="portfolio card" data-cat="card">
                                <div class="portfolio-wrapper"> <img src="{{ asset("front/img/portfolios/card/3.jpg") }}" alt="" />
                                    <div class="label">
                                        <div class="label-text"> <a class="text-title">Reality</a> <span class="text-category">Business card</span> </div>
                                        <div class="label-bg"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="portfolio logo" data-cat="logo">
                                <div class="portfolio-wrapper"> <img src="{{ asset("front/img/portfolios/logo/2.jpg") }}" alt="" />
                                    <div class="label">
                                        <div class="label-text"> <a class="text-title">Speciallisterne</a> <span class="text-category">Logo</span> </div>
                                        <div class="label-bg"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="blog hom-com">
        <div class="container">
            <div class="row">
                <div class="hom1-title">
                    <h2>News & Event</h2>
                    <div class="head-title">
                        <div class="hl-1"></div>
                        <div class="hl-2"></div>
                        <div class="hl-3"></div>
                    </div>
                    <p>Aenean euismod sem porta est consectetur posuere. Praesent nisi velit, porttitor ut imperdiet a, pellentesque id mi.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="bot-gal h-gal">
                        <h4>Photo Gallery</h4>
                        <ul>
                            <li><img class="materialboxed" data-caption="Hotel Captions" src="{{ asset("front/images/ami/8.jpg") }}" alt="">
                            </li>
                            <li><img class="materialboxed" data-caption="Hotel Captions" src="{{ asset("front/images/ami/9.jpg") }}" alt="">
                            </li>
                            <li><img class="materialboxed" data-caption="Hotel Captions" src="{{ asset("front/images/ami/10.jp") }}" alt="">
                            </li>
                            <li><img class="materialboxed" data-caption="Hotel Captions" src="{{ asset("front/images/ami/11.jp") }}" alt="">
                            </li>
                            <li><img class="materialboxed" data-caption="Hotel Captions" src="{{ asset("front/images/ami/1.jpg") }}" alt="">
                            </li>
                            <li><img class="materialboxed" data-caption="Hotel Captions" src="{{ asset("front/images/ami/2.jpg") }}" alt="">
                            </li>
                            <li><img class="materialboxed" data-caption="Hotel Captions" src="{{ asset("front/images/ami/3.jpg") }}" alt="">
                            </li>
                            <li><img class="materialboxed" data-caption="Hotel Captions" src="{{ asset("front/images/ami/4.jpg") }}" alt="">
                            </li>
                            <li><img class="materialboxed" data-caption="Hotel Captions" src="{{ asset("front/images/ami/5.jp") }}" alt="">
                            </li>
                            <li><img class="materialboxed" data-caption="Hotel Captions" src="{{ asset("front/images/ami/6.jpg") }}" alt="">
                            </li>
                            <li><img class="materialboxed" data-caption="Hotel Captions" src="{{ asset("front/images/ami/7.jpg") }}" alt="">
                            </li>
                            <li><img class="materialboxed" data-caption="Hotel Captions" src="{{ asset("front/images/ami/8.jp") }}" alt="">
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="bot-gal h-vid">
                        <h4>Video Gallery</h4>
                        <iframe src="https://www.youtube.com/embed/mG4G8crGQ34?autoplay=0&amp;showinfo=0&amp;controls=0" allowfullscreen></iframe>
                        <h5>Maecenas sollicitudin lacinia</h5>
                        <p>Maecenas finibus neque a tellus auctor mattis. Aliquam tempor varius ornare. Maecenas dignissim leo leo, nec posuere purus finibus vitae.</p>
                        <p>Quisque vitae neque at tellus malesuada convallis. Phasellus in lectus vitae ex euismod interdum non a lorem. Nulla bibendum. Curabitur mi odio, tempus quis risus cursus.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="bot-gal h-blog">
                        <h4>News & Event</h4>
                        <ul>
                            <li>
                                <a href="#!"> <img src="{{ asset("front/images/users/2.png") }}" alt="">
                                    <h5>Joseph, write a review</h5> <span>3 Dec, 2017</span>
                                    <p>Curabitur mi odio, tempus quis risus cursus, iaculis tempor augue.</p>
                                </a>
                            </li>
                            <li>
                                <a href="#!"> <img src="{{ asset("front/images/users/3.png") }}" alt="">
                                    <h5>Joseph, write a review</h5> <span>3 Dec, 2017</span>
                                    <p>Curabitur mi odio, tempus quis risus cursus, iaculis tempor augue.</p>
                                </a>
                            </li>
                            <li>
                                <a href="#!"> <img src="{{ asset("front/images/users/4.png") }}" alt="">
                                    <h5>Joseph, write a review</h5> <span>3 Dec, 2017</span>
                                    <p>Curabitur mi odio, tempus quis risus cursus, iaculis tempor augue.</p>
                                </a>
                            </li>
                            <li>
                                <a href="#!"> <img src="{{ asset("front/images/users/5.png") }}" alt="">
                                    <h5>Joseph, write a review</h5> <span>3 Dec, 2017</span>
                                    <p>Curabitur mi odio, tempus quis risus cursus, iaculis tempor augue.</p>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
