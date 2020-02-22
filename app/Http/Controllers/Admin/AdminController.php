<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Hash;

use App\Quote;
use App\General;
use App\Contact;
use App\Category;
use App\Product;
use App\User;
use App\Admin;
use App\Faq;
use App\Subscriber;
use App\Slider;
use App\Banner;

use Session;

class AdminController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function adminIndex()
    {
    
    	$total_quotations = Quote::count();
    	$total_messages = Contact::count();
    	$total_clients = User::count();

    	$industry_category_id = 1;
    	$industry_category_ids = subCategory($industry_category_id);
    	$total_industry_products = $this->productCount($industry_category_ids);

    	$style_category_id = 2;
    	$style_category_ids = subCategory($style_category_id);
    	$total_style_products = $this->productCount($style_category_ids);

    	$other_category_id = 3;
    	$other_category_ids = subCategory($other_category_id);
    	$total_other_products = $this->productCount($other_category_ids); 
    	
    	$quotations = Quote::orderBy('created_at', 'DESC')
    						->skip(0)
    						->limit(6)
    						->get();

    	return view('admin.pages.index', compact('total_quotations', 'total_messages', 'total_clients', 'total_industry_products', 'total_style_products', 'total_other_products', 'quotations'));
    
    }

    public function quotationIndex()
    {
    	$quotations = Quote::orderBy('created_at', 'DESC')->paginate(20);
    	return view('admin.pages.quotations.index', compact('quotations'));
    }

    public function quotationShow($id)
    {
    	$quotation = Quote::select('quotes.*', 'products.title as product_title')
                          ->join('products', 'products.id', '=', 'quotes.box_type_id')
                          ->where('quotes.id', '=', $id)
                          ->first();
    
    	return view('admin.pages.quotations.details', compact('quotation'));	
    }

    public function indexContact()
    {
    	$contact = General::findOrFail(1);
    	return view('admin.pages.settings.contact_index', compact('contact'));
    }

    public function editContact($id)
    {
        $contact = General::findOrFail($id);
        return view('admin.pages.settings.contact_edit', compact('contact'));   
    }

    public function updateContact(Request $request, $id)
    {
		
		$request->validate([
            'title' => 'required|string|max:191',
            'email' => 'required|string|email|max:191',
            'mobile' => 'required|string|max:191',
            'street' => 'required|string|max:255',
            'city' => 'required|string|max:191',
            'state' => 'required|string|max:191',
            'zip' => 'required|string|max:191',
            'country' => 'required|string|max:191'
        ]);

		General::whereId($id)
        ->update([
            'business_title' => $request->title,
            'email' => $request->email,
            'phone' => $request->mobile,
            'street_address' => $request->street,
            'city' => $request->city,
            'state' => $request->state,
            'zip' => $request->zip,
            'country' => $request->country
        ]);

        Session::flash('success', 'Contacts updated successfully.');
        return redirect('admin_panel/contacts');    	
    
    }

    public function indexSocialMedia()
    {
    	$social = General::findOrFail(1);
    	return view('admin.pages.settings.social_index', compact('social'));	
    }

    public function editSocialMedia($id)
    {
        $social = General::findOrFail(1);
        return view('admin.pages.settings.social_edit', compact('social'));   
    }

    public function updateSocialMedia(Request $request, $id)
    {
		
		$request->validate([
            'facebook' => 'nullable|string|max:255',
            'twitter' => 'nullable|string|max:255',
            'instagram' => 'nullable|string|max:255',
            'youtube' => 'nullable|string|max:255',
            'pinterest' => 'nullable|string|max:255',
        ]);

		General::whereId($id)
        ->update([
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'instagram' => $request->instagram,
            'youtube' => $request->youtube,
            'pinterest' => $request->pinterest,
        ]);

        Session::flash('success', 'Social media links updated successfully.');
        return redirect('admin_panel/social_media');    	
    
    }

    public function indexEmail()
    {
    	$email = General::findOrFail(1);
    	return view('admin.pages.settings.email_index', compact('email'));
    }

    public function updateEmail(Request $request, $id)
    {
		$request->validate([
            'quotation' => 'required|string|email|max:191',
            'contact' => 'required|string|email|max:191'
        ]);

        General::whereId($id)
        ->update([
            'quotation_email' => $request->quotation,
            'contact_email' => $request->contact,
        ]);

        Session::flash('success', 'Emails updated successfully.');
        return redirect('admin_panel/emails');

    }

    public function indexSEO()
    {
        $seo = General::findOrFail(1);
        return view('admin.pages.home_page.seo_index', compact('seo'));
    }

    public function updateSEO(Request $request, $id)
    {
        $request->validate([
            'page_title' => 'required|string|max:60',
            'page_description' => 'required|string|max:250',
            'page_keywords' => 'required|string|max:191'
        ]);

        General::whereId($id)
        ->update([
            'page_title' => $request->page_title,
            'page_description' => $request->page_description,
            'page_keywords' => $request->page_keywords
        ]);

        Session::flash('success', 'Home page seo settings updated successfully.');
        return redirect('admin_panel/seo_settings');

    }

    public function editHomePageContents()
    {
        $home = General::findOrFail(1);
        return view('admin.pages.home_page.edit_contents', compact('home'));
    }

    public function updateHomePageContents(Request $request, $id)
    {
        $request->validate([
            'home_page_heading' => 'required|string|max:255',
            'home_page_sub_heading' => 'required|string|max:255',
            'home_page_description' => 'required|string|max:500'
        ]);

        General::whereId($id)
        ->update([
            'home_page_heading' => $request->home_page_heading,
            'home_page_sub_heading' => $request->home_page_sub_heading,
            'home_page_description' => $request->home_page_description
        ]);

        Session::flash('success', 'Home page contents updated successfully.');
        return redirect('admin_panel/home_page/contents');        
    }

    public function indexHomePageBanners()
    {
        $banner = General::findOrFail(1);
     //   $total_banners = count($banner);
        
        return view('admin.pages.home_page.index_banners', compact('banner'));
    }

    public function createHomePageBanners()
    {
        return view('admin.pages.home_page.create_banner');   
    }

    public function editHomePageBanners($id, $banner_name)
    {
        $banner = General::findOrFail($id);
        return view('admin.pages.home_page.edit_banner', compact('banner', 'banner_name'));
    }

    public function updateHomePageBanners(Request $request, $id)
    {
        $request->validate([
            'banner_image' => 'required|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $general = General::findOrFail($id);

        if ($request->hasFile('banner_image')) {

            if($request->banner_name == 'home_page_banner_1') {
                if(isset($general->$general->home_page_banner_1)) {
                    @unlink('admin/app-assets/images/banners/'.$general->home_page_banner_1);
                }
            } elseif($request->banner_name == 'home_page_banner_2') {
                if(isset($general->$general->home_page_banner_2)) {
                    @unlink('admin/app-assets/images/banners/'.$general->home_page_banner_2);
                }
            } elseif($request->banner_name == 'home_page_banner_3') {
                if(isset($general->$general->home_page_banner_3)) {
                    @unlink('admin/app-assets/images/banners/'.$general->home_page_banner_3);
                }
            } else {
                if(isset($general->$general->home_page_banner_4)) {
                    @unlink('admin/app-assets/images/banners/'.$general->home_page_banner_4);
                }
            }

            $image = $request->file('banner_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = 'admin/app-assets/images/banners/'. $filename;
            if($request->banner_name == 'home_page_banner_1') {
                $banner = Image::make($image)->resize(470, 510);    
            } elseif($request->banner_name == 'home_page_banner_2') {
                $banner = Image::make($image)->resize(275, 510);
            } elseif($request->banner_name == 'home_page_banner_3') {
                $banner = Image::make($image)->resize(370, 245);
            } else {
                $banner = Image::make($image)->resize(370, 245);
            }
            
            $banner->save($location);

        }

        if($request->banner_name == 'home_page_banner_1') {
            $general->home_page_banner_1 = $filename;    
        } elseif($request->banner_name == 'home_page_banner_2') {
            $general->home_page_banner_2 = $filename;
        } elseif($request->banner_name == 'home_page_banner_3') {
            $general->home_page_banner_3 = $filename;
        } else {
            $general->home_page_banner_4 = $filename;
        }
        
        $general->save();

        Session::flash('success', 'Banner image updated successfully.');
        return redirect('admin_panel/home_page/banners');        
    }

    public function indexSlider()
    {
        $sliders = Slider::orderBy('created_at', 'ASC')->get();
        return view('admin.pages.sliders.index', compact('sliders')); 
    }

    public function createSlider()
    {
        return view('admin.pages.sliders.create');
    }

    public function storeSlider(Request $request)
    {

        $request->validate([
            'title' => 'required|string|max:191',
            'slider_image' => 'required|mimes:jpeg,png,jpg,gif,svg',
            'status' => 'required'
        ]);

        $slider = Slider::create([
                    'title' => $request->title,
                    'status' => $request->status
                  ]);

        $general = Slider::findOrFail($slider->id);

        if ($request->hasFile('slider_image')) {

            $image = $request->file('slider_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = 'admin/app-assets/images/slider/'. $filename;
            $img_big = Image::make($image)->resize(1920, 670);
            $img_big->save($location);

        }

        $general->image = $filename;
        $general->save();

        Session::flash('success', 'Slider created successfully.');
        return redirect('admin_panel/slider');

    }

    public function editSlider($id)
    {
        $slider = Slider::findOrFail($id);
        return view('admin.pages.sliders.edit', compact('slider'));
    }

    public function updateSlider(Request $request, $id)
    {
        
        $request->validate([
            'title' => 'required|string|max:191',
            'slider_image' => 'mimes:jpeg,png,jpg,gif,svg',
            'status' => 'required'
        ]);

        Slider::whereId($id)
        ->update([
            'title' => $request->title,
            'status' => $request->status
        ]);

        if ($request->hasFile('slider_image')) {

            $general = Slider::findOrFail($id);
            if(isset($general->image)){
                @unlink('admin/app-assets/images/slider/'.$general->image);
            }

            $image = $request->file('slider_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = 'admin/app-assets/images/slider/'. $filename;
            $img_big = Image::make($image)->resize(1920, 670);
            $img_big->save($location);

            $general->image = $filename;
            $general->save();

        }

        Session::flash('success', 'Slider updated successfully.');
        return redirect('admin_panel/slider');

    }

    public function destroySlider($id)
    {
        
        $slider = Slider::findOrFail($id);
        if(isset($slider->image)){
            @unlink('admin/app-assets/images/slider/'.$slider->image);
        }

        $slider->delete();

        Session::flash('success', 'Slider deleted successfully.');
        return redirect('admin_panel/slider');
    
    }

    public function indexBanner()
    {
        $banner = General::findOrFail(1);
        return view('admin.pages.settings.banner_index', compact('banner'));
    }

    public function updateBanner(Request $request, $id)
    {

        $request->validate([
            'banner_image' => 'required|mimes:jpeg,png,jpg,gif,svg'
        ]); 

        $general = General::findOrFail($id);

        if ($request->hasFile('banner_image')) {

            if(isset($general->banner_image)){
                @unlink('assets/images/demos/demo-24/slider/'.$general->banner_image);
            }
            
            $image = $request->file('banner_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = 'assets/images/demos/demo-24/slider/'. $filename;
            $img_big = Image::make($image)->resize(1920, 670);
            $img_big->save($location);

        }

        $general->banner_image = $filename;
        $general->save();

        Session::flash('success', 'Banner updated successfully.');
        return redirect('admin_panel/banner');   

    }

    public function messagesIndex()
    {
    	$messages = Contact::orderBy('created_at', 'DESC')->paginate(20);
    	return view('admin.pages.messages.index', compact('messages'));
    }

    public function messageShow($id)
    {
    	$message = Contact::findOrFail($id);
    	return view('admin.pages.messages.details', compact('message'));
    }

    public function productCount($industry_category_ids)
	{
		
		$total_products = Product::whereIn('category_id', $industry_category_ids)
								 ->count();

		return $total_products;
		
	}

    public function administratorsIndex()
    {
        $admins = Admin::orderBy('created_at', 'ASC')->get();
        return view('admin.pages.admins.index', compact('admins'));
    }
    
    public function administratorsCreate()
    {
        return view('admin.pages.admins.create');
    }

    public function administratorsStore(Request $request)
    {

        $request->validate([
            'first_name' => 'required|string|max:191',
            'last_name' => 'required|string|max:191',
            'email' => 'required|string|email|max:191|unique:admins',
            'designation' => 'required|string|max:191',
            'password' => 'required|string|min:6|confirmed',
            'status' => 'required',
        ]);

        Admin::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'designation' => $request->designation,
            'password' => bcrypt($request->password),
            'status' => $request->status
        ]);

        Session::flash('success', 'System administrator created successfully.');
        return redirect('admin_panel/administrators');

    }

    public function administratorsEdit($id)
    {
        $admin = Admin::findOrFail($id);
        return view('admin.pages.admins.edit', compact('admin'));
    }

    public function administratorsUpdate(Request $request, $id)
    {

        $request->validate([
            'first_name' => 'required|string|max:191',
            'last_name' => 'required|string|max:191',
            'designation' => 'required|string|max:191',
            'status' => 'required',
        ]);

        Admin::whereId($id)
        ->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'designation' => $request->designation,
            'status' => $request->status
        ]);

        Session::flash('success', 'System administrator updated successfully.');
        return redirect('admin_panel/administrators');
    
    }

    public function indexPassword()
    {
        return view('admin.pages.password.index');
    }

    public function changePassword(Request $request, $id)
    {

        $request->validate([
            'passwordold' =>'required',
            'password' => 'required|min:6|max:50|confirmed'
        ]);

        try {

            $admin = Admin::findOrFail($id);
            $admin_password = $admin->password;
            
            if(Hash::check($request->passwordold, $admin_password)){

                $password = Hash::make($request->password);
                $admin->password = $password;
                $admin->save();

                Session::flash('success', "Your account password changed successfully.");
                return redirect()->back();
            
            }else{
            
                Session::flash('alert', 'Incorrect old password, system didnt recognize that password.');
               // Session::flash('type', 'warning');
                return redirect()->back();
            
            }

        } catch (\PDOException $e) {
            Session::flash('alert', 'Some problem occurs, please try again!');
         //   Session::flash('type', 'warning');
            return redirect()->back();
        }

    }

    public function indexFaqs()
    {
        $faqs = Faq::orderBy('created_at', 'ASC')->get();
        return view('admin.pages.faqs.index', compact('faqs'));
    }

    public function createFaqs()
    {
        return view('admin.pages.faqs.create');
    }

    public function storeFaqs(Request $request)
    {
        
        $request->validate([
            'question' => 'array|min:1',
            'question.*' => 'nullable|string|max:255',
            'answer' => 'array|min:1',
            'answer.*' => 'nullable|string'
        ]);

        $faqs = [];

        if(count($request->question) > 0){

            foreach($request->question as $key => $value)
            {
              
                $data = array(
                            'question' => $request->question[$key],
                            'answer' => $request->answer[$key]
                        );

                array_push($faqs, $data);
                        
            }

        }

        array_pop($faqs);

        foreach($faqs as $key => $value){

            Faq::create([
                'question' => $value['question'],
                'answer' => $value['answer']
            ]);

        }
        
        Session::flash('success', 'Frequently asked questions created successfully.');
        return redirect('admin_panel/faqs');

    }

    public function editFaqs($id)
    {
        $faq = Faq::findOrFail($id);
        return view('admin.pages.faqs.edit', compact('faq'));   
    }

    public function updateFaqs(Request $request, $id)
    {
        
        $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string'
        ]);        

        Faq::whereId($id)
            ->update([
                'question' => $request->question,
                'answer' => $request->answer
            ]);

        Session::flash('success', 'Frequently asked question updated successfully.');
        return redirect('admin_panel/faqs');

    }

    public function destroyFaq($id)
    {
        
        $faq = Faq::findOrFail($id);
        $faq->delete();

        Session::flash('success', 'Frequently asked question deleted successfully.');
        return redirect('admin_panel/faqs');
    
    }

    public function indexClients()
    {
        $clients = User::orderBy('created_at', 'DESC')->paginate(25);
        return view('admin.pages.clients.index', compact('clients'));
    }

    public function indexSubscribers()
    {
        $subscribers = Subscriber::orderBy('created_at', 'DESC')->paginate(25);
        return view('admin.pages.subscribers.index', compact('subscribers'));   
    }

}
