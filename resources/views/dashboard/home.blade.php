@extends('layouts.dashboard')

@section('content')
    <div class="db-cent-2">
        <div class="db-2-main-1">
            <div class="db-2-main-2"> <img src="{{ asset("front/images/icon/dbc5.png") }}" alt=""> <span> Room Bookings</span>
                <p></p>
                <h2>{{ $total_room_bookings }}</h2> </div>
        </div>
        <div class="db-2-main-1">
            <div class="db-2-main-2"> <img src="{{ asset("front/images/icon/dbc6.png") }}" alt=""> <span> Event Bookings</span>
                <p></p>
                <h2>{{ $total_event_bookings }}</h2> </div>
        </div>
        <div class="db-2-main-1">
            <div class="db-2-main-2"> <img src="{{ asset("front/images/icon/dbc3.png") }}" alt=""> <span> Payment Status</span>
                <p></p>
                <h2>16</h2> </div>
        </div>
    </div>
    <div class="db-cent-3">
        <div class="db-cent-table db-com-table">
            <div class="db-title">
                <h3><img src="{{ asset("front/images/icon/dbc5.png") }}" alt=""/> Room Bookings</h3>
                <p>View your upcoming hotel bookings here</p>
            </div>
            <table class="bordered responsive-table">
                <thead>
                <tr>
                    <th>Room No</th>
                    <th>Type</th>
                    <th>Arrival</th>
                    <th>Departure</th>
                    <th>Total Cost</th>
                    <th>Status</th>
                    <th>Payment</th>
                </tr>
                </thead>
                <tbody>
                @forelse($room_bookings as $index => $room_booking)
                    <tr>
                        <td>{{ $room_booking->room->room_number}}</td>
                        <td>{{ $room_booking->room->room_type->name}}</td>
                        <td>{{ $room_booking->arrival_date }}</td>
                        <td>{{ $room_booking->departure_date }}</td>
                        <td>Rs. {{ $room_booking->room_cost }}</td>
                        <td>
                            @if($room_booking->status == "pending")
                                <span class="db-success">Pending</span>
                            @elseif($room_booking->status == "checked_in")
                                <span class="db-success">Checked In</span>
                            @else
                                <span class="db-success">Checked Out</span>
                            @endif
                        </td>
                        <td>
                            @if($room_booking->payment == true)
                                <span class="db-success">Paid</span>
                            @else
                                <span class="db-not-success">Not Paid</span>
                            @endif
                        </td>

                    </tr>
                @empty
                    <tr>
                        <td>Sorry, no room bookings found.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <div class="db-cent-3">
        <div class="db-cent-table db-com-table">
            <div class="db-title">
                <h3><img src="{{ asset("front/images/icon/dbc6.png") }}" alt=""/> My Event Bookings</h3>
                <p>View all of your event bookings here.</p>
            </div>
            <table class="bordered responsive-table">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Event</th>
                    <th>Venue</th>
                    <th>Date</th>
                    <th>No of Tickets</th>
                    <th>Total Cost</th>
                    <th>Status</th>
                    <th>Payment</th>
                </tr>
                </thead>
                <tbody>
                @forelse($event_bookings as $index => $event_booking)
                    <tr>
                        <td>{{ $index+1 }}</td>
                        <td>{{ $event_booking->event->name}}</td>
                        <td>{{ $event_booking->event->venue}}</td>
                        <td>{{ $event_booking->event->date}}</td>
                        <td>{{ $event_booking->number_of_tickets }}</td>
                        <td>Rs. {{ $event_booking->total_cost }}</td>
                        <td>
                            @if($event_booking->status == true)
                                <span class="db-success">Active</span>
                            @else
                                <span class="db-not-success">Cancelled</span>
                            @endif
                        </td>
                        <td>
                            @if($event_booking->payment == true)
                                <span class="db-success">Paid</span>
                            @else
                                <span class="db-not-success">Not Paid</span>
                            @endif
                        </td>

                    </tr>
                @empty
                    <tr>
                        <td>Sorry, no bookings found.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
    <div class="db-cent-3">
        <div class="db-cent-acti">
            <div class="db-title">
                <h3><img src="front/images/icon/dbc1.png" alt=""/> My Activity</h3>
                <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form</p>
            </div>
            <ul>
                <li>
                    <div class="db-cent-wr-img"> <img src="front/images/users/3.png" alt=""> </div>
                    <div class="db-cent-wr-con">
                        <h6>Hotel Booking Canceled</h6> <span class="lr-revi-date">21th July, 2016</span>
                        <p>The hotel is clean, convenient and good value for money. Staff are courteous and helpful. However, they need more training to be efficient.</p>
                        <ul>
                            <li><a href="#!"><i class="fa fa-facebook" aria-hidden="true"></i></a> </li>
                            <li><a href="#!"><i class="fa fa-google-plus" aria-hidden="true"></i></a> </li>
                            <li><a href="#!"><i class="fa fa-twitter" aria-hidden="true"></i></a> </li>
                            <li><a href="#!"><i class="fa fa-linkedin" aria-hidden="true"></i></a> </li>
                            <li><a href="#!"><i class="fa fa-youtube" aria-hidden="true"></i></a> </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <div class="db-cent-wr-img"> <img src="front/images/users/3.png" alt=""> </div>
                    <div class="db-cent-wr-con">
                        <h6>Hotel Payment Success</h6> <span class="lr-revi-date">08th August, 2016</span>
                        <p>The hotel is clean, convenient and good value for money. Staff are courteous and helpful. However, they need more training to be efficient.</p>
                        <ul>
                            <li><a href="#!"><i class="fa fa-facebook" aria-hidden="true"></i></a> </li>
                            <li><a href="#!"><i class="fa fa-google-plus" aria-hidden="true"></i></a> </li>
                            <li><a href="#!"><i class="fa fa-twitter" aria-hidden="true"></i></a> </li>
                            <li><a href="#!"><i class="fa fa-linkedin" aria-hidden="true"></i></a> </li>
                            <li><a href="#!"><i class="fa fa-youtube" aria-hidden="true"></i></a> </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
@endsection
