<?php

namespace App\Http\Controllers\Front;

use App\Model\RoomType;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;


class RoomTypeController extends FrontController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $room_types = RoomType::whereHas('images', function ($query){
            $query->where('is_primary', true);
        })->with(['images' => function($query){
            $query->where('is_primary', true)->where('status', true);
        },
            'facilities' => function($query){
                $query->where('status', true);
            }])
            ->where('status', 1)
            ->orderBy('id', 'asc')
            ->get();

        return view('front.room_type.index')->with([
            'room_types' => $room_types
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
        $room_type = RoomType::where('status', true)->findOrFail($id);

        $images = $room_type->images()->where('status', 1)->get();
        return view('front.room_type.profile')
            ->with([
                'room_type' => $room_type,
                'images' => $images,
            ]);
    }
}
