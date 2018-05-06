<?php

namespace App\Http\Controllers\Front;

use App\Model\Page;
use Illuminate\Http\Request;

class PageController extends FrontController
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
     * Show the contact page.
     *
     * @return \Illuminate\Http\Response
     */
    public function contact()
    {
        return view('front.contact');
    }

    /**
     * Show the about page.
     *
     * @return \Illuminate\Http\Response
     */
    public function about()
    {
        $page = Page::where('title', 'About')->where('status', true)->first();
        return view('front.about')->with('page', $page);
    }
}
