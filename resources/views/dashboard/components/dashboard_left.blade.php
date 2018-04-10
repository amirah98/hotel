@section('dashboard_left')
    <div class="db-left">
        <div class="db-left-1" style="
                                                padding: 116px 50px 30px 50px;
                                                background: url({{ asset("front/images/user.jpg") }}) no-repeat center center;
                                                background-size: cover;
                                                position: relative;">
            <h4>Jana Novakova</h4>
            <p>Newyork, United States</p>
        </div>
        <div class="db-left-2">
            <ul>
                <li>
                    <a href="{{ url('/dashboard') }}"><img src="{{ asset("front/images/icon/db1.png") }}" alt="" /> All</a>
                </li>
                <li>
                    <a href="{{ url('/dashboard/room/booking') }}"><img src="{{ asset("front/images/icon/db2.png") }}" alt="" /> Rooms</a>
                </li>
                <li>
                    <a href="{{ url('/dashboard/room/booking/new') }}"><img src="{{ asset("front/images/icon/db3.png") }}" alt="" /> New Booking</a>
                </li>
                <li>
                    <a href="{{ url('/dashboard/event/booking') }}"><img src="{{ asset("front/images/icon/db4.png") }}" alt="" /> Events</a>
                </li>
                <li>
                    <a href="db-activity.html"><img src="{{ asset("front/images/icon/db5.png") }}" alt="" /> Activity</a>
                </li>
                <li>
                    <a href="{{ url('/dashboard/profile/edit') }}"><img src="{{ asset("front/images/icon/db7.png") }}" alt="" /> Profile</a>
                </li>
                <li>
                    <a href="{{ url('/dashboard/payment') }}"><img src="{{ asset("front/images/icon/db6.png") }}" alt="" /> Payments</a>
                </li>
                <li>
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                       document.getElementById('logout-dash-form').submit();"><img src="{{ asset("front/images/icon/db8.png") }}" alt=""> Logout</a>
                </li>
            </ul>
        </div>
    </div>



    <form id="logout-dash-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
    @show