@section('top_menu')
    @auth
        <div class="row">
            <div class="top-bar">
                <ul>
                    <li><a href="#">Phone No:  {{ config('app.phone_number', '977-9866893439') }}</a>
                    </li>
                    <li><a class='dropdown-button' href='#' data-activates='dropdown1'> My Account <i
                                    class="fa fa-angle-down"></i></a>
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
                    <a href="{{ url('/dashboard/room/booking') }}"><img src="{{ asset("front/images/icon/1.png") }}" alt=""> My
                        Room Bookings</a>
                </li>
                <li>
                    <a href="{{ url('/dashboard/event/booking') }}"><img src="{{ asset("front/images/icon/17.png") }}" alt=""> My Event Bookings</a>
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
        </div>

    @endauth
@show