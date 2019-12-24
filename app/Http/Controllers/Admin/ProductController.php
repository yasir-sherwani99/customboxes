<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

use App\Category;
use App\Product;
use App\ProductImage;
use App\MainCategory;
use App\ProductSpecification;

use Session;
use DB;

class ProductController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function indexIndustry()
    {
    	
    	$main_category_id = 1;
    	$category_id = subCategory($main_category_id);

    	$products = Product::whereIn('category_id', $category_id)
    						->orderBy('id', 'desc')
    						->paginate(25);

    	$main_category = "Industry Boxes";
    	
    	return view('admin.pages.products.index', compact('products', 'main_category'));
    
    }

    public function indexStyles()
    {

    	$main_category_id = 2;
    	$category_id = subCategory($main_category_id);

    	$products = Product::whereIn('category_id', $category_id)
    						->orderBy('id', 'desc')
    						->paginate(25);

    	$main_category = "Style Boxes";
    	
    	return view('admin.pages.products.index', compact('products', 'main_category'));

    }

    public function indexOthers()
    {

    	$main_category_id = 3;
    	$category_id = subCategory($main_category_id);

    	$products = Product::whereIn('category_id', $category_id)
    						->orderBy('id', 'desc')
    						->paginate(25);

    	$main_category = "Other Products";
    	
    	return view('admin.pages.products.index', compact('products', 'main_category'));

    }

    public function create()
    {
        $main_categories = MainCategory::where('status', 1)->get();
    	return view('admin.pages.products.create', compact('main_categories'));	
    }

    public function getSubCategories($id)
    {
  
    	$categories = Category::select('id','title')
    						  ->where('main_category', $id)
    						  ->get()
    						  ->toArray();

    	return response()->json(['status' => 'success', 'data' => $categories]);					  

    }

    public function store(Request $request)
    {
    	
    	$request->validate([
		    'title' => 'required|string|unique:products|max:191',
		    'main_cat' => 'required',
		    'sub_cat' => 'required',
		    'price' => 'required|numeric|min:0',
		    'stock' => 'required|numeric|min:1',
		    'description' => 'required|string|min:25',
		    'image' => 'required',
		    'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg',
		    'status' => 'required',
            'dimension' => 'nullable|string|max:255',
            'print' => 'nullable|string|max:255',
            'paper_stock' => 'nullable|string|max:255',
            'quantity' => 'nullable|string|max:255',
            'coat' => 'nullable|string|max:255',
            'default_process' => 'nullable|string|max:255',
            'option' => 'nullable|string|max:255',
            'proof' => 'nullable|string|max:255',
            'turn_around_time' => 'nullable|string|max:255'
		]);

    	$product = Product::create([
            'title' => $request->title,
            'category_id' => $request->sub_cat,
            'description' => $request->description,
            'price' => $request->price,
            'units_in_stock' => $request->stock,
            'status' => $request->status
        ]);

        ProductSpecification::create([
            'product_id' => $product->id,
            'dimensions' => $request->dimension,
            'printing' => $request->print,
            'paper_stock' => $request->paper_stock,
            'quantities' => $request->quantity,
            'coating' => $request->coat,
            'default_process' => $request->default_process,
            'options' => $request->option,
            'proof' => $request->proof,
            'turn_around_time' => $request->turn_around_time
        ]);

    	if($request->hasfile('image'))
        {
            foreach($request->file('image') as $image)
            {
                
                $extention = $image->getClientOriginalExtension();
                $filename = uniqid();
                                    
                $filename_big = $filename . '-big' . '.' . $extention;
                $location = 'admin/app-assets/images/products/'.$filename_big;
                $img_big = Image::make($image)->resize(1200, 1200);
                $img_big->save($location);


                $filename_medium = $filename . '-medium' . '.' . $extention;
                $location = 'admin/app-assets/images/products/'.$filename_medium;
                $img_medium = Image::make($image)->resize(458, 458);
                $img_medium->save($location);
            

                $filename_small = $filename . '-small' . '.' . $extention;
                $location = 'admin/app-assets/images/products/'.$filename_small;
                $img_small = Image::make($image)->resize(107, 107);
                $img_small->save($location);
                    
                ProductImage::create([
                    'product_id' => $product->id,
                    'image_name' => $filename,
                    'image_big' => $filename_big,
                    'image_medium' => $filename_medium,
                    'image_small' => $filename_small
                ]);
                
            }

        }

        Session::flash('success', 'Product created successfully.');
    //    return redirect('admin_panel/products');
        if($request->main_cat == 1){
            return redirect('admin_panel/products/industry');   
        }elseif($request->main_cat == 2){
            return redirect('admin_panel/products/styles');
        }else{
            return redirect('admin_panel/products/others');
        }

    }

    public function edit($id)
    {
    
    	$product = Product::findOrFail($id);
    	
        $sub_category_id = $product->category_id;
    	$main_category_id = Category::where('id', $sub_category_id)->value('main_category');
        $main_category_title = MainCategory::where('id', $main_category_id)->value('title');

        $main_categories = MainCategory::where('status', 1)->get();
    	$categories = Category::where('main_category', $main_category_id)->get();

    	return view('admin.pages.products.edit', compact('product', 'main_category_id', 'main_category_title', 'main_categories', 'categories'));
    
    }

    public function deleteProductImage($image_id)
    {
    
    	$product = ProductImage::findOrFail($image_id);

        if(isset($product->image_big)){
            @unlink('admin/app-assets/images/products/'.$product->image_big);
        }
        if(isset($product->image_medium)){
            @unlink('admin/app-assets/images/products/'.$product->image_medium);
        }
        if(isset($product->image_small)){
            @unlink('admin/app-assets/images/products/'.$product->image_small);
        }    
    
        DB::table('product_images')
          ->where('id', $image_id)
          ->delete();
    	
    	return response()->json(['status' => 'success']);

    }

    public function update(Request $request, $id)
    {
		
		$request->validate([
		    'title' => 'required|string|max:191',
		    'main_cat' => 'required',
		    'sub_cat' => 'required',
		    'price' => 'required|numeric|min:0',
		    'stock' => 'required|numeric|min:1',
		    'description' => 'required|string|min:25',
		    'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg',
		    'status' => 'required',
            'dimension' => 'nullable|string|max:255',
            'print' => 'nullable|string|max:255',
            'paper_stock' => 'nullable|string|max:255',
            'quantity' => 'nullable|string|max:255',
            'coat' => 'nullable|string|max:255',
            'default_process' => 'nullable|string|max:255',
            'option' => 'nullable|string|max:255',
            'proof' => 'nullable|string|max:255',
            'turn_around_time' => 'nullable|string|max:255'
		]);

    	Product::whereId($id)
	    ->update([
            'title' => $request->title,
            'category_id' => $request->sub_cat,
            'description' => $request->description,
            'price' => $request->price,
            'units_in_stock' => $request->stock,
            'status' => $request->status
        ]);

        ProductSpecification::where('product_id', $id)
        ->update([
            'dimensions' => $request->dimension,
            'printing' => $request->print,
            'paper_stock' => $request->paper_stock,
            'quantities' => $request->quantity,
            'coating' => $request->coat,
            'default_process' => $request->default_process,
            'options' => $request->option,
            'proof' => $request->proof,
            'turn_around_time' => $request->turn_around_time
        ]);

        if($request->hasfile('image'))
        {
            foreach($request->file('image') as $image)
            {
                
                $extention = $image->getClientOriginalExtension();
                $filename = uniqid();
                        
                $filename_big = $filename . '-big' . '.' . $extention;
                $location = 'admin/app-assets/images/products/'.$filename_big;
                $img_big = Image::make($image)->resize(1200, 1200);
                $img_big->save($location);

                $filename_medium = $filename . '-medium' . '.' . $extention;
                $location = 'admin/app-assets/images/products/'.$filename_medium;
                $img_medium = Image::make($image)->resize(458, 458);
                $img_medium->save($location);
            
                $filename_small = $filename . '-small' . '.' . $extention;
                $location = 'admin/app-assets/images/products/'.$filename_small;
                $img_small = Image::make($image)->resize(107, 107);
                $img_small->save($location);
                    
                ProductImage::create([
                    'product_id' => $id,
                    'image_name' => $filename,
                    'image_big' => $filename_big,
                    'image_medium' => $filename_medium,
                    'image_small' => $filename_small
                ]);
                
            }

        }

        Session::flash('success', 'Product updated successfully.');
        if($request->main_cat == 1){
        	return redirect('admin_panel/products/industry');	
        }elseif($request->main_cat == 2){
        	return redirect('admin_panel/products/styles');
        }else{
        	return redirect('admin_panel/products/others');
        }
        
    }

}
