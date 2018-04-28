@section('main_menu')
    <!--TOP SECTION-->
    <div class="row">
        <div class="logo">
            <a href="{{ url('/') }}"><img src="{{ asset("front/images/logo.png") }}" alt=""/>
            </a>
        </div>
        <div class="menu-bar">
            <ul>
                <li><a href="{{ url('/') }}">Home</a>
                </li>
                <li><a href="{{ url('/room_type') }}">Rooms</a>
                </li>
                <li><a href="{{ url('/event') }}">Events</a>
                </li>
                <li><a href="{{ url('/food') }}">Food Menu</a>
                </li>
                <li><a href="{{ url('/contact') }}">Contact Us</a>
                </li>
                </li>
                <li><a href="#" class='dropdown-button' data-activates='drop-home'>Pages <i class="fa fa-angle-down"></i></a>
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
        </ul>
    </div>
    <!--TOP SECTION-->
@show