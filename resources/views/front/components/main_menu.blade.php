@section('main_menu')
    <!--TOP SECTION-->
    <div class="row">
        <div class="logo">
            <a href="main.html"><img src="{{ asset("front/images/logo.png") }}" alt=""/>
            </a>
        </div>
        <div class="menu-bar">
            <ul>

                <li><a href="#" class='dropdown-button' data-activates='drop-home'>Home <i class="fa fa-angle-down"></i></a>
                </li>
                <li><a href="#" class='dropdown-button' data-activates='drop-room'>Rooms <i
                                class="fa fa-angle-down"></i></a>
                </li>
                <li><a href="{{ url('/room_type') }}">Rooms</a>
                </li>
                <li><a href="#" class='dropdown-button' data-activates='drop-page'>Pages <i
                                class="fa fa-angle-down"></i></a>
                </li>

                @if (Auth::guest())
                    <li><a href="{{ route('register') }}">Register</a>
                    </li>
                    <li><a href="{{ route('login') }}">Login</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>




    <div class="all-drop-down">
        <!-- Dropdown Structure -->
        <ul id='drop-home' class='dropdown-content drop-con-man'>
            <li><a href="main.html">Home - Default</a>
            </li>
            <li><a href="index-1.html">Home - Reservation</a>
            </li>
            <li><a href="index-2.html">Home - FullSlider</a>
            </li>
            <li><a href="index-3.html">Home - Block Color</a>
            </li>
        </ul>
        <!-- ROOM Dropdown Structure -->
        <ul id='drop-room' class='dropdown-content drop-con-man'>
            <li><a href="all-rooms.html">All Suite Rooms</a>
            </li>
            <li><a href="room-details.html">Room Details</a>
            </li>
            <li><a href="room-details-block.html">Room Details Block</a>
            </li>
            <li><a href="room-details-1.html">Room Parallax</a>
            </li>
        </ul>
        <!-- PAGES Dropdown Structure -->
        <div id='drop-page' class='dropdown-content drop-con-man drop-full'>
            <div class="mm-1">
                <h4>Pages</h4>
                <ul>
                    <li><a href="room-details.html">Room Details - 1</a>
                    </li>
                    <li><a href="room-details-1.html">Room Details - 2</a>
                    </li>
                    <li><a href="room-details-block.html">Room Details - 3</a>
                    </li>
                    <li><a href="all-rooms.html">All Rooms</a>
                    </li>
                    <li><a href="all-rooms1.html">All Rooms - 1</a>
                    </li>
                    <li><a href="aminities.html">Aminities</a>
                    </li>
                    <li><a href="aminities1.html">Aminities - 1</a>
                    </li>
                </ul>
            </div>
            <div class="mm-1">
                <h4>Pages</h4>
                <ul>
                    <li><a href="dashboard.html">User Dashboard</a>
                    </li>
                    <li><a href="db-activity.html">DB Activity</a>
                    </li>
                    <li><a href="db-booking.html">DB-Booking</a>
                    </li>
                    <li><a href="db-event.html">DB-Event</a>
                    </li>
                    <li><a href="db-new-booking.html">DB New Booking</a>
                    </li>
                    <li><a href="booking.html">Booking</a>
                    </li>
                    <li><a href="contact-us.html">Contact Us</a>
                    </li>
                </ul>
            </div>
            <div class="mm-1">
                <h4>Pages</h4>
                <ul>
                    <li><a href="blog.html">Blog</a>
                    </li>
                    <li><a href="blog-inner.html">Blog Inner</a>
                    </li>
                    <li><a href="events.html">Events</a>
                    </li>
                    <li><a href="gallery.html">Gallery</a>
                    </li>
                    <li><a href="gallery1.html">Gallery - 1</a>
                    </li>
                    <li><a href="gallery2.html">Gallery - 2</a>
                    </li>
                    <li><a href="collapsible.html">Collapsible</a>
                    </li>
                </ul>
            </div>
            <div class="mm-1">
                <h4>Pages</h4>
                <ul>
                    <li><a href="about-us.html">About Us</a>
                    </li>
                    <li><a href="services.html">Services</a>
                    </li>
                    <li><a href="services1.html">Services - 1</a>
                    </li>
                    <li><a href="typho-grid.html">Grid Layout</a>
                    </li>
                    <li><a href="typo-alert.html">Alert Messages</a>
                    </li>
                    <li><a href="form-fields.html">Form Fields</a>
                    </li>
                    <li><a href="menu.html">Food Menu</a>
                    </li>
                </ul>
            </div>
            <div class="mm-1">
                <h4>Pages</h4>
                <ul>
                    <li><a href="typo-all-head.html">All Headers</a>
                    </li>
                    <li><a href="typo-badges-labels.html">Labels</a>
                    </li>
                    <li><a href="typo-buttons.html">Buttons</a>
                    </li>
                    <li><a href="typo-pagination.html">Pagination</a>
                    </li>
                    <li><a href="typo-progressbar.html">Progressbar</a>
                    </li>
                    <li><a href="preloading.html">Preloading</a>
                    </li>
                    <li><a href="menu1.html">Food Menu - 1</a>
                    </li>
                </ul>
            </div>
            <div class="mm-1">
                <h4>Pages</h4>
                <ul>
                    <li><a href="typo-slider.html">Image Sliders</a>
                    </li>
                    <li><a href="typo-table.html">Table</a>
                    </li>
                    <li><a href="typo-buttons.html">Buttons</a>
                    </li>
                    <li><a href="typo-pagination.html">Pagination</a>
                    </li>
                    <li><a href="typo-progressbar.html">Progressbar</a>
                    </li>
                    <li><a href="sitemap.html">Sitemap</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!--TOP SECTION-->
@show