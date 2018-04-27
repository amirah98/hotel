<?php

namespace App\Http\Controllers\Admin;

use App\Model\Food;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as ImageManager;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class FoodController extends AdminController
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
        $foods = Food::all();
        return view('admin.food.view')->with('foods', $foods);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.food.add');
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
            'name' => 'required|max:100|unique:foods,name',
            'type' => 'required|in:Appetizer,Soup,Salad,Main Course,Dessert',
            'image' => 'required|mimes:jpeg, jpg, png',
            'price' => 'required|numeric|min:0',
            'description' => 'max:100',
            'status' => 'required|boolean'
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()
                ->withInput($request->all())
                ->withErrors($validator);
        }
        $food = new Food();
        $food->name = $request->input('name');
        $food->price = $request->input('price');
        $food->description = $request->input('description');
        $food->status = $request->input('status');

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('', 'food');
            $food_image = ImageManager::make('storage/foods/' . $path);
            $food_image->fit(70, 70);
            $food_image->save(storage_path() . '/app/public/foods/' . $path);
            $food->image = $path;
        }

        $food->save();

        Session::flash('flash_title', 'Success');
        Session::flash('flash_message', 'The food has been added successfully');
        return redirect('admin/food');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $food = Food::find($id);
        return view('admin.food.edit')->with('food', $food);
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
        $food = Food::find($id);
        $rules = [
            'name' => 'required|max:100|unique:foods,name,'.$id,
            'type' => 'required|in:Appetizer,Soup,Salad,Main Course,Dessert',
            'price' => 'required|numeric|min:0',
            'description' => 'max:100',
            'status' => 'required|boolean'
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

        $food->name = $request->input('name');
        $food->price = $request->input('price');
        $food->description = $request->input('description');
        $food->status = $request->input('status');

        if ($request->hasFile('image')) {
            Storage::delete('public/foods/'.$food->image);

            $path = $request->file('image')->store('', 'food');
            $food_image = ImageManager::make('storage/foods/' . $path);
            $food_image->fit(70, 70);
            $food_image->save(storage_path() . '/app/public/foods/' . $path);
            $food->image = $path;
        }

        $food->save();

        Session::flash('flash_title', 'Success');
        Session::flash('flash_message', 'The food has been updated successfully');
        return redirect('admin/food');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $food = Food::find($id);
        if($food->delete()){
            Storage::delete('public/foods/'.$food->image);

            Session::flash('flash_title', 'Success');
            Session::flash('flash_message', 'Image has been deleted');
        }

        Session::flash('flash_title', 'Success');
        Session::flash('flash_message', 'The food has been deleted successfully');
        return redirect('admin/food');

    }
}
