<?php

namespace App\Http\Controllers\Admin;

use App\Model\EventBooking;

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class EventBookingController extends AdminController
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $event_bookings = EventBooking::all();
        return view('admin.event_booking.view')
            ->with('event_bookings', $event_bookings);
    }

    public function edit($id)
    {
        $event_booking = EventBooking::find($id);
        return view('admin.event_booking.edit')->with('event_booking', $event_booking);
    }

    public function update(Request $request, $id)
    {
        $event_booking = EventBooking::findOrFail($id);

        $rules = [
            'status' => 'boolean',
            'payment' => 'boolean'
        ];
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return redirect()->back()
                ->withInput($request->all())
                ->withErrors($validator);
        }

        $event_booking->status = $request->input('status');
        $event_booking->payment = $request->input('payment');
        $event_booking->save();

        Session::flash('flash_title', 'Success');
        Session::flash('flash_message', 'The Event Booking has been updated successfully.');
        return redirect('/admin/event_booking');

    }

}
