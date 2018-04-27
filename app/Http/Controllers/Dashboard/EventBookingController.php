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

    public function cancel($id)
    {
        $event_booking = EventBooking::findOrFail($id);

        // If the payment is already made
        if($event_booking->payment == true){
            return back()->withErrors('Sorry, you cannot cancel booking which has been already paid. Please, contact hotel staff.');
        }
        if($event_booking->status == false){
            return back()->withErrors('Sorry, you cannot cancel booking which is already cancelled. Please, contact hotel staff.');
        }
        $event_booking->status = false;
        $event_booking->save();

        Session::flash('flash_title', 'Success');
        Session::flash('flash_message', 'The event booking has been cancelled successfully');
        return redirect('dashboard/event/booking');
    }

}
