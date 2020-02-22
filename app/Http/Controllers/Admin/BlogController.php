<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

use App\BlogCategory;
use App\Category;
use App\Blog;

use Session;

class BlogController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function indexBlogCategory()
    {
    	$categories = BlogCategory::orderBy('created_at', 'DESC')->paginate(10);
    	return view('admin.pages.blog_categories.index', compact('categories'));
    }

    public function createBlogCategory()
    {
    	return view('admin.pages.blog_categories.create');
    }

    public function storeBlogCategory(Request $request)
    {

    	$request->validate([
		    'title' => 'required|string|unique:blog_categories|max:191'
		]);

        $slug = str_slug($request->title, '-');

		BlogCategory::create([
            'title' => $request->title,
            'slug' => $slug
    	]);

    	Session::flash('success', 'Blog category created successfully.');
        return redirect('admin_panel/blog_categories');

    }

    public function editBlogCategory($id)
    {
		$category = BlogCategory::findOrFail($id);
    	return view('admin.pages.blog_categories.edit', compact('category'));

    }

    public function updateBlogCategory(Request $request, $id)
    {
		$request->validate([
		    'title' => 'required|string|max:191'
		]);

        $slug = str_slug($request->title, '-');

		BlogCategory::whereId($id)
					->update([
			            'title' => $request->title,
                        'slug'  => $slug,
			    	]);

    	Session::flash('success', 'Blog category updated successfully.');
        return redirect('admin_panel/blog_categories');    	
    }

    public function indexBlog()
    {
        $blogs = Blog::orderBy('created_at', 'DESC')->paginate(20);
        return view('admin.pages.blog.index', compact('blogs'));
    }

    public function createBlog()
    {
        $categories = BlogCategory::orderBy('title', 'ASC')->get();
        $tags = Category::orderBy('title', 'ASC')->get();

        return view('admin.pages.blog.create', compact('categories', 'tags'));

    }

    public function storeBlog(Request $request)
    {
        
        $request->validate([
            'title' => 'required|string|unique:blogs|max:255',
         //   'slug' => 'required|alpha_dash|max:250|unique:blogs,slug',
            'category' => 'required',
            'description' => 'required|string|min:100',
         //   'image' => 'required|mimes:jpeg,png,jpg,gif,svg',
            'tags' => 'required',
            'tags.*' => 'max:5|exists:categories,id',
            'page_title' => 'nullable|string|max:57',
            'page_description' => 'nullable|string|max:250',
            'page_keywords' => 'nullable|string|max:191',
            'status' => 'required'
        ]);

        $slug = str_slug($request->title, '-');

        $post = Blog::create([
            'admin_id' => 1,
            'title' => $request->title,
            'category_id' => $request->category,
            'description' => $request->description,
            'page_title' => $request->page_title,
            'page_description' => $request->page_description,
            'page_keywords' => $request->page_keywords,
            'slug' => $request->slug,
            'status' => $request->status
        ]);

        $blog = Blog::findOrFail($post->id);

        if ($request->hasFile('image')) {
            
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = 'admin/app-assets/images/blogs/'. $filename;
            $img_big = Image::make($image)->resize(875, 420);
            $img_big->save($location);
            $blog->image = $filename;
        
        }

        $blog->tag()->sync($request->tags);
        $blog->save();

        Session::flash('success', 'Blog post created successfully.');
        return redirect('admin_panel/blogs');

    }

    public function editBlog($id)
    {
        
        $blog = Blog::findOrFail($id);
        $blog_category_title = BlogCategory::where('id', $blog->category_id)->value('title');

        $categories = BlogCategory::orderBy('title', 'ASC')->get();
        $tags = Category::orderBy('title', 'ASC')->get();

        return view('admin.pages.blog.edit', compact('blog', 'blog_category_title', 'categories', 'tags'));

    }

    public function updateBlog(Request $request, $id)
    {
        
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|alpha_dash|max:250',
            'category' => 'required',
            'description' => 'required|string|min:100',
         //   'image' => 'required|mimes:jpeg,png,jpg,gif,svg',
            'tags' => 'required',
            'tags.*' => 'max:5|exists:categories,id',
            'page_title' => 'nullable|string|max:57',
            'page_description' => 'nullable|string|max:250',
            'page_keywords' => 'nullable|string|max:191',
            'status' => 'required'
        ]);

    //    $slug = str_slug($request->title, '-');

        Blog::whereId($id)
        ->update([
            'admin_id' => 1,
            'title' => $request->title,
            'category_id' => $request->category,
            'description' => $request->description,
            'page_title' => $request->page_title,
            'page_description' => $request->page_description,
            'page_keywords' => $request->page_keywords,
            'slug' => $request->slug,
            'status' => $request->status
        ]);

        $blog = Blog::findOrFail($id);

        if ($request->hasFile('image')) {
            
            if(isset($blog->image)){
                @unlink('admin/app-assets/images/blogs/'.$blog->image);
            }

            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = 'admin/app-assets/images/blogs/'. $filename;
            $img_big = Image::make($image)->resize(875, 420);
            $img_big->save($location);
            $blog->image = $filename;
        
        }

        $blog->tag()->sync($request->tags);
        $blog->save();

        Session::flash('success', 'Blog post updated successfully.');
        return redirect('admin_panel/blogs');

    }

    public function upload(Request $request)
    {
        
        $image = $request->file('upload');
        $file_ext = $image->getClientOriginalExtension();
        if($file_ext == 'png' || $file_ext == 'JPG' || $file_ext == 'jpg' || $file_ext == 'jpeg' || $file_ext == 'svg' || $file_ext == 'gif')
        {
    
            $img = $request->file('upload');
            $filename = time() . '.' . $img->getClientOriginalExtension();
            $location = 'templateEditor/blog/'. $filename;
            Image::make($img)->save($location);
            
         //   $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $imagePath = "/templateEditor/blog/";
            $url = $imagePath . $filename;

            $msg = 'Image successfully uploaded'; 
            $re = "<script>window.parent.CKEDITOR.tools.callFunction(1, '{$url}', '{$msg}')</script>";

            @header('Content-type: text/html; charset=utf-8'); 
            echo $re;
        
        }else{
        
            echo "<script>window.alert('Only images with extension png,jpg,svg,gif are allowed!')</script>";
        
        }

    }

}
