<?php

namespace App\Http\Controllers\Admin;

use App\Model\Facility;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class FacilityController extends AdminController
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
        $facility = Facility::all();
        return view('admin.facility.view')->with('facility', $facility);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.facility.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->all());
        $rules = [
            'name' => 'required|max:50|unique:facility',
            'travel_mode' => 'required|max:15',
            'description' => 'max:200'
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()
                ->withInput($request->all())
                ->withErrors($validator);
        }

        Facility::create([
            'name' => $request->input('name'),
            'travel_mpde' => $request->input('travel_mode'),
            'description' => $request->input('description')
        ]);

        Session::flash('flash_title', 'Success');
        Session::flash('flash_message', 'The facility has been added successfully');
        return redirect('admin/travel_medium');

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $travel_medium = Facility::find($id);
        return view('admin.facility.edit')->with('travel_medium', $travel_medium);
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
        $travel_medium = Facility::find($id);
        $rules = [
            'name' => 'required|max:50|unique:facility,name,'.$id,
            'travel_mode' => 'required|max:15',
            'description' => 'max:200'
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()
                ->withInput($request->all())
                ->withErrors($validator);
        }

        $travel_medium->name = $request->input('name');
        $travel_medium->travel_mode = $request->input('travel_mode');
        $travel_medium->description = $request->input('description');
        $travel_medium->save();

        Session::flash('flash_title', 'Success');
        Session::flash('flash_message', 'The facility has been updated successfully');
        return redirect('admin/travel_medium');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $travel_medium = Facility::find($id);
        $travel_medium->delete();

        Session::flash('flash_title', 'Success');
        Session::flash('flash_message', 'The facility has been deleted successfully');
        return redirect('admin/travel_medium');

    }
}
