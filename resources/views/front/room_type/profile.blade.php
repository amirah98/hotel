@extends('layouts.front')

@section('content')

    <!--TOP SECTION-->
    <div class="hp-banner"> <img src="{{'/storage/room_types/'.$room_type->images->first()->name}}" alt=""> </div>
    <!--END HOTEL ROOMS-->
    <!--CHECK AVAILABILITY FORM-->
    <div class="check-available">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="inn-com-form">
                        {!! Form::open(array('url' => 'room_type/'.$room_type->id.'/book', 'class' => 'col s12')) !!}
                        {{ Form::hidden('_method', 'POST') }}
                        @csrf

                        @if ($errors->any())
                            <div class="row">
                                <div class="col-md-12 alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        @endif
                            <div class="row">
                                <div class="col s12 avail-title">
                                    <h4>Check Availability</h4> </div>
                            </div>
                        <input name="booking_validation" type="hidden" value="0">

                        <div class="row">
                                <div class="input-field col s12 m4 l2">
                                    <input type="text" style="color: black" value="Price: Rs. {{ $room_type->cost_per_day }}" class="form-btn" disabled>
                                </div>
                                <div class="input-field col s12 m4 l2">
                                    <select name="number_of_adult">
                                        <option value="" disabled selected>No of adults</option>
                                        @for($i = 1; $i <= $room_type->max_adult; $i++ )
                                        <option value="{{ $i }}" @if (Input::old('number_of_adult') == $i) selected="selected" @endif>{{ $i }}</option>
                                            @endfor
                                    </select>
                                </div>
                                <div class="input-field col s12 m4 l2">
                                    <select name="number_of_child">
                                        <option value="" disabled selected>No of childs</option>
                                        @for($i = 0; $i <= $room_type->max_adult; $i++ )
                                            <option value="{{ $i }}" @if (Input::old('number_of_child') == $i) selected="selected" @endif>{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="input-field col s12 m4 l2">
                                    <input type="text" id="from" name="arrival_date" value="{{ old('arrival_date') }}">
                                    <label for="from">Arrival Date</label>
                                </div>
                                <div class="input-field col s12 m4 l2">
                                    <input type="text" id="to" name="departure_date" value="{{ old('departure_date') }}">
                                    <label for="to">Departure Date</label>
                                </div>
                                <div class="input-field col s12 m4 l2">
                                    <input type="submit" value="submit" class="form-btn">
                                </div>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--END CHECK AVAILABILITY FORM-->
    <div class="hom-com">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="row">
                        <div class="hp-section">
                            <div class="hp-sub-tit">
                                <h4><span>{{ $room_type->name }}</span> Room</h4>
                            </div>
                            <div class="hp-amini">
                                <p>{{ $room_type->description }}</p>
                            </div>
                        </div>
                        @if(count($room_type->facilities) > 0)
                        <div class="hp-section">
                            <div class="hp-sub-tit">
                                <h4><span>Facilities</span></h4>
                                <p>All of the following facilities comes with the room.</p>
                            </div>
                            <div class="hp-amini">
                                <ul>
                                    @foreach($room_type->facilities as $facility)
                                    <li><img src="{{('/storage/facilities/'.$facility->icon)}}" alt="">{{ $facility->name }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        @endif
                        <div class="hp-section">
                            <div class="hp-sub-tit">
                                <h4><span>Overview</span></h4>
                                <p>Following the main features of the room</p>
                            </div>
                            <div class="hp-over">
                                <ul class="nav nav-tabs hp-over-nav">
                                    <li class="active">
                                        <a data-toggle="tab" href="#home"><img src="{{ asset("front/images/icon/a8.png") }}" alt=""> <span class="tab-hide">Overview</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a data-toggle="tab" href="#menu"><img src="{{ asset("front/images/icon/a10.png") }}" alt=""> <span class="tab-hide">Other Features</span>
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div id="home" class="tab-pane fade in active tab-space">
                                        <div class="hp-main-overview">
                                            <ul>
                                                <li>Occupancy: <span>Max {{ $room_type->max_adult + $room_type->max_child }} Persons</span>
                                                </li>
                                                <li>Size : <span>{{ $room_type->size }} sq. feet</span>
                                                </li>
                                                <li>Room Service : <span>{{  $room_type->room_service==true ? "Available" : "Not Available" }}</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div id="menu" class="tab-pane fade tab-space">
                                        <p>Maecenas erat lorem, vulputate sed ex at, vehicula dignissim risus. Nullam non nisi congue elit cursus tempus. Nunc vel ante nec libero semper maximus. Donec cursus sed massa eget commodo. Phasellus semper neque id iaculis malesuada. Nulla efficitur dui vitae orci blandit tempor. Mauris sed venenatis nibh, sed sodales risus.</p>
                                        <p>Nam sit amet tortor in elit fermentum consectetur et sit amet eros. Sed varius velit at eros tempor sodales. Fusce at enim at lectus sollicitudin pharetra at in risus. Donec ut semper turpis. Maecenas lobortis ante ut eros scelerisque, at semper augue ullamcorper.</p>
                                        <p>Maecenas erat lorem, vulputate sed ex at, vehicula dignissim risus. Nullam non nisi congue elit cursus tempus. Nunc vel ante nec libero semper maximus. Donec cursus sed massa eget commodo. Phasellus semper neque id iaculis malesuada. Nulla efficitur dui vitae orci blandit tempor. Mauris sed venenatis nibh, sed sodales risus.</p>
                                        <p>Nam sit amet tortor in elit fermentum consectetur et sit amet eros. Sed varius velit at eros tempor sodales. Fusce at enim at lectus sollicitudin pharetra at in risus. Donec ut semper turpis. Maecenas lobortis ante ut eros scelerisque, at semper augue ullamcorper.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if(count($room_type->images) > 0)
                        <div class="hp-section">
                            <div class="hp-sub-tit">
                                <h4><span>Photo Gallery</span></h4>
                                <p>View the actual room by following images.</p>
                            </div>
                            <div class="">
                                <div class="h-gal">
                                    <ul>
                                        @foreach($room_type->images as $image)
                                        <li><img class="materialboxed" data-caption="{{ $image->caption }}" src="{{('/storage/room_types/'.$image->name)}}" alt="">
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @endif
                        <div class="hp-section">
                            <div class="hp-sub-tit">
                                <h4><span>Ratings</span></h4>
                                <p>Aliquam id tempor sem. Cras molestie risus et lobortis congue. Donec id est consectetur, cursus tellus at, mattis lacus.</p>
                            </div>
                            <div class="hp-review">
                                <div class="hp-review-left">
                                    <div class="hp-review-left-1">
                                        <div class="hp-review-left-11">Excellent</div>
                                        <div class="hp-review-left-12">
                                            <div class="hp-review-left-13"></div>
                                        </div>
                                    </div>
                                    <div class="hp-review-left-1">
                                        <div class="hp-review-left-11">Good</div>
                                        <div class="hp-review-left-12">
                                            <div class="hp-review-left-13 hp-review-left-Good"></div>
                                        </div>
                                    </div>
                                    <div class="hp-review-left-1">
                                        <div class="hp-review-left-11">Satisfactory</div>
                                        <div class="hp-review-left-12">
                                            <div class="hp-review-left-13 hp-review-left-satis"></div>
                                        </div>
                                    </div>
                                    <div class="hp-review-left-1">
                                        <div class="hp-review-left-11">Below Average</div>
                                        <div class="hp-review-left-12">
                                            <div class="hp-review-left-13 hp-review-left-below"></div>
                                        </div>
                                    </div>
                                    <div class="hp-review-left-1">
                                        <div class="hp-review-left-11">Below Average</div>
                                        <div class="hp-review-left-12">
                                            <div class="hp-review-left-13 hp-review-left-poor"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="hp-review-right">
                                    <h5>Overall Ratings</h5>
                                    <p><span>4.5 <i class="fa fa-star" aria-hidden="true"></i></span> based on 555 reviews</p>
                                </div>
                            </div>
                        </div>
                        <div class="hp-section">
                            <div class="hp-sub-tit">
                                <h4><span>USER</span> REVIEWS</h4>
                                <p>View all reviews from our customer regarding this room.</p>
                            </div>
                            <div class="lp-ur-all-rat">
                                <ul>
                                    @if(count($room_type->rooms) > 0)
                                    @foreach($room_type->rooms as $room)
                                            @if(count($room->reviews) > 0)
                                            @foreach($room->reviews as $review)

                                                    <li>
                                                        <div class="lr-user-wr-img"> <img src="{{'/storage/avatars/'.$review->room_booking->user->avatar}}" alt=""> </div>
                                                        <div class="lr-user-wr-con">
                                                            <h6>Jacob Michael <span> {{ $review->rating }} <i class="fa fa-star" aria-hidden="true"></i></span></h6> <span class="lr-revi-date"> {{ \Carbon\Carbon::parse($review->updated_at)->diffForHumans() }}</span>
                                                            <p>{{ $review->review }}</p>

                                                        </div>
                                                    </li>
                                                @endforeach
                                            @endif
                                        @endforeach
                                    @endif
                                </ul>
                                </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <!--=========================================-->
                    <div class="hp-call hp-right-com">
                        <div class="hp-call-in"> <img src="images/icon/dbc4.png" alt="">
                            <h3><span>Check Availability. Call us!</span> +01 4214 4214</h3> <small>We are available 24/7 Monday to Sunday</small> <a href="#">Call Now</a> </div>
                    </div>
                    <!--=========================================-->
                    <!--=========================================-->
                    <div class="hp-book hp-right-com">
                        <div class="hp-book-in">
                            <button class="like-button"><i class="fa fa-heart-o"></i> Bookmark this listing</button> <span>159 people bookmarked this place</span>
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook"></i> Share</a>
                                </li>
                                <li><a href="#"><i class="fa fa-twitter"></i> Tweet</a>
                                </li>
                                <li><a href="#"><i class="fa fa-google-plus"></i> Share</a>
                                </li>
                                <!-- <li><a class="pinterest-share" href="#"><i class="fa fa-pinterest-p"></i> Pin</a></li> -->
                            </ul>
                        </div>
                    </div>
                    <!--=========================================-->
                    <!--=========================================-->
                    <div class="hp-card hp-right-com">
                        <div class="hp-card-in">
                            <h3>We Accept</h3> <span>159 people bookmarked this place</span> <img src="images/card.png" alt=""> </div>
                    </div>
                    <!--=========================================-->
                </div>
            </div>
        </div>
    </div>
@endsection
