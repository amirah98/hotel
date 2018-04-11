<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Dashboard\DashboardController;
use App\Model\RoomBooking;
use App\Model\EventBooking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends DashboardController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $room_bookings = RoomBooking::with('room')
            ->where('user_id', Auth::user()->id)
            ->limit(5)
            ->orderBy('created_at', 'asc')
            ->get();
        $total_room_bookings =  RoomBooking::where('user_id', Auth::user()->id)->count();
        $event_bookings = EventBooking::where('user_id', Auth::user()->id)
            ->limit(5)
            ->orderBy('created_at', 'asc')
            ->get();
        $total_event_bookings =  EventBooking::where('user_id', Auth::user()->id)->count();

        return view('dashboard.home')->with([
            'room_bookings' => $room_bookings,
            'total_room_bookings' => $total_room_bookings,
            'event_bookings' => $event_bookings,
            'total_event_bookings' => $total_event_bookings,
        ]);
    }
}
