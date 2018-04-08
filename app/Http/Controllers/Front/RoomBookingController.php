<?php

namespace App\Http\Controllers\Front;

use App\Model\Room;
use App\Model\RoomBooking;
use App\Model\RoomType;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;


class RoomBookingController extends FrontController
{
    public function book_room(Request $request, $room_type_id)
    {
        //check here if the user is authenticated
        if (!Auth::check()) {
            return Redirect::to("/login");
        }

        $rules = [
            'adult' => 'required|numeric|min:1',
            'child' => 'required|numeric|min:0',
            'arrival_date' => 'required|date|date_format:Y/m/d|after_or_equal:today',
            'departure_date' => 'required|date|date_format:Y/m/d|after_or_equal:today',
        ];

        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return redirect()->back()
                ->withInput($request->all())
                ->withErrors($validator);
        }

        $room_booking = new RoomBooking();
        $user = Auth::user();
        $room_type = RoomType::findOrFail($room_type_id);

        $room_booking->arrival_date = $request->input('arrival_date');
        $room_booking->departure_date = $request->input('departure_date');
        /**
         * Find total cost by counting number of days and multiplying it with cost of rooms.
         */
        $startTime = Carbon::parse($room_booking->arrival_date);
        $finishTime = Carbon::parse($room_booking->departure_date);
        $no_of_days = $finishTime->diffInDays($startTime) ? $finishTime->diffInDays($startTime) : 1;
        $room_booking->room_cost = $no_of_days * $room_type->cost_per_day;
        $room_booking->user_id = $user->id;


        /**
         * Select random room for booking of given room type
         */
        $room = Room::where('room_type_id', $room_type_id)->where('status', true)->first();
        $room_booking->room_id = $room->id;
        $room_booking->user_id = $user->id;
        $room_booking->save();

        // $this->send_email_to_agent($request->input('contact_email'));

        Session::flash('flash_title', "Success");
        Session::flash('flash_message', "Room has been Booked.");
        return redirect('/dashboard/room/booking');

    }

    private function send_email_to_agent($email){
        if(empty($email)){
            $email = Auth::user()->email;
        }

        Mail::to($email)->send(new AgentMail());
    }
}
