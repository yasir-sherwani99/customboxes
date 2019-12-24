<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

use App\MainCategory;

use Session;

class MainCategoryController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
    	$categories = MainCategory::orderBy('id', 'DESC')->paginate(25);
    	return view('admin.pages.main_categories.index', compact('categories'));
    }

    public function create()
    {
    	return view('admin.pages.main_categories.create');	
    }

    public function store(Request $request)
    {
    	
    	$request->validate([
		    'title' => 'required|string|unique:main_categories|max:191',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
		    'status' => 'required'
		]);

		$category = MainCategory::create([
			            'title' => $request->title,
			            'status' => $request->status
		        	]);

        if ($request->hasFile('image')) {

			$cat = MainCategory::findOrFail($category->id);

            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = 'admin/app-assets/images/categories/'. $filename;
            $img = Image::make($image)->resize(250, 250);
            $img->save($location);
                       
            $cat->image = $filename;
            $cat->save();
        
        }

        Session::flash('success', 'Category created successfully.');
        return redirect('admin_panel/main_categories');

    }

    public function edit($id)
    {
		
		$category = MainCategory::findOrFail($id);    	

    	return view('admin.pages.main_categories.edit', compact('category'));
    
    }

    public function update(Request $request, $id)
    {
    	
    	$request->validate([
		    'title' => 'required|string|max:191',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
		    'status' => 'required'
		]);

		MainCategory::whereId($id)
					->update([
			            'title' => $request->title,
			            'status' => $request->status
		        	]);

        if ($request->hasFile('image')) {

			$cat = MainCategory::findOrFail($id);

			if(isset($cat->image)){
	            @unlink('admin/app-assets/images/categories/'.$cat->image);
	        }

            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = 'admin/app-assets/images/categories/'. $filename;
            $img = Image::make($image)->resize(250, 250);
            $img->save($location);
                       
            $cat->image = $filename;
            $cat->save();
        
        }

        Session::flash('success', 'Category updated successfully.');
        return redirect('admin_panel/main_categories');

    }

}
