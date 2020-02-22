<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Page;

use Session;

class PageController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $pages = Page::orderBy('title', 'ASC')->paginate(25);
        return view('admin.pages.pages.index', compact('pages'));
    }

    public function edit($id)
    {
        $page = Page::findOrFail($id);
        return view('admin.pages.pages.edit', compact('page'));
    }

    public function update(Request $request, $id)
    {
 		$request->validate([
            'title' => 'required|string|max:250',
        //    'slug' => 'required|alpha_dash|max:250',
            'description' => 'required|string|min:100',
            'page_title' => 'nullable|string|max:57',
            'page_description' => 'nullable|string|max:250',
            'page_keywords' => 'nullable|string|max:191',
            'status' => 'required'
        ]);

 		$slug = str_slug($request->title, '-');

        Page::whereId($id)
        ->update([
            'title' => $request->title,
            'description' => $request->description,
            'slug' => $slug,
            'page_title' => $request->page_title,
            'page_description' => $request->page_description,
            'page_keywords' => $request->page_keywords,
            'status' => $request->status  
        ]);

        Session::flash('success', 'Page updated successfully.');
        return redirect('admin_panel/pages');   	
    }
}
