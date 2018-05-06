@extends('layouts.dashboard')

@section('content')

    <div class="db-cent-3">
        <div class="db-cent-table db-com-table">
            <div class="db-title">
                <h3><img src="{{ asset("front/images/icon/dbc5.png") }}" alt=""/> My Room Bookings</h3>
                <p>View all of your hotel room bookings here.</p>
            </div>
            <div class="db-title">
                @foreach ($errors->all() as $error)
                    <p style="color:red">{{ $error }}</p>
                @endforeach

                    @if(Session::has('flash_message'))
                        <p style="color:forestgreen">{{ Session::get('flash_title') }}, {{ Session::get('flash_message') }}</p>
                    @endif
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
                    <th>Action</th>
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
                            <span class="label label-default">Pending</span>
                        @elseif($room_booking->status == "checked_in")
                            <span class="label label-primary">Checked In</span>
                        @elseif($room_booking->status == "checked_out")
                            <span class="label label-success">Checked Out</span>
                        @else
                            <span class="label label-danger">Cancelled</span>
                        @endif
                    </td>
                    <td>
                        @if($room_booking->payment == true)
                            <span class="db-success">Paid</span>
                        @else
                            <span class="db-not-success">Not Paid</span>
                        @endif

                    </td>
                    <td>@if($room_booking->status !== "pending")
                        <a href="{{url('dashboard/room/booking/'.$room_booking->id.'/review')}}"><span class="label label-primary">Review</span></a>
                        @endif
                        @if($room_booking->status !== "cancelled")
                            <a href="{{url('dashboard/room/booking/'.$room_booking->id.'/cancel')}}"><span class="label label-danger">Cancel</span></a>
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
        {{ $room_bookings->links() }}
    </div>
@endsection
