<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Front\FrontController;
use App\Model\Event;
use App\Model\RoomBooking;
use Illuminate\Http\Request;

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
        $room_bookings = RoomBooking::all();

        return view('dashboard.home')->with([
            'room_bookings' => $room_bookings
        ]);
    }
}
