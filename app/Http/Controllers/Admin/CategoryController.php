<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

use App\CategoryImage;
use App\Category;
use App\MainCategory;

use Session;
use DB;

class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
    	$categories = Category::select('categories.id as id', 'categories.title as title', 'categories.status as status', 'main_categories.title as main_category')
                              ->join('main_categories', 'categories.main_category', '=', 'main_categories.id')
                              ->orderBy('categories.title', 'ASC')
                              ->get();

    	return view('admin.pages.sub_categories.index', compact('categories'));
    }

    public function create()
    {
    	$main_categories = MainCategory::where('status', 1)->get();
        return view('admin.pages.sub_categories.create', compact('main_categories'));	
    }

    public function store(Request $request)
    {
    	
    	$request->validate([
		    'title' => 'required|string|unique:categories|max:191',
		    'main_cat' => 'required',
		    'image' => 'required',
            'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg',
		    'status' => 'required'
		]);

		$category = Category::create([
			            'title' => $request->title,
			            'main_category' => $request->main_cat,
			            'status' => $request->status
		        	]);

        if($request->hasfile('image'))
        {
            foreach($request->file('image') as $image)
            {
                $extention = $image->getClientOriginalExtension();
                $filename = uniqid().'.'.$extention;
                $location = 'admin/app-assets/images/categories/'.$filename;
                $img = Image::make($image)->resize(450, 450);
                $img->save($location);
                
                CategoryImage::create([
                    'category_id' => $category->id,
                    'image' => $filename,
                ]);
            }

        }

        Session::flash('success', 'Category created successfully.');
        return redirect('admin_panel/subcategories');

    }

    public function edit($id)
    {
		
        $category = Category::select('categories.id as id', 'categories.title as title', 'categories.status as status', 'main_categories.id as main_category_id', 'main_categories.title as main_category_title')
                              ->join('main_categories', 'categories.main_category', '=', 'main_categories.id')
                              ->where('categories.id', $id)
                              ->first();
	   	
        $main_categories = MainCategory::where('status', 1)->get();

    	return view('admin.pages.sub_categories.edit', compact('category', 'main_categories'));
    
    }

    public function deleteCategoryImage($image_id)
    {
        
        $category = CategoryImage::findOrFail($image_id);
        
        if(isset($category->image)){
            @unlink('admin/app-assets/images/categories/'.$category->image);
        }

        DB::table('category_images')
          ->where('id', $image_id)
          ->delete();

        return response()->json(['status' => 'success']);

    }

    public function update(Request $request, $id)
    {
    	
    	$request->validate([
		    'title' => 'required|string|max:191',
		    'main_cat' => 'required',
		    'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg',
		    'status' => 'required'
		]);

        Category::whereId($id)
                ->update([
                    'title' => $request->title,
                    'main_category' => $request->main_cat,
                    'status' => $request->status
                ]);

        if($request->hasfile('image'))
        {
            foreach($request->file('image') as $image)
            {
                $extention = $image->getClientOriginalExtension();
                $filename = uniqid().'.'.$extention;
                $location = 'admin/app-assets/images/categories/'.$filename;
                $img = Image::make($image)->resize(450, 450);
                $img->save($location);
                
                CategoryImage::create([
                    'category_id' => $id,
                    'image' => $filename,
                ]);
            }

        }

        Session::flash('success', 'Category updated successfully.');
        return redirect('admin_panel/subcategories');

    }

}
