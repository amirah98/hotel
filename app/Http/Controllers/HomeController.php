<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Slider;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = Slider::where('status', 1)->get();
        return view('front.home')->with([
            'images' => $images,
        ]);
    }
}
