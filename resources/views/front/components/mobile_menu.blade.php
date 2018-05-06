@section('mobile_menu')
<!--MOBILE MENU-->
<section>
    <div class="mm">
        <div class="mm-inn">
            <div class="mm-logo">
                <a href="main.html"><img src="{{ asset("front/images/logo.png") }}" alt="">
                </a>
            </div>
            <div class="mm-icon"><span><i class="fa fa-bars show-menu" aria-hidden="true"></i></span>
            </div>
            <div class="mm-menu">
                <div class="mm-close"><span><i class="fa fa-times hide-menu" aria-hidden="true"></i></span>
                </div>
                <ul>
                    <li><a href="{{ url('/') }}">Home</a>
                    </li>
                    <li><a href="{{ url('/room_type') }}">Rooms</a>
                    </li>
                    <li><a href="{{ url('/event') }}">Events</a>
                    </li>
                    <li><a href="{{ url('/food') }}">Food Menu</a>
                    </li>
                    @if(count(\App\Model\Page::where('title', 'About')->where('status', true)->get()) > 0)
                        <li><a href="{{ url('/about') }}">About</a>
                        </li>
                    @endif
                    <li><a href="{{ url('/contact') }}">Contact Us</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
    @show