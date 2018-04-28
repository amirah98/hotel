<?php
/**
 * Created by PhpStorm.
 * User: dir0130
 * Date: 4/28/2018
 * Time: 4:17 PM
 */

namespace App\Http\Controllers\Admin;


use App\Model\Review;
use Illuminate\Support\Facades\Session;

class ReviewController extends AdminController
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reviews = Review::orderByRaw("FIELD(approval_status , 'pending', 'rejected', 'approved') ASC")->get();
        return view('admin.review.view')->with('reviews', $reviews);
    }

    public function approve($id)
    {
        $review = Review::findOrFail($id);
        $review->approval_status = "approved";
        $review->save();

        Session::flash('flash_title', 'Success');
        Session::flash('flash_message', 'The review has been approved successfully');
        return redirect('admin/review');
    }

    public function reject($id)
    {
        $review = Review::findOrFail($id);
        $review->approval_status = "rejected";
        $review->save();

        Session::flash('flash_title', 'Success');
        Session::flash('flash_message', 'The review has been rejected successfully');
        return redirect('admin/review');
    }
}