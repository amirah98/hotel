<?php

namespace App\Http\Controllers\Admin;

use App\Model\Event;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as ImageManager;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class EventController extends AdminController
{

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
        $events = Event::all();
        return view('admin.event.view')->with('events', $events);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.event.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|max:50|unique:events,name',
            'image' => 'required|mimes:jpeg, jpg, png',
            'date' => 'required|date|date_format:Y/m/d|after_or_equal:today',
            'venue' => 'required|max:50',
            'price' => 'required|numeric|min:0',
            'description' => 'max:200',
            'capacity' => 'required|numeric|min:0',
            'status' => 'required|boolean',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()
                ->withInput($request->all())
                ->withErrors($validator);
        }
        $event = new Event();
        $event->name = $request->input('name');
        $event->date = $request->input('date');
        $event->venue = $request->input('venue');
        $event->price = $request->input('price');
        $event->description = $request->input('description');
        $event->capacity = $request->input('capacity');
        $event->status = $request->input('status');

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('', 'event');
            $event_image = ImageManager::make('storage/events/' . $path);
            $event_image->fit(500, 450);
            $event_image->save(storage_path() . '/app/public/events/' . $path);
            $event->image = $path;
        }

        $event->save();

        Session::flash('flash_title', 'Success');
        Session::flash('flash_message', 'The event has been added successfully');
        return redirect('admin/event');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Event::find($id);
        return view('admin.event.edit')->with('event', $event);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $event = Event::find($id);

        $rules = [
            'name' => 'required|max:50|unique:events,name,'.$id,
            'date' => 'required|date|date_format:Y/m/d|after_or_equal:'.$event->date,
            'venue' => 'required|max:50',
            'price' => 'required|numeric|min:0',
            'description' => 'max:200',
            'capacity' => 'required|numeric|min:0',
            'status' => 'required|boolean',
        ];

        if ($request->hasFile('image')) {
            $rules['image'] = 'mimes:jpeg,jpg,png';
        }

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()
                ->withInput($request->all())
                ->withErrors($validator);
        }

        $event->name = $request->input('name');
        $event->date = $request->input('date');
        $event->venue = $request->input('venue');
        $event->price = $request->input('price');
        $event->description = $request->input('description');
        $event->capacity = $request->input('capacity');
        $event->status = $request->input('status');

        if ($request->hasFile('image')) {
            Storage::delete('public/events/'.$event->image);

            $path = $request->file('image')->store('', 'event');
            $event_image = ImageManager::make('storage/events/' . $path);
            $event_image->fit(500, 450);
            $event_image->save(storage_path() . '/app/public/events/' . $path);
            $event->image = $path;
        }

        $event->save();

        Session::flash('flash_title', 'Success');
        Session::flash('flash_message', 'The event has been updated successfully');
        return redirect('admin/event');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::find($id);

        // Delete event bookings
        foreach ($event->event_bookings as $booking) {
            $booking->delete();
        }

        if($event->delete()){
            Storage::delete('public/events/'.$event->image);

            Session::flash('flash_title', 'Success');
            Session::flash('flash_message', 'Image has been deleted');
        }

        Session::flash('flash_title', 'Success');
        Session::flash('flash_message', 'The event has been deleted successfully');
        return redirect('admin/event');

    }
}
