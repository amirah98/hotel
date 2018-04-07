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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $room_type = RoomType::findOrFail($id);
        $images = $room_type->images()->where('status', 1)->get();
        return view('front.room_type.profile')
            ->with([
                'room_type' => $room_type,
                'images' => $images,
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function book_package(Request $request, $package_id)
    {
        //check here if the user is authenticated
        if (!Auth::check()) {
            return Redirect::to("/login");
        }

        $rules = [
            'travel_date' => 'required|date|date_format:Y/m/d|after_or_equal:today',
        ];

        if(!empty($request->input('contact_name')))
            $rules['contact_name'] = 'min:5, max:50';

        if(!empty($request->input('contact_number')))
            $rules['contact_number'] = 'digits_between:9,15';

        if(!empty($request->input('contact_email')))
            $rules['contact_email'] = 'email|max:50';

        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return redirect()->back()
                ->withInput($request->all())
                ->withErrors($validator);
        } else{
            $user = Auth::user();
            $package = Package::findOrFail($package_id);
            $contact_name = $request->input('contact_name')? $request->input('contact_name'): $user->first_name." ".$user->last_name;
            $contact_email = $request->input('contact_email')? $request->input('contact_email'): $user->email;
            $contact_number = $request->input('contact_number')? $request->input('contact_number'): $user->phone;

            $user->booked_packages()->save($package, [
                'travel_date' => $request->input('travel_date'),
                'return_date' => $request->input('travel_date'),
                'contact_name' => $contact_name,
                'contact_number' => $contact_number,
                'contact_email' => $contact_email,
                'cost' => $package->total_cost,
            ]);

            $this->send_email_to_agent($request->input('contact_email'));

            Session::flash('flash_title', "Success");
            Session::flash('flash_message', "Package has been Booked.");
            return redirect('/dashboard/traveler/booking');
        }

    }

    private function send_email_to_agent($email){
        if(empty($email)){
            $email = Auth::user()->email;
        }

        Mail::to($email)->send(new AgentMail());
    }
}
