<?php

namespace App\Http\Controllers\Dashboard;

use App\Model\EventBooking;
use Illuminate\Support\Facades\Auth;


class EventBookingController extends DashboardController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $event_bookings = EventBooking::with('event')
            ->where('user_id', Auth::user()->id)
            ->paginate(10);

        return view('dashboard.booking.event_booking')->with([
            'event_bookings' => $event_bookings
        ]);
    }

}
