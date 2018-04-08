<?php

namespace App\Http\Controllers\Front;

use App\Model\Food;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;


class FoodController extends FrontController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $foods = Food::where('status', 1)
            ->orderBy('id', 'asc')
            ->get();

        return view('front.food.index')->with([
            'foods' => $foods
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
        $food = Food::findOrFail($id)->where('status', 1)->get();
        return view('front.food.profile')
            ->with([
                'food' => $food,
            ]);
    }
}
