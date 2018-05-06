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
                                        <p class="hasimg">Hotel Simbiosis provides cheap hotel reservation service.</p>
                                        <p class="hasimg">The top-rated hotel reservation services.</p>
                                    </div>
                                    <div class="col-sm-12 col-md-3">
                                        <h4>Support &amp; Help</h4>
                                        <ul class="two-columns">
                                            <li><a href="{{ '/room_type' }}">Rooms</a>
                                            </li>
                                            <li><a href="{{ '/event' }}">Events</a>
                                            </li>
                                            <li><a href="{{ url('/food') }}">Food Menu</a>
                                            </li>
                                            <li><a href="{{ url('/contact') }}">Contact Us</a>
                                            </li>
                                            <li><a href="{{ url('/about') }}">About Us</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-12 col-md-3">
                                        <h4>Room Types</h4>
                                        <ul class="two-columns">
                                            @foreach(\App\Model\RoomType::where('status', true)->orderBy('updated_at','desc')->limit('8')->get() as $room_type)
                                            <li><a href="{{ url('/room_type/'.$room_type->id) }}">{{ $room_type->name }}</a>
                                            </li>
                                                @endforeach
                                        </ul>
                                    </div>
                                    <div class="col-sm-12 col-md-3">
                                        <h4>Address</h4>
                                        <p>{{ config('app.address', "Kathmandu") }}</p>
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

                                        {!! Form::open(array('url' => '/subscribe')) !!}
                                        {{ Form::hidden('_method', 'POST') }}
                                        @csrf
                                            <ul class="foot-subsc">
                                                <li>
                                                    <input name="email" type="email" placeholder="Enter your email id"> </li>
                                                <li>
                                                    <input type="submit" value="submit">
                                                </li>
                                            </ul>
                                        {!! Form::close() !!}
                                    </div>
                                    <div class="col-sm-12 col-md-5 foot-social">
                                        <h4>Follow with us</h4>
                                        <p>Join the thousands of other people.</p>
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