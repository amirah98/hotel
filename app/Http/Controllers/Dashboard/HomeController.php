<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Dashboard\DashboardController;
use App\Model\RoomBooking;
use App\Model\EventBooking;
use App\Model\RoomType;
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

        $total_pending_payments = RoomBooking::where('user_id', Auth::user()->id)->where('payment', 0)->count()
                                + EventBooking::where('user_id', Auth::user()->id)->where('payment', 0)->count();


        $room_booking_with_reviews =  RoomBooking::whereHas('review', function ($query) {
            $query->where('user_id', Auth::user()->id)->orderBy('updated_at', 'desc')->limit('5');
        })->get();
        return view('dashboard.home')->with([
            'room_bookings' => $room_bookings,
            'total_room_bookings' => $total_room_bookings,
            'event_bookings' => $event_bookings,
            'total_event_bookings' => $total_event_bookings,
            'total_pending_payments' => $total_pending_payments,
            'room_booking_with_reviews' => $room_booking_with_reviews,
        ]);
    }
}
