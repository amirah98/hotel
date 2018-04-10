<?php

namespace App\Http\Controllers\Admin;

use App\Model\RoomType;
use App\Model\Image;

use App\Http\Controllers\Admin\AdminController;
use Intervention\Image\ImageManagerStatic as ImageManager;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class ImageController extends AdminController
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
    public function index($id)
    {
        $room_type = RoomType::find($id);
        return view('admin.image.view')
            ->with('room_type', $room_type);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $room_type = RoomType::find($id);
        return view('admin.image.add')
            ->with('room_type', $room_type);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store($id, Request $request)
    {
        $rules = [
            'caption' => 'max:30',
            'image' => 'required|mimes:jpeg, jpg, png',
            'is_primary' => 'required',
            'status' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()
                ->withInput($request->all)
                ->withErrors($validator);
        } else {
            $room_type = RoomType::find($id);
            $image = new Image();
            if ($request->hasFile('image')) {
                $path = $request->file('image')->store('', 'room_type');
                $room_type_image = ImageManager::make('storage/room_types/' . $path);
                $room_type_image->fit(950, 400);
                $room_type_image->save(storage_path() . '/app/public/room_types/' . $path);
                $image->name = $path;
            }

            $image->caption = $request->input('caption');
            $image->is_primary = $request->input('is_primary');
            if($image->is_primary == true){
                $this->set_is_primary_false($id);
            }

            $image->status = $request->input('status');
            $image->room_type_id = $id;
            $image->save();

            Session::flash('flash_title', "Success");
            Session::flash('flash_message', "Photo has been added to the room gallery. Add more images.");

            return redirect('/admin/room_type/'.$id.'/image');
        }
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
    public function edit($id, $image_id)
    {
        $room_type = RoomType::find($id);
        $image = Image::find($image_id);
        return view('admin.image.edit')
            ->with('room_type', $room_type)
            ->with('image', $image);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, $image_id, Request $request)
    {
        $rules = [
            'caption' => 'max:30',
            'is_primary' => 'required',
            'status' => 'required'
        ];
        if ($request->hasFile('image')) {
            $rules['image'] = 'mimes:jpeg,jpg,png';
        }
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()
                ->withInput($request->all)
                ->withErrors($validator);
        } else {

            $room_type = RoomType::find($id);
            $image = Image::find($image_id);
            if ($request->hasFile('image')) {
                Storage::delete('public/room_types/'.$image->name);

                $path = $request->file('image')->store('', 'room_type');
                $room_type_image = ImageManager::make('storage/room_types/' . $path);
                $room_type_image->fit(950, 400);
                $room_type_image->save(storage_path() . '/app/public/room_types/' . $path);
                $image->name = $path;
            }
            $image->caption = $request->input('caption');
            $image->is_primary = $request->input('is_primary');
            if($image->is_primary == true){
                $this->set_is_primary_false($id);
            }
            $image->status = $request->input('status');
            $image->save();

            Session::flash('flash_title', "Success");
            Session::flash('flash_message', "Photo has been updated.");

            return redirect('/admin/room_type/'.$id.'/image');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $image_id)
    {
        $room_type = RoomType::find($id);
        $image = Image::findOrFail($image_id);
        if($image->delete()){
            Storage::delete('public/room_types/'.$image->name);

            Session::flash('flash_title', 'Success');
            Session::flash('flash_message', 'Image has been deleted');

            return redirect('/admin/room_type/'.$id.'/image');
        }
        return redirect()
            ->back()
            ->withErrors(array('message' => 'Sorry, the image could not be deleted.'));

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_multiple($id)
    {
        $room_type = RoomType::find($id);
        return view('admin.image.add_multiple')
            ->with('room_type', $room_type);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store_multiple($id, Request $request)
    {
        $room_type = RoomType::find($id);
        $rules = [
            'images' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()
                ->withInput($request->all)
                ->withErrors($validator);
        } else {

            // Upload Photo
            if ($request->hasFile('images')) {
                $images = $request->file('images');

                foreach ($images as $file) {

                    $path = $file->store('','room_type');
                    $image = ImageManager::make('storage/room_types/'.$path);
                    $image->fit(950, 650);
                    $image->save(storage_path().'/app/public/room_types/'.$path);

                    Image::create([
                        'name' => $path,
                        'status' => $request->input('status'),
                        'room_type_id' => $room_type->id
                    ]);
                }
            }

            Session::flash('flash_title', "Success");
            Session::flash('flash_message', "All images has been added to the room_type.");

            return redirect('/dashboard/room_types/'.$id.'/image');
        }
    }

    public function set_is_primary_false($room_type_id)
    {
        $room_type = RoomType::find($room_type_id);
        foreach ($room_type->images as $image){
            $image->is_primary = false;
            $image->save();
        }
    }

}
