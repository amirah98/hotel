<?php

namespace App\Http\Controllers\Admin;

use App\Model\Facility;
use App\Model\RoomType;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RoomTypeController extends AdminController
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
        $room_types = RoomType::with('facilities:name')->get();
        return view('admin.room_type.view')->with('room_types', $room_types);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $facilities = Facility::all()->where('status', true);
        return view('admin.room_type.add')
            ->with('facilities', $facilities);
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
            'name' => 'required|max:50|unique:room_types,name',
            'cost_per_day' => 'required|numeric|min:0',
            'size' => 'numeric|min:0',
            'discount_percentage' => 'integer|between:0,100',
            'max_adult' => 'integer|min:1',
            'max_child' => 'numeric',
            'description' => 'max:800',
            'facility' => 'array',
            'room_service' => 'boolean',
            'status' => 'required|boolean'
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()
                ->withInput($request->all())
                ->withErrors($validator);
        }

        $room_type = new RoomType();
        $room_type->name = $request->input('name');
        $room_type->cost_per_day = $request->input('cost_per_day');
        $room_type->size = $request->input('size');
        $room_type->discount_percentage = $request->input('discount_percentage');
        $room_type->max_adult = $request->input('max_adult');
        $room_type->max_child = $request->input('max_child');
        $room_type->description = $request->input('description');
        $room_type->room_service = $request->input('room_service');
        $room_type->status = $request->input('status');
        $room_type->save();

        if($request->has('facility')){
            $room_type->facilities()->attach(array_keys($request->input('facility')));
        }

        Session::flash('flash_title', 'Success');
        Session::flash('flash_message', 'The room_type has been added successfully');
        return redirect('admin/room_type');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $facilities = Facility::all()->where('status', true);
        $room_type = RoomType::find($id);
        return view('admin.room_type.edit')->with([
            'room_type' => $room_type,
            'facilities' => $facilities
        ]);
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
        $room_type = RoomType::find($id);
        $rules = [
            'name' => 'required|max:50|unique:room_types,name,'.$id,
            'cost_per_day' => 'required|numeric|min:0',
            'size' => 'numeric|min:0',
            'discount_percentage' => 'integer|between:0,100',
            'max_adult' => 'numeric',
            'max_child' => 'numeric',
            'description' => 'max:800',
            'facility' => 'array',
            'room_service' => 'boolean',
            'status' => 'required|boolean'
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()
                ->withInput($request->all())
                ->withErrors($validator);
        }

        $room_type->name = $request->input('name');
        $room_type->cost_per_day = $request->input('cost_per_day');
        $room_type->size = $request->input('size');
        $room_type->discount_percentage = $request->input('discount_percentage');
        $room_type->max_adult = $request->input('max_adult');
        $room_type->max_child = $request->input('max_child');
        $room_type->description = $request->input('description');
        $room_type->room_service = $request->input('room_service');
        $room_type->status = $request->input('status');
        $room_type->save();

        $room_type->facilities()->sync(array_keys($request->input('facility')));

        Session::flash('flash_title', 'Success');
        Session::flash('flash_message', 'The room_type has been updated successfully');
        return redirect('admin/room_type');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $room_type = RoomType::find($id);

        // Delete rooms
        foreach ($room_type->room as $room) {
            // Delete room bookings
            foreach ($room->room_bookings as $booking) {
                $booking->delete();
            }
            $room->delete();
        }

        // Delete images
        foreach ($room_type->images as $image) {
            if ($image->delete()) {
                if (Storage::disk('room_type')->exists($image->name)) {
                    Storage::delete('public/room_types/' . $image->name);
                }
            }
        }
        // TO_DO_DEM Clear all Facilities by Eloquent remove pivot records

        $room_type->delete();

        Session::flash('flash_title', 'Success');
        Session::flash('flash_message', 'The room_type has been deleted successfully');
        return redirect('admin/room_type');

    }
}
