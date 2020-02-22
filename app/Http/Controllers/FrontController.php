<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;
use App\Product;
use App\MainCategory;
use App\ProductImage;
use App\Quote;
use App\Contact;
use App\Subscriber;
use App\Blog;
use App\BlogCategory;
use App\General;
use App\Faq;
use App\Slider;
use App\ProductSpecification;
use App\Page;

use DB;
use Mail;
use Session;

use App\Mail\QuoteEmail;
use App\Mail\ContactEmail;

class FrontController extends Controller
{
    
    public function index()
    {
    
        // Industry Boxes
        $industry_category_id = 1;
        $industry_boxes = $this->categories($industry_category_id);    

        // Style Boxes
        $style_category_id = 2;
        $style_boxes = $this->categories($style_category_id);

        // Other Products
        $other_category_id = 3;
        $other_products = $this->categories($other_category_id);

        $blogs = Blog::where('status', 1)
                     ->orderBy('created_at', 'DESC')
                     ->skip(0)
                     ->limit(3)
                     ->get();

        $sliders = Slider::orderBy('created_at', 'DESC')->get();

        $general = General::findOrFail(1);

        return view('front.pages.index', compact('industry_boxes', 'style_boxes', 'other_products', 'blogs', 'sliders', 'general'));

    }

    public function industryBoxesCategories($slug)
    {

        $category_id = Category::where('slug', $slug)->value('id');        
    
        $products = Product::where('category_id', $category_id)
                            ->where('status', 1)
                            ->get();

        $category = Category::findOrFail($category_id);

        $category_title = $category->title;
        $main_category_id = $category->main_category;
        $page_title = $category->page_title;
        $page_description = $category->page_description;
        $page_keywords = $category->page_keywords;

        $main_category = MainCategory::findOrFail($main_category_id);
        $main_category_title = $main_category->title;

        $total_products_of_category = count($products); 

        $other_categories = $this->otherCategories($category_id, $main_category_id);
        
        return view('front.pages.category', compact('products', 'category_title', 'page_title', 'page_description', 'page_keywords', 'main_category_id', 'main_category_title', 'total_products_of_category', 'other_categories'));

    }

    public function styleBoxesCategories($slug)
    {
        
        $category_id = Category::where('slug', $slug)->value('id');        
    
        $products = Product::where('category_id', $category_id)
                            ->where('status', 1)
                            ->get();

        $category = Category::findOrFail($category_id);

        $category_title = $category->title;
        $main_category_id = $category->main_category;
        $page_title = $category->page_title;
        $page_description = $category->page_description;
        $page_keywords = $category->page_keywords;

        $main_category = MainCategory::findOrFail($main_category_id);
        $main_category_title = $main_category->title;

        $total_products_of_category = count($products); 

        $other_categories = $this->otherCategories($category_id, $main_category_id);
        
        return view('front.pages.category', compact('products', 'category_title', 'page_title', 'page_description', 'page_keywords', 'main_category_id', 'main_category_title', 'total_products_of_category', 'other_categories'));

    }

    public function otherProductsCategories($slug)
    {
        
        $category_id = Category::where('slug', $slug)->value('id');        
    
        $products = Product::where('category_id', $category_id)
                            ->where('status', 1)
                            ->get();

        $category = Category::findOrFail($category_id);

        $category_title = $category->title;
        $main_category_id = $category->main_category;
        $page_title = $category->page_title;
        $page_description = $category->page_description;
        $page_keywords = $category->page_keywords;

        $main_category = MainCategory::findOrFail($main_category_id);
        $main_category_title = $main_category->title;

        $total_products_of_category = count($products); 

        $other_categories = $this->otherCategories($category_id, $main_category_id);
        
        return view('front.pages.category', compact('products', 'category_title', 'page_title', 'page_description', 'page_keywords', 'main_category_id', 'main_category_title', 'total_products_of_category', 'other_categories'));

    }

    public function productDetails($slug)
    {
    	
        $product_id = Product::where('slug', $slug)->value('id');
        $product = Product::findOrFail($product_id);
        
        $category_id = $product->category_id;
        $other_products = Product::where('id', '<>', $product_id)
                                 ->where('category_id', $category_id)
                                 ->get();

        $specification = ProductSpecification::findOrFail(1);

        return view('front.pages.product_details', compact('product', 'other_products', 'specification'));	
    
    }

    public function quoteIndex()
    {
        // box styles
        $main_category_id = 2;
        $category_id = subCategory($main_category_id);

        $products = Product::whereIn('category_id', $category_id)
                            ->where('status', 1)
                            ->orderBy('title', 'ASC')
                            ->get();

        return view('front.pages.quote', compact('products'));
    
    }

    public function quoteStore(Request $request)
    {

        $request->validate([
            'full_name' => 'required|string|max:191',
            'email' => 'required|string|email|max:191',
            'phone' => 'required|numeric',
            'width' => 'nullable|numeric',
            'height' => 'nullable|numeric',
            'length' => 'nullable|numeric',
            'unit' => 'nullable',
            'colors' => 'nullable',
            'quantity' => 'nullable|numeric',
            'comments' => 'nullable|string',
         //   'g-recaptcha-response' => 'required|captcha',
        ]);

        Quote::create([
            'invoice' => 'QT-'.mt_rand(1000000, 9999999),
            'full_name' => $request->full_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'box_type_id' => $request->box_type,
            'stock' => $request->stock,
            'width' => $request->width,
            'height' => $request->height,
            'length' => $request->length,
            'units' => $request->unit,
            'colors' => $request->colors,
            'quantity' => $request->quantity,
            'comments' => $request->comments
        ]);

        if($request->box_type == null) {
            $box_type = "Not available";    
        } else {
            $product = Product::findOrFail($request->box_type);
            $box_type = $product->title;
        }
        
        $objQuote = new \stdClass();
        $objQuote->full_name = $request->full_name;
        $objQuote->email = $request->email;
        $objQuote->phone = $request->phone;
        $objQuote->box_type = $box_type;
        $objQuote->stock = $request->stock;
        $objQuote->width = $request->width;
        $objQuote->height = $request->height;
        $objQuote->length = $request->length;
        $objQuote->units = $request->unit;
        $objQuote->colors = $request->colors;
        $objQuote->quantity = $request->quantity;
        $objQuote->comments = $request->comments;

        $settings = General::findOrFail(1);
        $to_email = $settings->quotation_email; 

        try {

            Mail::to($to_email)->send(new QuoteEmail($objQuote));
        
        } catch(\Exception $e) {
            // get error here
            echo $e->getMessage();
        }  

     //   Session::flash('success', 'Your quotation request has been successfully submitted.');
     //   return redirect()->back();
        return view('front.pages.quote_complete');

    }

    public function requestQuoteComplete()
    {
        return view('front.pages.quote_complete');
    }

    public function viewAllCategories($slug)
    {
        
        $main_category_id = MainCategory::where('slug', $slug)->value('id');
        $main_category_title = MainCategory::where('id', $main_category_id)->value('title');
        
        $categories = Category::select('categories.id as id', 'categories.title as title', 'categories.slug as slug', DB::raw('ifnull(count(products.id),0) as total_products'))
                               ->leftJoin('products','categories.id','=','products.category_id')
                               ->where('categories.main_category', $main_category_id)  
                               ->groupBy('categories.id')
                               ->paginate(12); 
 
        return view('front.pages.categories_all', compact('main_category_id', 'main_category_title', 'categories'));

    }

    public function contactIndex()
    {
        $contact = General::findOrFail(1);
        return view('front.pages.contact_us', compact('contact'));
    }

    public function contactStore(Request $request)
    {

        $request->validate([
            'full_name' => 'required|string|max:191',
            'email' => 'required|string|email|max:191',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|min:10',
         //   'g-recaptcha-response' => 'required|captcha',
        ]);

        Contact::create([
            'full_name' => $request->full_name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message
        ]);

        $objContact = new \stdClass();
        $objContact->full_name = $request->full_name;
        $objContact->email = $request->email;
        $objContact->subject = $request->subject;
        $objContact->message = $request->message;
        
        $settings = General::findOrFail(1);
        $to_email = $settings->contact_email;

        try {

            Mail::to($to_email)->send(new ContactEmail($objContact));
        
        } catch(\Exception $e) {
            // get error here
            echo $e->getMessage();
        }

        Session::flash('success', 'Your message has been successfully submitted.');
        return redirect()->back();

    }

    public function subscriberStore(Request $request)
    {

        $this->validate($request,[
            'email' => 'required|string|email|max:191|unique:subscribers'
        ]); 

        $subscriber_email = $request->email;
        
        Subscriber::create([
            'email' => $subscriber_email
        ]);

    /*    $objSubscriber = new \stdClass();
        $objSubscriber->email = $subscriber_email;

        try {    

            Mail::to($subscriber_email)->send(new SubscriberEmail($objSubscriber));

        } catch(\Exception $e) {
            // get error here
            echo $e->getMessage();
        } */

       // return view('front.pages.subscriber_thankyou', compact('general'));
        return response()->json(['success' => 'Success! You\'re now subscribed.']);
    }

    public function blogIndex()
    {
        
        $blogs = Blog::where('status', 1)
                     ->orderBy('created_at', 'DESC')
                     ->paginate(8);
        
        $total_posts = Blog::where('status', 1)->count();
        
        $other_categories = DB::table('blog_categories')
                              ->leftJoin('blogs','blog_categories.id','=','blogs.category_id')
                              ->select('blog_categories.id as id', 'blog_categories.title as title', 'blog_categories.slug as cat_slug', DB::raw('ifnull(count(blogs.id),0) as total_posts'))
                              ->groupBy('blog_categories.id')
                              ->orderBy('blog_categories.title', 'ASC')
                              ->get();

        return view('front.pages.blog', compact('blogs','total_posts', 'other_categories'));
    
    }

    public function blogShow($slug)
    {
    
        $id = Blog::where('slug', $slug)->value('id');
        $blog = Blog::findOrFail($id);
        $other_blogs = Blog::where('id', '<>', $id)
                           ->where('category_id', $blog->category_id)
                           ->get();

        $categories = BlogCategory::select('blog_categories.id as id', 'blog_categories.title as title', DB::raw('ifnull(count(blogs.id),0) as total_posts'))
                               ->leftJoin('blogs','blog_categories.id','=','blogs.category_id')  
                               ->groupBy('blog_categories.id')
                               ->get();

        $popular_posts = Blog::where('id', '<>', $id)
                           ->where('category_id', '<>', $blog->category_id)
                           ->orderBy('created_at', 'DESC')
                           ->skip(0)
                           ->limit(4)
                           ->get();

        return view('front.pages.blog_details', compact('blog', 'other_blogs', 'categories', 'popular_posts'));
    
    }

    public function faqIndex()
    {
        $faqs = Faq::orderBy('created_at', 'ASC')->get();
        return view('front.pages.faq', compact('faqs'));
    }

    public function aboutIndex()
    {
        $about = Page::findOrFail(1);
        return view('front.pages.about', compact('about'));
    }

    public function termsIndex()
    {
        $terms = Page::findOrFail(2);
        return view('front.pages.terms_of_use', compact('terms'));
    }

    public function privacyIndex()
    {
        $privacy = Page::findOrFail(3);
        return view('front.pages.privacy_policy', compact('privacy'));
    }

    public function categories($category_id)
    {

        $products = Category::where('main_category', $category_id)
                            ->where('status', 1)  
                            ->inRandomOrder()
                            ->limit(8)
                            ->get();

        return $products;                      

    }

    public function otherCategories($category_id, $main_category_id)
    {
        
        $other_categories = DB::table('categories')
                            ->leftJoin('products','categories.id','=','products.category_id')
                            ->select('categories.id as id', 'categories.title as title', 'categories.slug as slug', DB::raw('ifnull(count(products.id),0) as total_products'))
                            ->where('categories.id', '<>', $category_id)
                            ->where('categories.main_category', $main_category_id)
                            ->groupBy('categories.id')
                            ->get();

        return $other_categories;

    }

    public function search(Request $request)
    {
        $data = $request->q;
        if($data != "") {

            $products = Product::where('title', 'LIKE', '%' . $data . '%')
                               ->orWhere('slug', 'LIKE', '%' . $data . '%')
                               ->get();

            $total_products_of_category = count($products);

            return view('front.pages.search', compact('data', 'products', 'total_products_of_category'));
        } else {

            $data = null;
            $products = collect();
            $total_products_of_category = 0;            
            
            return view('front.pages.search', compact('data', 'products', 'total_products_of_category'));
        }   
    }

    public function searchBlog(Request $request)
    {
        $keyword = $request->ws;

        $blogs = Blog::where('title', 'LIKE', '%' . $keyword . '%')
                    ->orWhere('slug', 'LIKE', '%' . $keyword . '%')
                    ->where('status', 1)
                    ->paginate(8);

        $total_posts = Blog::where('title', 'LIKE', '%' . $keyword . '%')
                          ->orWhere('slug', 'LIKE', '%' . $keyword . '%')
                          ->where('status', 1)
                          ->count();
        
        return view('front.pages.blog_search', compact('keyword', 'blogs', 'total_posts'));                  
    }

    public function pageNotFound()
    {
        $general = General::findOrFail(1);
        $email = $general->email;
        return view('error.404', compact('email'));
    }
    	
}
