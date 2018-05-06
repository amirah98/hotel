<?php

namespace App\Http\Controllers\Admin;

use App\Model\Page;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class PageController extends AdminController
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
        $pages = Page::all();
        return view('admin.page.view')->with('pages', $pages);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.page.add');
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
            'title' => 'required|max:15|unique:pages,title',
            'description' => 'max:500',
            'status' => 'required|boolean'
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()
                ->withInput($request->all())
                ->withErrors($validator);
        }
        $page = new Page();
        $page->title = $request->input('title');
        $page->url_title = $request->input('title');
        $page->description = $request->input('description');
        $page->status = $request->input('status');

        $page->save();

        Session::flash('flash_title', 'Success');
        Session::flash('flash_message', 'The page has been added successfully');
        return redirect('admin/page');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page = Page::find($id);
        return view('admin.page.edit')->with('page', $page);
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
        $page = Page::find($id);
        $rules = [
            'title' => 'required|max:15|unique:pages,title,'.$id,
            'description' => 'max:500',
            'status' => 'required|boolean'
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->back()
                ->withInput($request->all())
                ->withErrors($validator);
        }

        $page->title = $request->input('title');
        $page->url_title = $request->input('title');
        $page->description = $request->input('description');
        $page->status = $request->input('status');

        $page->save();

        Session::flash('flash_title', 'Success');
        Session::flash('flash_message', 'The page has been updated successfully');
        return redirect('admin/page');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $page = Page::find($id);
        $page->delete();

        Session::flash('flash_title', 'Success');
        Session::flash('flash_message', 'The page has been deleted successfully');
        return redirect('admin/page');

    }
}
