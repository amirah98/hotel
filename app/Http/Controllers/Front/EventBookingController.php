<?php

namespace App\Http\Controllers\Front;


use App\Model\Event;
use App\Model\EventBooking;
use App\Rules\EventCapacityRule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;
use App\Mail\EventBooked;

class EventBookingController extends FrontController
{
    public function book(Request $request, $event_id)
    {


        //check here if the user is authenticated
        if (!Auth::check()) {
            return Redirect::to("/login");
        }

        $event = Event::findOrFail($event_id);
        // compare capacity with total tickets sold
        $total_booked_tickets = 0;
        foreach($event->event_bookings as $event_booking){
            $total_booked_tickets += $event_booking->number_of_tickets;
        }

        // Total available tickets; ticket capacity - total booked tickets
        $available_tickets = $event->capacity - $total_booked_tickets;
        $rules = [
            'number_of_tickets' => ["required","numeric", "min:1", new EventCapacityRule($available_tickets)],
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            return redirect()->back()
                ->withInput($request->all())
                ->withErrors($validator);
        }

        $event_booking = new EventBooking();
        $user = Auth::user();

        $event_booking->number_of_tickets = $request->input('number_of_tickets');
        /**
         * Find total cost by counting number of tickets and multiplying it with event price.
         */
        $event_booking->total_cost = $event_booking->number_of_tickets * $event->price;
        $event_booking->user_id = $user->id;
        $event_booking->event_id = $event->id;
        $event_booking->save();

        $this->send_email(Auth::user()->email);

        Session::flash('flash_title', "Success");
        Session::flash('flash_message', "Event has been Booked.");
        return redirect('/dashboard/event/booking');

    }

    private function send_email($email){
        if(empty($email)){
            $email = Auth::user()->email;
        }
        Mail::to($email)->send(new EventBooked());
    }
}
