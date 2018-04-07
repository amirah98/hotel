@section('top_menu')
    @auth
        <div class="row">
            <div class="top-bar">
                <ul>
                    <li><a class='dropdown-button' href='#' data-activates='dropdown1'> My Account <i
                                    class="fa fa-angle-down"></i></a>
                    </li>
                    <li><a href="all-hotels.html">Our Hotels</a>
                    </li>
                    <li><a href="about-us.html">About Us</a>
                    </li>
                    <li><a href="contact-us.html">Contact Us</a>
                    </li>
                    <li><a class='dropdown-button' href='#' data-activates='dropdown2'>Language <i
                                    class="fa fa-angle-down"></i></a>
                    </li>
                    <li><a href="#">Toll Free No: 1800 102 7275</a>
                    </li>
                </ul>

            </div>
        </div>




        <div class="all-drop-down">
            <!-- Dropdown Structure -->
            <ul id='dropdown1' class='dropdown-content drop-con-man'>
                @if(Auth::user()->role == "admin")
                    <li>
                        <a href="{{ url('/admin') }}"><img src="{{ asset("front/images/icon/2.png") }}" alt=""> Admin Panel</a>
                    </li>
                @endif
                <li>
                    <a href="{{ url('/dashboard') }}"><img src="{{ asset("front/images/icon/15.png") }}" alt=""> User Dashboard</a>
                </li>
                <li>
                    <a href="db-event.html"><img src="{{ asset("front/images/icon/17.png") }}" alt=""> My Events</a>
                </li>
                <li>
                    <a href="db-activity.html"><img src="{{ asset("front/images/icon/14.png") }}" alt=""> My
                        Activity</a>
                </li>
                <li>
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault();
               document.getElementById('logout-form').submit();">
                        <img src="{{ asset("front/images/icon/13.png") }}" alt=""> Log Out</a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
            <!-- Dropdown Structure -->
            <ul id='dropdown2' class='dropdown-content drop-con-man'>
                <li><a href="#!">English</a>
                </li>
                <li><a href="#!">Spanish</a>
                </li>
                <li><a href="#!">Hindi</a>
                </li>
                <li><a href="#!">Russian</a>
                </li>
                <li><a href="#!">Portuguese</a>
                </li>
            </ul>
        </div>

    @endauth
@show