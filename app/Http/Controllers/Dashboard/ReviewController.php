<?php

namespace App\Http\Controllers\Dashboard;

use App\Model\RoomBooking;
use App\Model\Review;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;


class ReviewController extends DashboardController
{

    public function create($room_booking_id)
    {
        $room_booking = RoomBooking::findOrFail($room_booking_id);
        return view('dashboard.booking.review')
            ->with('room_booking', $room_booking);
    }

    public function store(Request $request, $room_booking_id)
    {
        $room_booking = RoomBooking::findOrFail($room_booking_id);
        $rules = [
            'review' => 'max:200',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()
                ->withInput($request->all)
                ->withErrors($validator);
        } else {
            $review = Review::updateOrCreate(
                ['room_booking_id' => $room_booking_id],
                [
                    'review' => $request->input('review'),
                    'rating' => $request->input('rating')?$request->input('rating'):0,
                    'approval_status' => "pending",
                ]
            );

            Session::flash('flash_title', "Success");
            Session::flash('flash_message', "Review has been updated.");

            return redirect('/dashboard/room/booking');
        }
    }
}
