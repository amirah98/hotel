<?php

namespace App\Http\Controllers\Front;

use App\Model\Event;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;


class EventController extends FrontController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::where('status', 1)
            ->orderBy('id', 'asc')
            ->get();

        return view('front.event.index')->with([
            'events' => $events
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Event::findOrFail($id)->where('status', 1)->get();
        return view('front.event.profile')
            ->with([
                'event' => $event,
            ]);
    }
}
