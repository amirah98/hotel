<?php

namespace App\Http\Controllers\Dashboard;

use App\Model\RoomBooking;



class RoomBookingController extends DashboardController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $room_bookings = RoomBooking::with('room')
            ->paginate(10);

        return view('dashboard.booking.index')->with([
            'room_bookings' => $room_bookings
        ]);
    }

}
