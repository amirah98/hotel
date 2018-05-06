<?php

namespace App\Http\Controllers\Front;


use App\Model\Subscriber;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;


class SubscriberController extends FrontController
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'email' => 'required|unique:subscribers,email',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()
                ->withInput($request->all())
                ->withErrors($validator);
        }
        $subscriber = new Subscriber();
        $subscriber->email = $request->input('email');
        $subscriber->save();

        Session::flash('flash_title', 'Success');
        Session::flash('flash_message', 'You have subscribed to this website successfully.');
        return redirect('/');

    }
}
