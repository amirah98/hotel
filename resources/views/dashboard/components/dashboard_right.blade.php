@section('dashboard_right')

    <div class="db-righ">
        <h4>Upcoming Bookings</h4>
        <ul>
            @foreach(\App\Model\RoomBooking::where('user_id', Auth::user()->id)->orderBy('arrival_date', 'desc')->limit('5')->get() as $room_booking)
            <li>
                <a href="{{ url('dashboard/room/booking') }}"> <img src="{{'/storage/room_types/'.$room_booking->room->room_type->images->first()->name}}" alt="">
                    <h5>{{ $room_booking->room->room_type->name }}, {{ $room_booking->room->room_number }} </h5>
                    <p>Status: {{ studly_case($room_booking->status) }}
                    </p>
                    <span>{{ \Carbon\Carbon::parse($room_booking->arrival_date)->diffForHumans() }}</span> </a>
            </li>
            @endforeach
        </ul>
    </div>
    @show