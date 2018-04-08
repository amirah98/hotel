@extends('layouts.dashboard')

@section('content')

    <div class="db-cent-3">
        <div class="db-cent-table db-com-table">
            <div class="db-title">
                <h3><img src="{{ asset("front/images/icon/dbc5.png") }}" alt=""/> My Bookings</h3>
                <p>View all of your hotel rooms booking here.</p>
            </div>
            <table class="bordered responsive-table">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Room</th>
                    <th>Room Number</th>
                    <th>Arrival</th>
                    <th>Departure</th>
                    <th>Total Room Cost</th>
                    <th>Payment</th>
                </tr>
                </thead>
                <tbody>
                @forelse($room_bookings as $index => $room_booking)
                <tr>
                    <td>{{ $index+1 }}</td>
                    <td>{{ $room_booking->room->room_type->name}}</td>
                    <td>{{ $room_booking->room->room_number}}</td>
                    <td>{{ $room_booking->arrival_date }}</td>
                    <td>{{ $room_booking->departure_date }}</td>
                    <td>Rs. {{ $room_booking->room_cost }}</td>
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
                        <td>Sorry, no bookings found.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
        {{ $room_bookings->links() }}
    </div>
@endsection
